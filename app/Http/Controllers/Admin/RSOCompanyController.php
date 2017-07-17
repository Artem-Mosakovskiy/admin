<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\RSOCompany;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class RSOCompanyController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $company = RSOCompany::all();

        return view('admin.rsocompany.index',[
            'rsocompany' => $company,
        ]);
    }

    public function add(){
        return view('admin.rsocompany.add');
    }

    public function save(Request $request){
        $company = new RSOCompany();
        $company->fill($request->except('_token'));
        $company->save();

        Session::flash('success', 'Ресурсоснабжающая компания добавлена');
        return redirect('/admin/rsocompany');
    }

    public function edit($id){
        $company = RSOCompany::whereId($id)->first();

        return view('admin.rsocompany.edit', [
            'rsocompany' => $company
        ]);
    }

    public function update(Request $request){
        $company = RSOCompany::whereId($request->id)->first();
        $company->fill($request->except('_token'));
        $company->save();

        Session::flash('success', 'Ресурсоснабжающая компания успешно отредактирована');
        return redirect('/admin/rsocompany');
    }

    public function delete($id){
        RSOCompany::findOrFail($id)->delete();
        Session::flash('success', 'Ресурсоснабжающая компания удалена');
        return redirect('/admin/rsocompany');
    }
}
