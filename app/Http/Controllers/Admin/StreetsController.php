<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Http\Controllers\AdminController;
use App\Street;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class StreetsController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $streets = Street::with('city')->where('deleted', 0)->get();

        return view('admin.streets.index',[
            'streets' => $streets,
        ]);
    }

    public function add(){
        $cities = City::where('deleted', 0)->pluck('city', 'id');

        return view('admin.streets.add', [
            'cities' => $cities
        ]);
    }

    public function save(Request $request){
        $street = new Street();
        $street->fill($request->except('_token'));
        $street->save();

        Session::flash('success', 'Улица добавлена');
        return redirect('/admin/streets');
    }

    public function edit($id){
        $street = Street::whereId($id)->first();
        $cities = City::where('deleted', 0)->pluck('city', 'id');

        return view('admin.streets.edit', [
            'street' => $street,
            'cities' => $cities
        ]);
    }

    public function update(Request $request){
        $city = City::whereId($request->id)->first();
        $city->fill($request->except('_token'));
        $city->save();

        Session::flash('success', 'Улица успешно отредактирована');
        return redirect('/admin/streets');
    }

    public function delete($id){
        $city = City::findOrFail($id);
        $city->deleted = 1;
        $city->save();

        Session::flash('success', 'Улица удалена');
        return redirect('/admin/streets');
    }
}
