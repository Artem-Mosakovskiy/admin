@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Комплекты термопар</h3>

                        <div class="box-tools">
                            <a href="/admin/complect/add" class="btn btn-success">Добавить</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Комплект термопар</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($complect as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->complect }}</td>
                                        <td>
                                            <a href="/admin/complect/edit/{{ $item->id }}" class="label label-warning">Редактировать</a>
                                            <a href="/admin/complect/delete/{{ $item->id }}" class="label label-danger">Удалить</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>

@endsection