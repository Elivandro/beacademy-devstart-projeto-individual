$(document).ready(function() {

    $(".togglePassword").on('click', function(e) {
        e.preventDefault()

        var input_group = $(this).closest('.form-group')
        var input = input_group.find('input.form-control')
        var icon = input_group.find('i')

        input.attr('type', input.attr("type") === "text" ? 'password' : 'text')

        icon.toggleClass('fa-eye-slash fa-eye')
    });

    $("input[id*='phone']").inputmask({
        mask: ['(99)9-9999-9999'],
        keepStatic: false
    });

});