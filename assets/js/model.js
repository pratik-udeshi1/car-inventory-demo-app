$(function() {

    $('#insert_model').on('submit', function(e) {

        e.preventDefault();

        validateForm([
            'name',
            'note',
            'year',
            'color',
            'reg_number',
            'manufacturer_id'
        ]);

        insertModel();

    });
});

// Inseting new model
function insertModel() {

    var form = $("#insert_model");

    var formData = new FormData(form[0]);

    var files = form.find("#images")[0].files;

    console.log(files);

    $.each(files, function(key, val) {
        var file = $(this);
        formData.append(key, file[0]);
    });

    $.ajax({
        type: "POST",
        url: ajaxUrl + '/insert_model.php',
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {

            $("#insert_success").hide();
            $("#insert_fail").hide();

            if (data == 1) {
                $('#insert_model')[0].reset();
                $("#insert_success").show();
            } else {
                $("#insert_fail").show();
                $("#insert_fail").append("<br>" + data);
            }
        }

    });
}