@extends('layouts.app')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Редактирование управляющей компании</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="/admin/ycompany/update" method="post">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="{{ $errors->has('company') ? 'form-group has-error' : 'form-group' }}">
                                <label for="exampleInputEmail1">Управляющая компания</label>
                                <input type="hidden" name="id" value="{{ $ycompany->id }}">
                                {{ Form::text('company', $ycompany->company, ['class' => 'form-control', 'placeholder' => 'Управляющая компания']) }}
                                {!! $errors->first('company', '<span class="help-block">:message</label>') !!}
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