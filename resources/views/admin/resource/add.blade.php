@extends('layouts.app')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Добавить ресурс</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="/admin/resource/save" method="post">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="{{ $errors->has('f_name') ? 'form-group has-error' : 'form-group' }}">
                                <label for="exampleInputEmail1">Тип ресурса</label>
                                {{ Form::text('type', null, ['class' => 'form-control', 'placeholder' => 'Тип ресурса']) }}
                                {!! $errors->first('f_name', '<span class="help-block">:message</label>') !!}
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