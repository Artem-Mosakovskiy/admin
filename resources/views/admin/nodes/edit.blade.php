@extends('layouts.app')

@section('content')
    @include('elements.modals')
    <section class="content">
        <div class="row">
            <form role="form" action="/admin/nodes/update" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $node->id }}">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Редактировать узел учета</h3>
                        </div>
                        <div class="box-body">

                            <div class="{{ $errors->has('city_id') ? 'form-group has-error' : 'form-group' }}">
                                <div class="col-md-10">
                                    <label for="exampleInputEmail1">Населенный пункт</label>
                                    {{ Form::select('city_id', $cities, isset($node->house->city_id) ? $node->house->city_id: null, ['class' => 'form-control']) }}
                                    {!! $errors->first('city_id', '<span class="help-block">:message</label>') !!}
                                </div>
                                <div class="col-md-2">
                                    <button data-type="city" class="btn btn-primary addButton">+</button>
                                </div>
                            </div>

                            <div class="{{ $errors->has('street_id') ? 'form-group has-error' : 'form-group' }}">
                                <div class="col-md-10">
                                    <label for="exampleInputEmail1">Улица</label>
                                    {{ Form::select('street_id', $streets, isset($node->house->street_id) ? $node->house->street_id : null , ['class' => 'form-control']) }}
                                    {!! $errors->first('street_id', '<span class="help-block">:message</label>') !!}
                                </div>
                                <div class="col-md-2">
                                    <button data-type="street" class="btn btn-info addButton">+</button>
                                </div>
                            </div>

                            <div class="{{ $errors->has('house_id') ? 'form-group has-error' : 'form-group' }}">
                                <div class="col-md-10">
                                    <label for="exampleInputEmail1">Дом</label>
                                    {{ Form::select('house_id', $houses, isset($node->house_id) ? $node->house_id : null, ['class' => 'form-control']) }}
                                    {!! $errors->first('house_id', '<span class="help-block">:message</label>') !!}
                                </div>
                                <div class="col-md-2">
                                    <button data-type="house" class="btn btn-warning addButton">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="{{ $errors->has('resource_type_id') ? 'form-group has-error' : 'form-group' }}">
                                <div class="col-md-10">
                                    <label for="exampleInputEmail1">Вид ресурса</label>
                                    {{ Form::select('resource_type_id', $resources, $node->resource_type_id, ['class' => 'form-control']) }}
                                    {!! $errors->first('resource_type_id', '<span class="help-block">:message</label>') !!}
                                </div>
                            </div>

                            <div class="{{ $errors->has('uk_company_id') ? 'form-group has-error' : 'form-group' }}">
                                <div class="col-md-10">
                                    <label for="exampleInputEmail1">Управляющая компания</label>
                                    {{ Form::select('uk_company_id', $ycompanies, $node->uk_company_id, ['class' => 'form-control']) }}
                                    {!! $errors->first('uk_company_id', '<span class="help-block">:message</label>') !!}
                                </div>
                            </div>

                            <div class="{{ $errors->has('rso_company_id') ? 'form-group has-error' : 'form-group' }}">
                                <div class="col-md-10">
                                    <label for="exampleInputEmail1">Ресурсоснабжающая компания</label>
                                    {{ Form::select('rso_company_id', $rcompanies, $node->rso_company_id, ['class' => 'form-control']) }}
                                    {!! $errors->first('rso_company_id', '<span class="help-block">:message</label>') !!}
                                </div>
                            </div>

                            <div class="{{ $errors->has('other') ? 'form-group has-error' : 'form-group' }}">
                                <div class="col-md-10">
                                    <label for="exampleInputEmail1">Примечания</label>
                                    {{ Form::text('other', $node->other, ['class' => 'form-control' , 'placeholder' => 'Примечания']) }}
                                    {!! $errors->first('other', '<span class="help-block">:message</label>') !!}
                                </div>
                            </div>

                        </div>
                        <div class="box-body">
                            <div class="{{ $errors->has('data') ? 'form-group has-error' : 'form-group' }}">
                                <div class="col-md-10">
                                    <label for="exampleInputEmail1">Дата проверки</label>
                                    <div class="input-group date">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>

                                        {{ Form::text('data', $node->data, ['class' => 'form-control', 'id' => 'data']) }}
                                        {!! $errors->first('data', '<span class="help-block">:message</label>') !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-body filesBox">
                            <script>
                                var counter = 0;
                            </script>
                            @foreach($nodes_files as $i => $item)
                                @if($item->file)
                                    <div class="form-group files">
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Файл (не обязательно)</label>
                                            <div id="upload_file">
                                                {{ Form::text('ufiles['.$i.'][file]', $item->file->file, ['class' => 'form-control', 'id' => 'file']) }}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Тип файла</label>
                                            {{ Form::select('ufiles['.$i.'][file_type_id]', $file_types, $item->file->file_type_id, ['class' => 'form-control', 'id' => 'file_type']) }}
                                        </div>
                                        <div class="col-md-12">
                                            <label for="exampleInputEmail1">Примечание</label>
                                            {{ Form::text('ufiles['.$i.'][note]', $item->file->note, ['class' => 'form-control', 'id' => 'note']) }}
                                        </div>
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-danger deletePhoto">Удалить</button>
                                        </div>
                                    </div>
                                    <script> counter = '{{ $i }}'; </script>
                                @endif
                            @endforeach
                            @if($nodes_files->count() == 0)
                                <div class="form-group files">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Файл</label>
                                        <div id="upload_file">
                                            {{ Form::text('ufiles[0][file]', '', ['class' => 'form-control', 'id' => 'file']) }}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Тип файла</label>
                                        {{ Form::select('ufiles[0][file_type_id]', $file_types, null, ['class' => 'form-control', 'id' => 'file_type']) }}
                                    </div>
                                    <div class="col-md-12">
                                        <label for="exampleInputEmail1">Примечание</label>
                                        {{ Form::text('ufiles[0][note]', '', ['class' => 'form-control', 'id' => 'note']) }}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="box-body">
                            <div class="col-md-12">
                                <button type="button" class="btn pull-right" id="addFile">Добавить файл</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="{{ $errors->has('teplo_model_id') ? 'form-group has-error' : 'form-group' }}">
                                <div class="col-md-12">
                                    <label for="exampleInputEmail1">Модель тепловычислителя</label>
                                    {{ Form::select('teplo_model_id', $teplo_model, $node->teplo_model_id, ['class' => 'form-control']) }}
                                    {!! $errors->first('teplo_model_id', '<span class="help-block">:message</label>') !!}
                                </div>
                            </div>

                            <div class="{{ $errors->has('teplo_model_nomer') ? 'form-group has-error' : 'form-group' }}">
                                <div class="col-md-12">
                                    <label for="exampleInputEmail1">№</label>
                                    {{ Form::text('teplo_model_nomer', $node->teplo_model_nomer, ['class' => 'form-control']) }}
                                    {!! $errors->first('teplo_model_nomer', '<span class="help-block">:message</label>') !!}
                                </div>
                            </div>


                            <div class="{{ $errors->has('teplo_model_date') ? 'form-group has-error' : 'form-group' }}">
                                <div class="col-md-12">
                                    <label for="exampleInputEmail1">Дата проверки</label>
                                    {{ Form::text('teplo_model_date', $node->teplo_model_date, ['class' => 'form-control', 'id'  => 'date6']) }}
                                    {!! $errors->first('teplo_model_date', '<span class="help-block">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="{{ $errors->has('rashodomer_pod_model_id') ? 'form-group has-error' : 'form-group' }}">
                                <div class="col-md-12">
                                    <label for="exampleInputEmail1">Модель расходомера на подаче</label>
                                    {{ Form::select('rashodomer_pod_model_id', $rashodomer_pod, $node->rashodomer_pod_model_id, ['class' => 'form-control']) }}
                                    {!! $errors->first('rashodomer_pod_model_id', '<span class="help-block">:message</label>') !!}
                                </div>
                            </div>

                            <div class="{{ $errors->has('rashodomer_pod_model_nomer') ? 'form-group has-error' : 'form-group' }}">
                                <div class="col-md-12">
                                    <label for="exampleInputEmail1">№</label>
                                    {{ Form::text('rashodomer_pod_model_nomer', $node->rashodomer_pod_model_nomer, ['class' => 'form-control']) }}
                                    {!! $errors->first('rashodomer_pod_model_nomer', '<span class="help-block">:message</label>') !!}
                                </div>
                            </div>

                            <div class="{{ $errors->has('rashodomer_pod_model_date') ? 'form-group has-error' : 'form-group' }}">
                                <div class="col-md-12">
                                    <label for="exampleInputEmail1">Дата проверки</label>
                                    {{ Form::text('rashodomer_pod_model_date', $node->rashodomer_pod_model_date, ['class' => 'form-control', 'id'  => 'date5']) }}
                                    {!! $errors->first('rashodomer_pod_model_date', '<span class="help-block">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="{{ $errors->has('rashodomer_obr_model_id') ? 'form-group has-error' : 'form-group' }}">
                                <div class="col-md-12">
                                    <label for="exampleInputEmail1">Модель расходомера на обработке</label>
                                    {{ Form::select('rashodomer_obr_model_id', $rashodomer_obr, $node->rashodomer_obr_model_id, ['class' => 'form-control']) }}
                                    {!! $errors->first('rashodomer_obr_model_id', '<span class="help-block">:message</label>') !!}
                                </div>
                            </div>

                            <div class="{{ $errors->has('rashodomer_obr_model_nomer') ? 'form-group has-error' : 'form-group' }}">
                                <div class="col-md-12">
                                    <label for="exampleInputEmail1">№</label>
                                    {{ Form::text('rashodomer_obr_model_nomer', $node->rashodomer_obr_model_nomer, ['class' => 'form-control']) }}
                                    {!! $errors->first('rashodomer_obr_model_nomer', '<span class="help-block">:message</label>') !!}
                                </div>
                            </div>

                            <div class="{{ $errors->has('rashodomer_obr_model_date') ? 'form-group has-error' : 'form-group' }}">
                                <div class="col-md-12">
                                    <label for="exampleInputEmail1">Дата проверки</label>
                                    {{ Form::text('rashodomer_obr_model_date', $node->rashodomer_obr_model_date, ['class' => 'form-control', 'id'  => 'date4']) }}
                                    {!! $errors->first('rashodomer_obr_model_date', '<span class="help-block">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="{{ $errors->has('termopar_id') ? 'form-group has-error' : 'form-group' }}">
                                <div class="col-md-12">
                                    <label for="exampleInputEmail1">Марка комплект термопар</label>
                                    {{ Form::select('termopar_id', $termopar, $node->termopar_id, ['class' => 'form-control']) }}
                                    {!! $errors->first('termopar_id', '<span class="help-block">:message</label>') !!}
                                </div>
                            </div>

                            <div class="{{ $errors->has('termopar_nomer') ? 'form-group has-error' : 'form-group' }}">
                                <div class="col-md-12">
                                    <label for="exampleInputEmail1">№</label>
                                    {{ Form::text('termopar_nomer', $node->termopar_nomer, ['class' => 'form-control']) }}
                                    {!! $errors->first('termopar_nomer', '<span class="help-block">:message</label>') !!}
                                </div>
                            </div>

                            <div class="{{ $errors->has('termopar_date') ? 'form-group has-error' : 'form-group' }}">
                                <div class="col-md-12">
                                    <label for="exampleInputEmail1">Дата проверки</label>
                                    {{ Form::text('termopar_date', $node->termopar_date, ['class' => 'form-control', 'id'  => 'date3']) }}
                                    {!! $errors->first('termopar_date', '<span class="help-block">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="{{ $errors->has('davlenie_pod_id') ? 'form-group has-error' : 'form-group' }}">
                                <div class="col-md-12">
                                    <label for="exampleInputEmail1">Марка датчика давления на подаче</label>
                                    {{ Form::select('davlenie_pod_id', $davlenie_pod, $node->davlenie_pod_id, ['class' => 'form-control']) }}
                                    {!! $errors->first('davlenie_pod_id', '<span class="help-block">:message</label>') !!}
                                </div>
                            </div>

                            <div class="{{ $errors->has('davlenie_pod_nomer') ? 'form-group has-error' : 'form-group' }}">
                                <div class="col-md-12">
                                    <label for="exampleInputEmail1">№</label>
                                    {{ Form::text('davlenie_pod_nomer', $node->davlenie_pod_nomer, ['class' => 'form-control']) }}
                                    {!! $errors->first('davlenie_pod_nomer', '<span class="help-block">:message</label>') !!}
                                </div>
                            </div>

                            <div class="{{ $errors->has('davlenie_pod_date') ? 'form-group has-error' : 'form-group' }}">
                                <div class="col-md-12">
                                    <label for="exampleInputEmail1">Дата проверки</label>
                                    {{ Form::text('davlenie_pod_date', $node->davlenie_pod_date, ['class' => 'form-control', 'id' => 'date2']) }}
                                    {!! $errors->first('davlenie_pod_date', '<span class="help-block">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="{{ $errors->has('davlenie_obr_id') ? 'form-group has-error' : 'form-group' }}">
                                <div class="col-md-12">
                                    <label for="exampleInputEmail1">Марка датчика давления на обработке</label>
                                    {{ Form::select('davlenie_obr_id', $davlenie_obr, $node->davlenie_obr_id, ['class' => 'form-control']) }}
                                    {!! $errors->first('davlenie_obr_id', '<span class="help-block">:message</label>') !!}
                                </div>
                            </div>

                            <div class="{{ $errors->has('davlenie_obr_nomer') ? 'form-group has-error' : 'form-group' }}">
                                <div class="col-md-12">
                                    <label for="exampleInputEmail1">№</label>
                                    {{ Form::text('davlenie_obr_nomer', $node->davlenie_obr_nomer, ['class' => 'form-control']) }}
                                    {!! $errors->first('davlenie_obr_nomer', '<span class="help-block">:message</label>') !!}
                                </div>
                            </div>

                            <div class="{{ $errors->has('davlenie_obr_date') ? 'form-group has-error' : 'form-group' }}">
                                <div class="col-md-12">
                                    <label for="exampleInputEmail1">Дата проверки</label>
                                    {{ Form::text('davlenie_obr_date', $node->davlenie_obr_date, ['class' => 'form-control', 'id' => 'date1']) }}
                                    {!! $errors->first('davlenie_obr_date', '<span class="help-block">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection