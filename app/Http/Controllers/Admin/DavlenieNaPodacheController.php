<?php

namespace App\Http\Controllers\Admin;

use App\DavlenieNaPodache;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DavlenieNaPodacheController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $device = DavlenieNaPodache::all();

        return view('admin.power_podacha.index',[
            'device' => $device,
        ]);
    }

    public function add(){
        return view('admin.power_podacha.add');
    }

    public function save(Request $request){
        $complect = new DavlenieNaPodache();
        $complect->fill($request->except('_token'));
        $complect->save();

        Session::flash('success', 'Датчик давления добавлен');
        return redirect('/admin/power');
    }

    public function edit($id){
        $device = DavlenieNaPodache::whereId($id)->first();

        return view('admin.power_podacha.edit', [
            'device' => $device
        ]);
    }

    public function update(Request $request){
        $device = DavlenieNaPodache::whereId($request->id)->first();
        $device->fill($request->except('_token'));
        $device->save();

        Session::flash('success', 'Датчик давления успешно отредактирован');
        return redirect('/admin/power');
    }

    public function delete($id){
        DavlenieNaPodache::findOrFail($id)->delete();
        Session::flash('success', 'Датчик давления удален');
        return redirect('/admin/power');
    }
}
