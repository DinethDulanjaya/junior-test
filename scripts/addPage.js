$(document).ready(function(){
    $('.div-toggle').trigger('change');
    // Method for dynamic form
    $(document).on('change', '.div-toggle', function() {
        var target = $(this).data('target');
        var show = $("option:selected", this).data('show');
        $(target).children().addClass('hide');
        $(show).removeClass('hide');
    });
})