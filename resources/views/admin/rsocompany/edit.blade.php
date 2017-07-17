@extends('layouts.app')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Редактирование ресурсоснабжающей компании</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="/admin/rsocompany/update" method="post">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="{{ $errors->has('company') ? 'form-group has-error' : 'form-group' }}">
                                <label for="exampleInputEmail1">Ресурсоснабжающая компания</label>
                                <input type="hidden" name="id" value="{{ $rsocompany->id }}">
                                {{ Form::text('company', $rsocompany->company, ['class' => 'form-control', 'placeholder' => 'Ресурсоснабжающая компания']) }}
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