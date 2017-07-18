@extends('layouts.app')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Редактирование коплекта термопар</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="/admin/complect/update" method="post">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="{{ $errors->has('complect') ? 'form-group has-error' : 'form-group' }}">
                                <label for="exampleInputEmail1">Комплект термопар</label>
                                <input type="hidden" name="id" value="{{ $complect->id }}">
                                {{ Form::text('complect', $complect->complect, ['class' => 'form-control', 'placeholder' => 'Комплект термопар']) }}
                                {!! $errors->first('complect', '<span class="help-block">:message</label>') !!}
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