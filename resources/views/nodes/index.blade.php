@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Узлы учета</h3>

                        <div class="box-tools">
                            <a href="/admin/nodes/add" class="btn btn-success">Добавить</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Адрес</th>
                                    <th>Ресурс</th>
                                    <th>Модель</th>
                                    <th>Дата проверки</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($nodes as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->house_id }}</td>
                                        <td>{{ $item->resource_type_id }}</td>
                                        <td>{{ $item->teplo_model_id }}</td>
                                        <td>{{ $item->date }}</td>
                                        <td>
                                            <a href="/nodes/view/{{ $item->id }}" class="label label-primary">Просмотр</a>
                                            @if(Auth::user()->hasRole(1))
                                                <a href="/admin/nodes/edit/{{ $item->id }}" class="label label-warning">Редактировать</a>
                                                <a href="/admin/nodes/delete/{{ $item->id }}" class="label label-danger">Удалить</a>
                                            @endif

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