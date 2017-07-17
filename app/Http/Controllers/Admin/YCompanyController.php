<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\YCompany;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class YCompanyController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $company = YCompany::all();

        return view('admin.ycompany.index',[
            'ycompany' => $company,
        ]);
    }

    public function add(){
        return view('admin.ycompany.add');
    }

    public function save(Request $request){
        $resource = new YCompany();
        $resource->fill($request->except('_token'));
        $resource->save();

        Session::flash('success', 'Управляющая компания добавлена');
        return redirect('/admin/ycompany');
    }

    public function edit($id){
        $company = YCompany::whereId($id)->first();

        return view('admin.ycompany.edit', [
            'ycompany' => $company
        ]);
    }

    public function update(Request $request){
        $company = YCompany::whereId($request->id)->first();
        $company->fill($request->except('_token'));
        $company->save();

        Session::flash('success', 'Управляющая компания успешно отредактирована');
        return redirect('/admin/ycompany');
    }

    public function delete($id){
        YCompany::findOrFail($id)->delete();
        Session::flash('success', 'Управляющая компания удалена');
        return redirect('/admin/ycompany');
    }
}
