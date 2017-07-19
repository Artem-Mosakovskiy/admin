<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CitiesController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $cities = City::where('deleted', 0)->get();

        return view('admin.cities.index',[
            'cities' => $cities,
        ]);
    }

    public function add(){
        return view('admin.cities.add');
    }

    public function save(Request $request){
        $city = new City();
        $city->fill($request->except('_token'));
        $city->save();

        Session::flash('success', 'Город добавлен');
        return redirect('/admin/cities');
    }

    public function edit($id){
        $city = City::whereId($id)->first();

        return view('admin.cities.edit', [
            'city' => $city
        ]);
    }

    public function update(Request $request){
        $city = City::whereId($request->id)->first();
        $city->fill($request->except('_token'));
        $city->save();

        Session::flash('success', 'Город успешно отредактирован');
        return redirect('/admin/cities');
    }

    public function delete($id){
        $city = City::findOrFail($id);
        $city->deleted = 1;
        $city->save();

        Session::flash('success', 'Город удален');
        return redirect('/admin/cities');
    }
}
