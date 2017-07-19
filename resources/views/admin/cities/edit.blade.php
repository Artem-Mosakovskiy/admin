@extends('layouts.app')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Редактирование города</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="/admin/cities/update" method="post">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="{{ $errors->has('city') ? 'form-group has-error' : 'form-group' }}">
                                <label for="exampleInputEmail1">Город</label>
                                <input type="hidden" name="id" value="{{ $city->id }}">
                                {{ Form::text('city', $city->city, ['class' => 'form-control', 'placeholder' => 'Город']) }}
                                {!! $errors->first('city', '<span class="help-block">:message</label>') !!}
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