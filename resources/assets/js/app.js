
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$("#languages #none").click(function () {
    if ($("#languages #none").is(':checked')) {
        $("#languages input[type='checkbox']").each(function () {
            $(this).prop("checked", false);
            $(this).prop("disabled", true);
        });
        $(this).prop("checked", true);
        $(this).prop("disabled", false);
    }else{
        $("#languages input[type='checkbox']").each(function () {
            $(this).prop("disabled", false);
        });
    }
});

$('.custom-file-input').on('change',function(){
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').html(fileName);
});

