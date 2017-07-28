var $urlobj;

$(function () {
    ajaxOptions('select[name=city_id]', 'select[name=street_id]','/admin/cities/ajaxGetStreets/');
    ajaxOptions('select[name=street_id]', 'select[name=house_id]','/admin/houses/ajaxGetHouses/');

    var active_select = false;
    $('.addButton').on('click',function(e){
        e.preventDefault();
        $('#addCityModal').modal('show');
        var type = $(this).attr('data-type');
        active_select = type;

        var city = $('select[name=city_id]').val();
        var street = $('select[name=street_id]').val();
        if(!city) city = null;
        if(!street) street = null;

        switch (type){
            case 'city':
                $('#add_city_text').show();
                break;
            case 'street':
                $('#add_city_select').show();
                $('#add_street_text').show();
                break;
            case 'house':
                $('#add_city_select').show();
                $('#add_street_select').show();
                $('#add_house_text').show();
                break;
        }
    });

    $('#addCityModal').on('hidden.bs.modal',function () {
        $('#addCityModal .form-group').hide();
        $('#addCityModal').find('input').val(null);
        //$('#addCityModal').find('select').val(null);
        active_select = false;
    });

    $('#addPlaceForm').on('submit', function (e) {
        e.preventDefault();

        $.post('/admin/addPlace', $(this).serialize(), function (data) {
            if(!data.status){
                $('#addPlaceForm #message').text(data.message);
            }else {
                if(active_select && data.object){
                    switch (active_select){
                        case 'city':
                            addOptions('city_id', data.object);
                            break;
                        case 'street':
                            addOptions('street_id', data.object);
                            break;
                        case 'house':
                            addOptions('house_id', data.object);
                            break;
                    }
                    $('#addCityModal').modal('hide');
                }else {
                    $('#addPlaceForm #message').text('Что-то пошло не так');
                }
            }
        });
    });

    $.datepicker.setDefaults({
        format: 'yyyy-mm-dd'
    });

    var options = {
        format: 'yyyy-mm-dd'
    };

    $('#data').datepicker(options);
    $('#date1').datepicker(options);
    $('#date2').datepicker(options);
    $('#date3').datepicker(options);
    $('#date4').datepicker(options);
    $('#date5').datepicker(options);
    $('#date6').datepicker({
        format: 'yyyy-mm-dd',
        orientation: "top"
    });

    $('#addFile').on('click', function(){
        $('.deletePhoto').show();
        var $cloned = $('.filesBox .files:first').clone(true);
        $cloned.find('input').val('');

        counter++;

        $cloned.find('#file').attr('name', 'ufiles[' + counter + '][file]');
        $cloned.find('#file_type').attr('name', 'ufiles[' + counter + '][file_type_id]');
        $cloned.find('#note').attr('name', 'ufiles[' + counter + '][note]');

        $('.filesBox').append($cloned);
    });

    $('.deletePhoto').on('click', function () {
        console.log('sdfsdf');
        var count_files = $('.filesBox .files').length;
        if(count_files > 1){
            $(this).parents('.files').remove();
        }else {
            $(this).parents('.files').find('input').val('');
            $('.deletePhoto').parents('.files').find('select option:selected').removeAttr('selected');
            $(this).hide();
        }

    });

    $('#upload_file').on('click', function(e){
        e.preventDefault();

        $urlobj = $(this).find('input');

        OpenServerBrowser(
            'http://admin/filemanager/show',
            screen.width * 0.7,
            screen.height * 0.7 ) ;

    });

});

function SetUrl( url ) {
    url = url.replace("http://admin/filemanager/userfiles/", "");
    $urlobj.val(url);
}

function OpenServerBrowser( url, width, height )
{
    var iLeft = (screen.width - width) / 2 ;
    var iTop = (screen.height - height) / 2 ;
    var sOptions = "toolbar=no,status=no,resizable=yes,dependent=yes" ;
    sOptions += ",width=" + width ;
    sOptions += ",height=" + height ;
    sOptions += ",left=" + iLeft ;
    sOptions += ",top=" + iTop ;
    var oWindow = window.open( url, "BrowseWindow", sOptions ) ;
}

function addOptions(select, object) {
    $('select[name=' + select + ']' + ' option:selected').attr('selected', false);
    $('select[name=' + select + ']').append(
        $('<option>').attr('value', object.value).text(object.text)
    );
    $('select[name=' + select + ']' + ' option[value=' + object.value + ']').attr('selected', true);
}

function ajaxOptions(selectChandedName, selectToChange, url) {
    $(selectChandedName).on('change', function () {
        $(selectChandedName + ' option[value=' + $(this).val() + ']').attr('selected', true);
        var id = $(this).val();
        $.get(url + id, function (response) {
            $(selectToChange).find('option').remove();
            $.each(response,function (k,v) {
                $(selectToChange)
                    .append($("<option></option>")
                        .attr("value",k)
                        .text(v));
            });
            $(selectToChange + ' option[value=0]').attr('selected', true);
        })
    });
}