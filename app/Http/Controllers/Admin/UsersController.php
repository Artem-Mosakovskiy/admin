<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\RSOCompany;
use App\User;
use App\UserRoles;
use App\UsersTypes;
use App\UserTypes;
use App\YCompany;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UsersController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $users = User::with('role', 'type')->where('id', '!=', Auth::id())->get();

        return view('admin.users.index',[
            'users' => $users,
        ]);
    }

    public function add(){
        return view('admin.users.add', [
            'user_roles' => UserRoles::all()->pluck('role', 'id'),
            'user_types' => [null => 'Выберите тип пользователя'] + UserTypes::all()->pluck('type', 'id')->toArray()
        ]);
    }

    public function save(Request $request){
        $this->validate($request, User::validation());
        $user = new User;
        $user->fill($request->except(['_token', 'types']));
        $user->password = bcrypt($request->password);
        $user->save();

        foreach ($request->types as $item){
            $user_type = new UsersTypes();
            $user_type->user_id = $user->id;
            $user_type->type_id = $item;
            $user_type->save();
        }

        Session::flash('success', 'Пользватель добавлен');
        return redirect('/admin/users');
    }

    public function edit($id){
        $user = User::whereId($id)->first();

        $companies_id = UsersTypes::where('user_id', $id)->pluck('type_id')->toArray();

        $companies = [];

        switch ($user->type_id){
            case 1:
                $companies = YCompany::where('deleted', 0);
                break;
            case 2:
                $companies = RSOCompany::where('deleted', 0);
                break;
        }

        return view('admin.users.edit', [
            'user' => $user,
            'user_roles' => UserRoles::all()->pluck('role', 'id'),
            'user_types' => [null => 'Выберите тип пользователя'] + UserTypes::all()->pluck('type', 'id')->toArray(),
            'companies' => $companies->pluck('company', 'id')->toArray(),
            'companies_id' => $companies_id
        ]);
    }

    public function update(Request $request){
        $user = User::whereId($request->id)->first();

        $validation = User::validation();
        unset($validation['login']);

        if(!$request->password){
            unset($validation['password']);
        }

        $this->validate($request, $validation);

        $user->f_name = $request->f_name;
        $user->s_name = $request->s_name;
        $user->t_name = $request->t_name;
        $user->login = $request->login;
        $user->role_id = $request->role_id;
        $user->type_id = $request->type_id;
        if($request->password){
            $user->password = bcrypt($request->password);
        }
        $user->save();

        UsersTypes::where('user_id', $request->id)->delete();

        foreach ($request->types as $item){
            $user_type = new UsersTypes();
            $user_type->user_id = $user->id;
            $user_type->type_id = $item;
            $user_type->save();
        }

        Session::flash('success', 'Пользватель успешно отредактирован');
        return redirect('/admin/users');

    }


    public function delete($id){
        User::findOrFail($id)->delete();
        Session::flash('success', 'Пользватель удален');
        return redirect('/admin/users');
    }


    public function getCompanies(Request $request){
        $result = [];
        switch ($request->company_id){
            case 1:
                $result = YCompany::where('deleted', 0)->pluck('company', 'id');
                break;
            case 2:
                $result = RSOCompany::where('deleted', 0)->pluck('company', 'id');
                break;
        }

        return response()->json($result->toArray());
    }
}
