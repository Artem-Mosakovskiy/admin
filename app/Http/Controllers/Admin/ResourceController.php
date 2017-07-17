<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\ResourceType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ResourceController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $resources = ResourceType::all();

        return view('admin.resource.index',[
            'resource' => $resources,
        ]);
    }

    public function add(){
        return view('admin.resource.add');
    }

    public function save(Request $request){
        $resource = new ResourceType;
        $resource->fill($request->except('_token'));
        $resource->save();

        Session::flash('success', 'Ресурс добавлен');
        return redirect('/admin/resource');
    }

    public function edit($id){
        $resource = ResourceType::whereId($id)->first();

        return view('admin.resource.edit', [
            'resource' => $resource
        ]);
    }

    public function update(Request $request){
        $resource = ResourceType::whereId($request->id)->first();
        $resource->fill($request->except('_token'));
        $resource->save();

        Session::flash('success', 'Ресурс успешно отредактирован');
        return redirect('/admin/resource');
    }

    public function delete($id){
        ResourceType::findOrFail($id)->delete();
        Session::flash('success', 'Ресурс удален');
        return redirect('/admin/resource');
    }
}
