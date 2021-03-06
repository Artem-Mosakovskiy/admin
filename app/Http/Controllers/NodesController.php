<?php

namespace App\Http\Controllers;

use App\City;
use App\House;
use App\Node;
use App\NodesFiles;
use App\ResourceType;
use App\Street;
use App\UsersTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class NodesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Input $input){
        $nodes = Node::where('id', '>', 0);

        if(!Auth::user()->hasRole(1)){

            $user_companies_id = UsersTypes::where('user_id', Auth::id())->pluck('type_id')->toArray();

            switch (Auth::user()->type_id){
                case 1:
                    $nodes->whereIn('uk_company_id', $user_companies_id);
                    break;
                case 2:
                    $nodes->whereIn('rso_company_id', $user_companies_id);
                    break;
            }
        }

        if($input->get('city_id')){
            $nodes->where('city_id', $input->get('city_id'));
        }
        if($input->get('resource_type_id')){
            $nodes->where('resource_type_id', $input->get('resource_type_id'));
        }
        if($input->get('data')){
            $nodes->where(DB::raw('YEAR(data)'), '=', $input->get('data'));
        }

        $cities = City::where('deleted', 0)->pluck('city','id');
        $resources = ResourceType::where('deleted', 0)->pluck('type','id');
        $years = [
            null => 'Выберите год',
            2017 => 2017,
            2018 => 2018,
            2019 => 2019,
            2020 => 2020,
        ];


        return view('nodes.index',[
            'nodes' => $nodes->get(),
            'cities' => [null => 'Выберите город'] + $cities->toArray(),
            'resources' => [null => 'Выберите тип ресурса'] + $resources->toArray(),
            'years' => $years
        ]);
    }

    public function view($id){
        $node = Node::findOrFail($id);

        $nodes_files = NodesFiles::where('node_id', $id)->with('file')->get();

        return view('nodes.view', [
            'node' => $node,
            'nodes_files' => $nodes_files
        ]);
    }
}
