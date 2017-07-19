@extends('layouts.app')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Редактирование дома</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="/admin/houses/update" method="post">
                        {{ csrf_field() }}
                        <div class="box-body">

                            <div class="{{ $errors->has('city_id') ? 'form-group has-error' : 'form-group' }}">
                                <label for="exampleInputEmail1">Населенный пункт</label>
                                <input type="hidden" name="id" value="{{ $house->id }}">
                                {{ Form::select('city_id', $cities, $house->city_id, ['class' => 'form-control']) }}
                                {!! $errors->first('city_id', '<span class="help-block">:message</label>') !!}
                            </div>

                            <div class="{{ $errors->has('street_id') ? 'form-group has-error' : 'form-group' }}">
                                <label for="exampleInputEmail1">Улица</label>
                                <input type="hidden" name="id" value="{{ $house->id }}">
                                {{ Form::select('street_id', $streets, $house->street_id, ['class' => 'form-control']) }}
                                {!! $errors->first('street_id', '<span class="help-block">:message</label>') !!}
                            </div>

                            <div class="{{ $errors->has('house') ? 'form-group has-error' : 'form-group' }}">
                                <label for="exampleInputEmail1">Дом</label>
                                <input type="hidden" name="id" value="{{ $house->id }}">
                                {{ Form::text('house', $house->house, ['class' => 'form-control', 'placeholder' => 'Дом']) }}
                                {!! $errors->first('house', '<span class="help-block">:message</label>') !!}
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