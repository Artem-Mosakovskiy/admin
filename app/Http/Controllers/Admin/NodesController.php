<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\DavlenieNaObrabotke;
use App\DavlenieNaPodache;
use App\House;
use App\Http\Controllers\AdminController;
use App\KomplektTermopar;
use App\Node;
use App\RashodomerObrabotkaModel;
use App\RashodomerPodachaModel;
use App\ResourceType;
use App\RSOCompany;
use App\Street;
use App\WarmModel;
use App\YCompany;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class NodesController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    private function getSelectArray(){
        $cities = City::where('deleted', 0)->pluck('city','id');
        $streets = Street::where('deleted', 0)->pluck('street','id');
        $houses = House::where('deleted', 0)->pluck('house','id');

        $resources = ResourceType::where('deleted', 0)->pluck('type','id');
        $ycompanies = YCompany::where('deleted', 0)->pluck('company','id');
        $rcompanies = RSOCompany::where('deleted', 0)->pluck('company','id');

        $teplo_model = WarmModel::where('deleted', 0)->pluck('model','id');
        $rashodomer_pod = RashodomerPodachaModel::where('deleted', 0)->pluck('model','id');
        $rashodomer_obr = RashodomerObrabotkaModel::where('deleted', 0)->pluck('model','id');

        $termopar = KomplektTermopar::where('deleted', 0)->pluck('complect','id');

        $davlenie_pod = DavlenieNaPodache::where('deleted', 0)->pluck('device','id');
        $davlenie_obr = DavlenieNaObrabotke::where('deleted', 0)->pluck('device','id');

        return [
            'cities' => [null => 'Выберите населенный пункт'] + $cities->toArray(),
            'streets' => [null => 'Выберите улицу'] /*+ $streets->toArray()*/,
            'houses' => [null => 'Выберите дом'] /*+ $houses->toArray()*/,
            'resources' => [null => 'Выберите тип ресурса'] + $resources->toArray(),
            'ycompanies' => [null => 'Выберите компанию'] + $ycompanies->toArray(),
            'rcompanies' => [null => 'Выберите компанию'] + $rcompanies->toArray(),
            'teplo_model' => [null => 'Выберите модель тепловычислителя'] + $teplo_model->toArray(),
            'rashodomer_pod' => [null => 'Выберите расходомер на подаче'] + $rashodomer_pod->toArray(),
            'rashodomer_obr' => [null => 'Выберите расходомер на обработке'] + $rashodomer_obr->toArray(),
            'termopar' => [null => 'Выберите комплект термопар'] + $termopar->toArray(),
            'davlenie_pod' => [null => 'Выберите марку датчика давления на подаче'] + $davlenie_pod->toArray(),
            'davlenie_obr' => [null => 'Выберите марку датчика давления на обработке'] + $davlenie_obr->toArray(),

        ];
    }

    public function add(){
        return view('admin.nodes.add', $this->getSelectArray());
    }

    public function save(Request $request){
        //dd($request->all());
        $node = new Node();
        $node->fill($request->except('_token'));

        $node->save();

        Session::flash('success', 'Узел учета добавлен');
        return redirect('/nodes');
    }

    public function edit($id){
        $node = Node::whereId($id)->with('house')->first();

        $array = $this->getSelectArray();
        $array['node'] = $node;

        if(isset($node->house->city_id)){
            $streets = Street::where('deleted', 0)
                ->where('city_id', $node->house->city_id)
                ->pluck('street','id');
            $houses = House::where('deleted', 0)
                ->where('street_id', $node->house->street_id)
                ->pluck('house','id');

            $array['streets'] = [null => 'Выберите улицу'] + $streets->toArray();
            $array['houses'] = [null => 'Выберите дом'] + $houses->toArray();
        }


        return view('admin.nodes.edit', $array);
    }

    public function update(Request $request){
        //dd($request->except('_token'));
        $node = Node::whereId($request->id)->first();
        $node->fill($request->except('_token'));

        $node->save();

        Session::flash('success', 'Узел учета успешно отредактирован');
        return redirect('/nodes');
    }

    public function delete($id){
        $node = Node::findOrFail($id)->delete();
        Session::flash('success', 'Узел учета удален');
        return redirect('/nodes');
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
