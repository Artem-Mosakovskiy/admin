<?php

namespace App\Http\Controllers\Admin;

use App\FileType;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FileTypeController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $file_types = FileType::where('deleted', 0)->get();

        return view('admin.file_types.index',[
            'file_types' => $file_types,
        ]);
    }

    public function add(){
        return view('admin.file_types.add');
    }

    public function save(Request $request){
        $file_type = new FileType();
        $file_type->fill($request->except('_token'));
        $file_type->save();

        Session::flash('success', 'Тип файла добавлен');
        return redirect('/admin/file_types');
    }

    public function edit($id){
        $file_type = FileType::whereId($id)->first();

        return view('admin.file_types.edit', [
            'file_type' => $file_type
        ]);
    }

    public function update(Request $request){
        $file_type = FileType::whereId($request->id)->first();
        $file_type->fill($request->except('_token'));
        $file_type->save();

        Session::flash('success', 'Тип файла успешно отредактирован');
        return redirect('/admin/file_types');
    }

    public function delete($id){
        $file_type = FileType::findOrFail($id);
        $file_type->deleted = 1;
        $file_type->save();

        Session::flash('success', 'Тип файла удален');
        return redirect('/admin/file_types');
    }
}
