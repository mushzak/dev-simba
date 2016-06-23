$(function () {

$('form.validate').validate({
    submitHandler: function (form) {
        form.submit();
    },
    errorPlacement: function (error, element) {
    } // suppress standard messages
});

$('form.wizard').formToWizard({
    beforeButton: 'before-form',
    submitButton: 'submit-form',
    nextBtnClass: 'btn btn-primary next',
    prevBtnClass: 'btn btn-default prev',
    buttonTag: 'button',
    validateBeforeNext: function (form, step) {
        var stepIsValid = true;
        var validator = form.validate();
        $(':input', step).each(function (index) {
            var x = validator.element(this);
            stepIsValid = stepIsValid && (typeof x == 'undefined' || x);
        });
        step.find('.questionnaire-error').toggleClass('questionnaire-hide', stepIsValid);
        return stepIsValid;
    },
    select: function (form, step) {
        $(":input", step).first().focus();
    },
    progress: function (i, count) {
        $('#progress-complete').width('' + ((i + 1) / count * 100) + '%');
    }
})
.keypress(function (e) {
    // click Next or Submit button on enter key
    if (e.which != 13) return;
    e.preventDefault();
    $(this).parent().find('.next:visible').click();
});

});