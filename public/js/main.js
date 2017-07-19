$(function () {
    $('select[name=city_id]').on('change', function () {
        var city_id = $(this).val();
        $.get('/admin/cities/ajaxGetStreets/' + city_id, function (response) {
            console.log(response);
            $('select[name=street_id]').find('option').remove();
            $.each(response,function (k,v) {
                $('select[name=street_id]')
                    .append($("<option></option>")
                        .attr("value",k)
                        .text(v));
            });
        })
    });
});