@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <form method="get" action="/nodes">
                        <div class="col-md-3">
                            {{ Form::select('city_id', $cities, null, ['class'=>'form-control']) }}
                        </div>
                        <div class="col-md-3">
                            {{ Form::select('resource_type_id', $resources, null, ['class'=>'form-control']) }}
                        </div>
                        <div class="col-md-3">
                            {{ Form::select('data', $years, null, ['class'=>'form-control']) }}
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-info noPrint" type="submit">Фильтровать</button>
                        </div>
                    </form>
                </div><br>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Узлы учета</h3>

                        <div class="box-tools">
                            @if(Auth::user()->hasRole(1))
                                <a href="/admin/nodes/add" class="btn btn-success noPrint">Добавить</a>
                            @endif
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
                                        @if($item->house)
                                            <td>{{ $item->house->city->city }} {{ $item->house->street->street }} {{ $item->house->house }}</td>
                                            @else
                                            <td></td>
                                        @endif
                                        <td>{{ $item->resource ? $item->resource->type : '' }}</td>
                                        @if($item->teplo)
                                            <td>{{ $item->teplo->marka->marka }} {{ $item->teplo->model }}</td>
                                            @else
                                            <td></td>
                                        @endif
                                        <td>{{ $item->data }}</td>
                                        <td>
                                            <a href="/nodes/view/{{ $item->id }}" class="label label-primary noPrint">Просмотр</a>
                                            @if(Auth::user()->hasRole(1))
                                                <a href="/admin/nodes/edit/{{ $item->id }}" class="label label-warning noPrint">Редактировать</a>
                                                <a href="/admin/nodes/delete/{{ $item->id }}" class="label label-danger noPrint">Удалить</a>
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