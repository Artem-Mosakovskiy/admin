<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\House;
use App\Http\Controllers\AdminController;
use App\Street;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NodesController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add(){
        $cities = City::where('deleted', 0)->pluck('city','id');
        $streets = Street::where('deleted', 0)->pluck('street','id');
        $houses = House::where('deleted', 0)->pluck('house','id');

        return view('admin.nodes.add',[
            'cities' => [null => 'Выберите населенный пункт'] + $cities->toArray(),
            'streets' => [null => 'Выберите улицу'] /*+ $streets->toArray()*/,
            'houses' => [null => 'Выберите дом'] /*+ $houses->toArray()*/
        ]);
    }

    public function save(Request $request){
        $resource = new ResourceType;
        $resource->fill($request->except('_token'));
        $resource->save();

        Session::flash('success', 'Узел учета добавлен');
        return redirect('/admin/nodes');
    }

    public function edit($id){
        $resource = ResourceType::whereId($id)->first();

        return view('admin.nodes.edit', [
            'resource' => $resource
        ]);
    }

    public function update(Request $request){
        $resource = ResourceType::whereId($request->id)->first();
        $resource->fill($request->except('_token'));
        $resource->save();

        Session::flash('success', 'Узел учета успешно отредактирован');
        return redirect('/admin/nodes');
    }

    public function delete($id){
        ResourceType::findOrFail($id)->delete();
        Session::flash('success', 'Узел учета удален');
        return redirect('/admin/nodes');
    }

    public function addPlace(Request $request){
        $city_id = $request->city_id;
        $street_id = $request->street_id;

        $city = $request->add_city;
        $street = $request->add_street;
        $house = $request->add_house;

        $responce = false;

        if($city){
            $responce = City::addCity($city);
        } elseif ($street){
            $responce = Street::addStreet($city_id, $street);
        } elseif ($house){
            $responce = House::addHouse($city_id, $street_id, $house);
        }

        return response()->json($responce);
    }
}
