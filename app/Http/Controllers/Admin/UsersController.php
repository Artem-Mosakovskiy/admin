<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\User;
use App\UserRoles;
use App\UserTypes;
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
            'user_types' => UserTypes::all()->pluck('type', 'id')
        ]);
    }

    public function save(Request $request){
        $this->validate($request, User::validation());
        $user = new User;
        $user->fill($request->except('_token'));
        $user->password = bcrypt($request->password);
        $user->save();

        Session::flash('success', 'Пользватель добавлен');
        return redirect('/admin/users');
    }

    public function edit($id){
        $user = User::whereId($id)->first();
        return view('admin.users.edit', [
            'user' => $user,
            'user_roles' => UserRoles::all()->pluck('role', 'id'),
            'user_types' => UserTypes::all()->pluck('type', 'id')
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

        Session::flash('success', 'Пользватель успешно отредактирован');
        return redirect('/admin/users');

    }


    public function delete($id){
        User::findOrFail($id)->delete();
        Session::flash('success', 'Пользватель удален');
        return redirect('/admin/users');
    }
}
