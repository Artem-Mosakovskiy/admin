@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="col-md-8 col-md-offset-2">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Карточка <strong>ОПУ</strong></h3>
                        </div>
                        <div class="box-body no-padding">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th colspan="2" style="text-align: center">
                                            @if(isset($node->house->city))
                                                {{ $node->house->city->city }} {{ $node->house->street->street }} {{ $node->house->house }}
                                            @endif
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(isset($node->resource->type))
                                    <tr>
                                        <td><strong>Учитываемый ресурс</strong></td>
                                        <td>
                                            {{ $node->resource->type }}
                                        </td>
                                    </tr>
                                @endif

                                @if(isset($node->rso->company))
                                    <tr>
                                        <td><strong>Ресурсоснабжающая организация</strong></td>
                                        <td>{{ $node->rso->company }}</td>
                                    </tr>
                                @endif

                                @if(isset($node->uk->company))
                                    <tr>
                                        <td><strong>Управляющая компания</strong></td>
                                        <td>{{ $node->uk->company }}</td>
                                    </tr>
                                @endif

                                @if($node->data)
                                    <tr>
                                        <td><strong>Дата очередной поверки</strong></td>
                                        <td>{{ $node->data }}</td>
                                    </tr>
                                @endif

                                @if(isset($node->teplo->marka->marka))
                                    <tr>
                                        <td><strong>Тепловычислитель</strong></td>
                                        <td>
                                            {{ $node->teplo->marka->marka }}
                                            {{ $node->teplo->model }}
                                            @if($node->teplo_model_nomer)
                                                № {{ $node->teplo_model_nomer }}<br>
                                            @endif

                                            @if($node->teplo_model_date )
                                                проверка до {{ $node->teplo_model_date }}
                                            @endif

                                        </td>
                                    </tr>
                                @endif

                                @if(isset($node->rashodomer_pod->marka->marka))
                                    <tr>
                                        <td><strong>Расходомер на подаче</strong></td>
                                        <td>
                                            {{ $node->rashodomer_pod->marka->marka }}
                                            {{ $node->rashodomer_pod->model }}
                                            @if($node->rashodomer_pod_model_nomer)
                                                № {{ $node->rashodomer_pod_model_nomer }}<br>
                                            @endif

                                            @if($node->rashodomer_pod_model_date)
                                                проверка до {{ $node->rashodomer_pod_model_date }}
                                            @endif

                                        </td>
                                    </tr>
                                @endif

                                @if(isset($node->rashodomer_obr->marka->marka))
                                    <tr>
                                        <td><strong>Расходомер на обработке</strong></td>
                                        <td>
                                            {{ $node->rashodomer_obr->marka->marka }}
                                            {{ $node->rashodomer_obr->model }}
                                            @if($node->rashodomer_obr_model_nomer)
                                                № {{ $node->rashodomer_obr_model_nomer }}<br>
                                            @endif

                                            @if($node->rashodomer_obr_model_date)
                                                проверка до {{ $node->rashodomer_obr_model_date }}
                                            @endif
                                        </td>
                                    </tr>
                                @endif

                                @if(isset($node->termopar->complect))
                                    <tr>
                                        <td><strong>Комплект термопар</strong></td>
                                        <td>
                                            {{ $node->termopar->complect }}
                                            @if($node->termopar_nomer)
                                                № {{ $node->termopar_nomer }}<br>
                                            @endif

                                            @if($node->termopar_date)
                                                проверка до {{ $node->termopar_date }}
                                            @endif

                                        </td>
                                    </tr>
                                @endif

                                @if(isset($node->davlenie_pod->device))
                                    <tr>
                                        <td><strong>Датчик давления на подаче</strong></td>
                                        <td>
                                            {{ $node->davlenie_pod->device }}
                                            @if($node->davlenie_pod_nomer)
                                                № {{ $node->davlenie_pod_nomer }}<br>
                                            @endif

                                            @if($node->davlenie_pod_date)
                                                проверка до {{ $node->davlenie_pod_date }}
                                            @endif
                                        </td>
                                    </tr>
                                @endif

                                @if(isset($node->davlenie_obr->device))
                                    <tr>
                                        <td><strong>Датчик давления на обработке</strong></td>
                                        <td>
                                            {{ $node->davlenie_obr->device }}
                                            @if($node->davlenie_obr_nomer)
                                                № {{ $node->davlenie_obr_nomer }}<br>
                                            @endif

                                            @if($node->davlenie_obr_date)
                                                проверка до {{ $node->davlenie_obr_date }}
                                            @endif

                                        </td>

                                    </tr>
                                @endif

                                @if($node->other)
                                    <tr>
                                        <td><strong>Примечание</strong></td>
                                        <td>{{ $node->other }}</td>
                                    </tr>
                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div>

                    @if($nodes_files->count())
                        <div class="box box-primary collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Файлы</h3>

                            {{--<div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>--}}
                        </div>
                            <div class="box-body" style="display:block;">
                                <ul class="products-list product-list-in-box">
                                    @foreach($nodes_files as $item)
                                        <li class="item col-md-6">
                                            <div class="product-img">
                                                <a target="_blank" href="/filemanager/userfiles/{{ $item->file->file }}">
                                                    @if(Helper::isImg('/filemanager/userfiles/' . $item->file->file))
                                                        <img src="/filemanager/userfiles/{{ $item->file->file }}" alt="Image">
                                                    @else
                                                        <img src="/images/file.png" alt="Image">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <a target="_blank" href="/filemanager/userfiles/{{ $item->file->file }}" class="product-title">{{ $item->file->note ? $item->file->note : '' }}</a>
                                                <span class="product-description">
                                                    {{ $item->file->type ? $item->file->type->type : '' }}
                                                </span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection