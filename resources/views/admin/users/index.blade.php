@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Пользователи</h3>

                        <div class="box-tools">
                            <a href="/admin/users/add" class="btn btn-success">Добавить</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Логин</th>
                                    <th>Фио</th>
                                    <th>Роль</th>
                                    <th>Тип</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->login }}</td>
                                        <td>
                                            {{ $item->f_name }} {{ $item->s_name }} {{ $item->t_name }}
                                        </td>
                                        <td>{{ $item->role->role }}</td>
                                        <td>{{ $item->type->type }}</td>
                                        <td>
                                            <a href="/admin/users/edit/{{ $item->id }}" class="label label-warning">Редактировать</a>
                                            <a href="/admin/users/delete/{{ $item->id }}" class="label label-danger">Удалить</a>
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