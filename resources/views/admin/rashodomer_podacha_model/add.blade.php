@extends('layouts.app')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Добавить модель расходомера на подаче</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="/admin/rashodomer_podacha_model/save" method="post">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="{{ $errors->has('marka_id') ? 'form-group has-error' : 'form-group' }}">
                                <label for="exampleInputEmail1">Марка расходомера на подаче</label>
                                {{ Form::select('marka_id', $parent_select, null, ['class' => 'form-control']) }}
                                {!! $errors->first('marka_id', '<span class="help-block">:message</label>') !!}
                            </div>

                            <div class="{{ $errors->has('model') ? 'form-group has-error' : 'form-group' }}">
                                <label for="exampleInputEmail1">Модель расходомера на подаче</label>
                                {{ Form::text('model', null, ['class' => 'form-control', 'placeholder' => 'Модель расходомера на подаче']) }}
                                {!! $errors->first('model', '<span class="help-block">:message</label>') !!}
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