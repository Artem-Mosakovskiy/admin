@extends('layouts.app')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Добавить улицу</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="/admin/streets/save" method="post">
                        {{ csrf_field() }}
                        <div class="box-body">

                            <div class="{{ $errors->has('street') ? 'form-group has-error' : 'form-group' }}">
                                <label for="exampleInputEmail1">Город</label>
                                {{ Form::select('city_id', $cities, null, ['class' => 'form-control']) }}
                                {!! $errors->first('street', '<span class="help-block">:message</label>') !!}
                            </div>

                            <div class="{{ $errors->has('street') ? 'form-group has-error' : 'form-group' }}">
                                <label for="exampleInputEmail1">Улица</label>
                                {{ Form::text('street', null, ['class' => 'form-control', 'placeholder' => 'Улица']) }}
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