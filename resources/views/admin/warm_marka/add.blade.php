@extends('layouts.app')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Добавить марку тепловычислителя</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="/admin/warm_marka/save" method="post">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="{{ $errors->has('marka') ? 'form-group has-error' : 'form-group' }}">
                                <label for="exampleInputEmail1">Марка тепловычислителя</label>
                                {{ Form::text('marka', null, ['class' => 'form-control', 'placeholder' => 'Марка тепловычислителя']) }}
                                {!! $errors->first('marka', '<span class="help-block">:message</label>') !!}
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