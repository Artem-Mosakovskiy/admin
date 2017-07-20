<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\House;
use App\Http\Controllers\AdminController;
use App\Street;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HouseController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $houses = House::with('city', 'street')->where('deleted', 0)->get();

        return view('admin.houses.index',[
            'houses' => $houses,
        ]);
    }

    public function add(){
        $cities = City::where('deleted', 0)->pluck('city', 'id');
        $streets = Street::where('deleted', 0)->pluck('street', 'id');

        return view('admin.houses.add', [
            'cities' => [null => 'Выберите населенный пункт'] + $cities->toArray(),
            'streets' => [null => 'Выберите улицу']/* + $streets->toArray()*/
        ]);
    }

    public function save(Request $request){
        $house = new House();
        $house->fill($request->except('_token'));
        $house->save();

        Session::flash('success', 'Дом добавлен');
        return redirect('/admin/houses');
    }

    public function edit($id){
        $house = House::whereId($id)->first();
        $cities = City::where('deleted', 0)->pluck('city', 'id');

        $streets = Street::where('deleted', 0)
            ->where('city_id', $house->city_id)
            ->pluck('street', 'id');


        return view('admin.houses.edit', [
            'house' => $house,
            'cities' => $cities,
            'streets' => $streets
        ]);
    }

    public function update(Request $request){
        $house = House::whereId($request->id)->first();
        $house->fill($request->except('_token'));
        $house->save();

        Session::flash('success', 'Дом успешно отредактирован');
        return redirect('/admin/houses');
    }

    public function delete($id){
        $house = House::findOrFail($id);
        $house->deleted = 1;
        $house->save();

        Session::flash('success', 'Дом удален');
        return redirect('/admin/houses');
    }

    public function ajaxGetStreets($city_id){
        $streets = Street::where('city_id', $city_id)->pluck('street', 'id');

        return response()->json([0 => 'Выберите улицу'] + $streets->toArray());
    }

    public function ajaxGetHouses($street_id){
        $houses = House::where('street_id', $street_id)->pluck('house', 'id');

        return response()->json([0 => 'Выберите дом'] + $houses->toArray());
    }

}
