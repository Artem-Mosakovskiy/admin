<?php

namespace App\Http\Controllers\Admin;

use App\DavlenieNaObrabotke;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CRUDModelController extends AdminController
{
    public $model;
    public $parent_marka;
    public function __construct()
    {
        parent::__construct();
    }

    public $view_directory = '';
    public $route = '';

    public $add_message = '';
    public $edit_message = '';
    public $delete_message = '';

    public function index(){
        $items = $this->model->with('marka')->where('deleted', 0)->get();
        

        return view('admin.' . $this->view_directory . '.index',[
            'items' => $items,
        ]);
    }

    public function add(){
        $parent_select = $this->parent_marka->where('deleted', 0)->pluck('marka', 'id');
        return view('admin.' . $this->view_directory . '.add',[
            'parent_select' => $parent_select
        ]);
    }

    public function save(Request $request){
        $item = $this->model;
        $item->fill($request->except('_token'));
        $item->save();

        Session::flash('success', $this->add_message);
        return redirect('/admin/' . $this->route);
    }

    public function edit($id){
        $item = $this->model->whereId($id)->with('marka')->first();
        $parent_select = $this->parent_marka->where('deleted', 0)->pluck('marka', 'id');

        return view('admin.' . $this->view_directory . '.edit', [
            'item' => $item,
            'parent_select' => $parent_select
        ]);
    }

    public function update(Request $request){
        $device = $this->model->whereId($request->id)->first();
        $device->fill($request->except('_token'));
        $device->save();

        Session::flash('success', $this->edit_message);
        return redirect('/admin/' . $this->route);
    }

    public function delete($id){
        $item = $this->model->findOrFail($id);
        $item->deleted = 1;
        $item->save();

        Session::flash('success', $this->delete_message);
        return redirect('/admin/'. $this->route);
    }
}
