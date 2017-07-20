<?php

namespace App\Http\Controllers;

use App\City;
use App\House;
use App\Node;
use App\Street;
use Illuminate\Http\Request;

class NodesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $nodes = Node::all();

        return view('nodes.index',[
            'nodes' => $nodes,
        ]);
    }
}
