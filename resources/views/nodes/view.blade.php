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
                                            {{ $node->teplo_model_nomer }}
                                            {{ $node->teplo_model_date }}
                                        </td>
                                    </tr>
                                @endif

                                @if(isset($node->rashodomer_pod->marka->marka))
                                    <tr>
                                        <td><strong>Расходомер на подаче</strong></td>
                                        <td>
                                            {{ $node->rashodomer_pod->marka->marka }}
                                            {{ $node->rashodomer_pod->model }}
                                            {{ $node->rashodomer_pod_model_nomer }}
                                            {{ $node->rashodomer_pod_model_date }}
                                        </td>
                                    </tr>
                                @endif

                                @if(isset($node->rashodomer_obr->marka->marka))
                                    <tr>
                                        <td><strong>Расходомер на обратке</strong></td>
                                        <td>
                                            {{ $node->rashodomer_obr->marka->marka }}
                                            {{ $node->rashodomer_obr->model }}
                                            {{ $node->rashodomer_obr_model_nomer }}
                                            {{ $node->rashodomer_obr_model_date }}
                                        </td>
                                    </tr>
                                @endif

                                @if(isset($node->termopar->complect))
                                    <tr>
                                        <td><strong>Комплект термопар</strong></td>
                                        <td>
                                            {{ $node->termopar->complect }}
                                            {{ $node->termopar_nomer }}
                                            {{ $node->termopar_date }}
                                        </td>
                                    </tr>
                                @endif

                                @if(isset($node->davlenie_pod->device))
                                    <tr>
                                        <td><strong>Датчик давления на подаче</strong></td>
                                        <td>
                                            {{ $node->davlenie_pod->device }}
                                            {{ $node->davlenie_pod_nomer }}
                                            {{ $node->davlenie_pod_date }}
                                        </td>
                                    </tr>
                                @endif

                                @if(isset($node->davlenie_obr->device))
                                    <tr>
                                        <td><strong>Датчик давления на обратке</strong></td>
                                        <td>
                                            {{ $node->davlenie_obr->device }}
                                            {{ $node->davlenie_obr_nomer }}
                                            {{ $node->davlenie_obr_date }}
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
                </div>
            </div>
        </div>
    </section>

@endsection