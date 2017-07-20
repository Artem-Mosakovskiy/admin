@extends('layouts.app')

@section('content')
    @include('elements.modals')
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Добавить узел учета</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="/admin/nodes/save" method="post">
                        {{ csrf_field() }}
                        <div class="box-body">

                            <div class="col-md-12">
                                <div class="col-md-10">
                                    <div class="{{ $errors->has('city_id') ? 'form-group has-error' : 'form-group' }}">
                                        <label for="exampleInputEmail1">Населенный пункт</label>
                                        {{ Form::select('city_id', $cities, null, ['class' => 'form-control']) }}
                                        {!! $errors->first('city_id', '<span class="help-block">:message</label>') !!}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button data-type="city" class="btn btn-primary addButton">+</button>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-10">
                                    <div class="{{ $errors->has('street_id') ? 'form-group has-error' : 'form-group' }}">
                                        <label for="exampleInputEmail1">Улица</label>
                                        {{ Form::select('street_id', $streets, null, ['class' => 'form-control']) }}
                                        {!! $errors->first('street_id', '<span class="help-block">:message</label>') !!}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button data-type="street" class="btn btn-info addButton">+</button>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-10">
                                    <div class="{{ $errors->has('house_id') ? 'form-group has-error' : 'form-group' }}">
                                        <label for="exampleInputEmail1">Дом</label>
                                        {{ Form::select('house_id', $houses, null, ['class' => 'form-control']) }}
                                        {!! $errors->first('house_id', '<span class="help-block">:message</label>') !!}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button data-type="house" class="btn btn-warning addButton">+</button>
                                </div>
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