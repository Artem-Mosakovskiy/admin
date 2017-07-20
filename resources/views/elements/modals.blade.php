<div class="modal fade" id="addCityModal" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="/admin/addPlace" id="addPlaceForm">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Добавить местоположение</h4>
                </div>
                <div class="modal-body">
                        <div class="form-group has-error">
                            <span class="help-block" id="message"></span>
                        </div>
                        <div id="add_city_select" class="{{ $errors->has('add_city_id') ? 'form-group has-error' : 'form-group' }}" style="display: none">
                            <label for="exampleInputEmail1">Населенный пункт</label>
                            {{ Form::select('city_id', $cities, null, ['class' => 'form-control']) }}
                            {!! $errors->first('add_city_id', '<span class="help-block">:message</label>') !!}
                        </div>

                        <div id="add_city_text" class="{{ $errors->has('add_city') ? 'form-group has-error' : 'form-group' }}" style="display: none">
                            <label for="exampleInputEmail1">Населенный пункт</label>
                            {{ Form::text('add_city', null, ['class' => 'form-control', 'placeholder' => 'Населенный пункт']) }}
                            {!! $errors->first('add_city', '<span class="help-block">:message</label>') !!}
                        </div>

                        <div id="add_street_select" class="{{ $errors->has('add_street_id') ? 'form-group has-error' : 'form-group' }}" style="display: none">
                            <label for="exampleInputEmail1">Улица</label>
                            {{ Form::select('street_id', $streets, null, ['class' => 'form-control']) }}
                            {!! $errors->first('add_street_id', '<span class="help-block">:message</label>') !!}
                        </div>

                        <div id="add_street_text" class="{{ $errors->has('add_street') ? 'form-group has-error' : 'form-group' }}" style="display: none">
                            <label for="exampleInputEmail1">Улица</label>
                            {{ Form::text('add_street', null, ['class' => 'form-control', 'placeholder' => 'Улица']) }}
                            {!! $errors->first('add_street', '<span class="help-block">:message</label>') !!}
                        </div>

                       {{-- <div id="add_house_select" class="{{ $errors->has('add_house_id') ? 'form-group has-error' : 'form-group' }}" style="display: none">
                            <label for="exampleInputEmail1">Дом</label>
                            {{ Form::select('add_house_id', $houses, null, ['class' => 'form-control']) }}
                            {!! $errors->first('add_house_id', '<span class="help-block">:message</label>') !!}
                        </div>--}}

                        <div id="add_house_text" class="{{ $errors->has('add_house_text') ? 'form-group has-error' : 'form-group' }}" style="display: none">
                            <label for="exampleInputEmail1">Дом</label>
                            {{ Form::text('add_house', null, ['class' => 'form-control', 'placeholder' => 'Дом']) }}
                            {!! $errors->first('add_house_text', '<span class="help-block">:message</label>') !!}
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </div>
            </form>
        </div>
    </div>
</div>