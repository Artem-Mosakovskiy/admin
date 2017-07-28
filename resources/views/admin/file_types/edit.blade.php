@extends('layouts.app')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Редактирование типа файла</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="/admin/file_types/update" method="post">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="{{ $errors->has('type') ? 'form-group has-error' : 'form-group' }}">
                                <label for="exampleInputEmail1">Тип файла</label>
                                <input type="hidden" name="id" value="{{ $file_type->id }}">
                                {{ Form::text('type', $file_type->type, ['class' => 'form-control', 'placeholder' => 'Тип файла']) }}
                                {!! $errors->first('type', '<span class="help-block">:message</label>') !!}
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