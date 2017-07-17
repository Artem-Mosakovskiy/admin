@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Ресурсоснабжающие компании</h3>

                        <div class="box-tools">
                            <a href="/admin/rsocompany/add" class="btn btn-success">Добавить</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ресурсоснабжающая компания</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rsocompany as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->company }}</td>
                                        <td>
                                            <a href="/admin/rsocompany/edit/{{ $item->id }}" class="label label-warning">Редактировать</a>
                                            <a href="/admin/rsocompany/delete/{{ $item->id }}" class="label label-danger">Удалить</a>
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