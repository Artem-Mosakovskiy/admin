@extends('layouts.app')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Редактирование модели тепловычислителя</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="/admin/warm_model/update" method="post">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="{{ $errors->has('marka_id') ? 'form-group has-error' : 'form-group' }}">
                                <label for="exampleInputEmail1">Марка тепловычислителя</label>
                                {{ Form::select('marka_id', $parent_select, $item->marka->id, ['class' => 'form-control']) }}
                                {!! $errors->first('marka_id', '<span class="help-block">:message</label>') !!}
                            </div>

                            <div class="{{ $errors->has('model') ? 'form-group has-error' : 'form-group' }}">
                                <label for="exampleInputEmail1">Модель тепловычислителя</label>
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                {{ Form::text('model', $item->model, ['class' => 'form-control', 'placeholder' => 'Модель тепловычислителя']) }}
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