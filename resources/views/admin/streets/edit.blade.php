@extends('layouts.app')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Редактирование улицы</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="/admin/streets/update" method="post">
                        {{ csrf_field() }}
                        <div class="box-body">

                            <div class="{{ $errors->has('city_id') ? 'form-group has-error' : 'form-group' }}">
                                <label for="exampleInputEmail1">Населенный пункт</label>
                                <input type="hidden" name="id" value="{{ $street->id }}">
                                {{ Form::select('city_id', $cities, $street->city->city, ['class' => 'form-control']) }}
                                {!! $errors->first('city_id', '<span class="help-block">:message</label>') !!}
                            </div>

                            <div class="{{ $errors->has('street') ? 'form-group has-error' : 'form-group' }}">
                                <label for="exampleInputEmail1">Улица</label>
                                <input type="hidden" name="id" value="{{ $street->id }}">
                                {{ Form::text('street', $street->street, ['class' => 'form-control', 'placeholder' => 'Улица']) }}
                                {!! $errors->first('street', '<span class="help-block">:message</label>') !!}
                            </div>

                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection