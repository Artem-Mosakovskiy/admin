@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Управляющие компании</h3>

                        <div class="box-tools">
                            <a href="/admin/ycompany/add" class="btn btn-success">Добавить</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Управляющая компания</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ycompany as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->company }}</td>
                                        <td>
                                            <a href="/admin/ycompany/edit/{{ $item->id }}" class="label label-warning">Редактировать</a>
                                            <a href="/admin/ycompany/delete/{{ $item->id }}" class="label label-danger">Удалить</a>
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