$(function () {
    $('.checkbox_wrapper').on('click', function () {
        $(this).parents('.card').find('.checkbox_child').prop('checked', $(this).prop('checked'));
    });

    $('.checkbox_all').on('click', function () {
       $(this).parents().find('.checkbox_child').prop('checked', $(this).prop('checked'));
       $(this).parents().find('.checkbox_wrapper').prop('checked', $(this).prop('checked'));
    });
});
