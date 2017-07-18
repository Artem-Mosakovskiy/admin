<?php

namespace App\Http\Controllers\Admin;

use App\DavlenieNaObrabotke;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DavlenieNaObrabotkeController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $device = DavlenieNaObrabotke::all();

        return view('admin.power_obrabotka.index',[
            'device' => $device,
        ]);
    }

    public function add(){
        return view('admin.power_obrabotka.add');
    }

    public function save(Request $request){
        $complect = new DavlenieNaObrabotke();
        $complect->fill($request->except('_token'));
        $complect->save();

        Session::flash('success', 'Датчик давления добавлен');
        return redirect('/admin/power_obrabotka');
    }

    public function edit($id){
        $device = DavlenieNaObrabotke::whereId($id)->first();

        return view('admin.power_obrabotka.edit', [
            'device' => $device
        ]);
    }

    public function update(Request $request){
        $device = DavlenieNaObrabotke::whereId($request->id)->first();
        $device->fill($request->except('_token'));
        $device->save();

        Session::flash('success', 'Датчик давления успешно отредактирован');
        return redirect('/admin/power_obrabotka');
    }

    public function delete($id){
        DavlenieNaObrabotke::findOrFail($id)->delete();
        Session::flash('success', 'Датчик давления удален');
        return redirect('/admin/power_obrabotka');
    }
}
