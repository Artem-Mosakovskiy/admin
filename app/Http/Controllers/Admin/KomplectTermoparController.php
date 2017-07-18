<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\KomplektTermopar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class KomplectTermoparController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $complect = KomplektTermopar::all();

        return view('admin.complect.index',[
            'complect' => $complect,
        ]);
    }

    public function add(){
        return view('admin.complect.add');
    }

    public function save(Request $request){
        $complect = new KomplektTermopar();
        $complect->fill($request->except('_token'));
        $complect->save();

        Session::flash('success', 'Комплект термопар добавлен');
        return redirect('/admin/complect');
    }

    public function edit($id){
        $complect = KomplektTermopar::whereId($id)->first();

        return view('admin.complect.edit', [
            'complect' => $complect
        ]);
    }

    public function update(Request $request){
        $complect = KomplektTermopar::whereId($request->id)->first();
        $complect->fill($request->except('_token'));
        $complect->save();

        Session::flash('success', 'Комплект термопар успешно отредактирован');
        return redirect('/admin/complect');
    }

    public function delete($id){
        KomplektTermopar::findOrFail($id)->delete();
        Session::flash('success', 'Комплект термопар удален');
        return redirect('/admin/complect');
    }
}
