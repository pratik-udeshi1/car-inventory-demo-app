$(function() {

    $('#insert_manufactuer').on('submit', function(e) {

        e.preventDefault();

        var sd = validateForm(['manufacturer']);

        insertManufacturer();

    });
});

// Validating form inputs
function validateForm(input_fields) {

    $.each(input_fields, function(key, val) {
        if (!$("#" + val).val().trim()) {
            alert("Please provide " + val);
            exit();
        }
    });
}

// Inserting new Manufacturer
function insertManufacturer() {

    $.ajax({

        type: 'POST',
        url: ajaxUrl + '/insert_manufactuer.php',
        data: $('#insert_manufactuer').serialize(),

        success: function(data) {

            var form_clear = $('#insert_manufactuer')[0].reset();

            $("#insert_success").hide();
            $("#insert_fail").hide();

            if (data == 1) {
                $("#insert_success").show();
            } else {
                $("#insert_fail").show();
            }
        }
    });
}