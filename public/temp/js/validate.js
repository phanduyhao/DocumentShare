// Click để xóa các thông báo đỏ của check dữ liệu
$('form .input-field').each(function () {
    $(this).click(function () {
        $(this).parent().find('.helper').remove();
        $(this).removeClass('input-error'); //
    })
})

// Prevent click events within the form from triggering the body click event
$('body form').on('click', function(e) {
    e.stopPropagation();
});

// Kiểm tra dữ liệu đầu vào đã nhập hay chưa ?
function validateForm(formID) {
    let checkValid = true;
    $(formID).find('.input-field').each(function(){
        let value = $(this).val();
        let fieldType = $(this).attr('type'); // Get input field type
        $(this).removeClass('input-error'); // Remove input-error class
        // Check if the field is an email input and validate the format
        if (fieldType == 'email' && value !== '') {
            if (!isValidEmail(value)) {
                checkValid = false;
                $(this).addClass('input-error');
                let emailAlert = `<span class="helper text-danger" style="z-index: 999;margin-top: 75px;">Chưa nhập đúng kiểu email</span>`;
                $(this).parent().append(emailAlert);
            }
        }
        if(value == null || value == '' || value == undefined) {
            checkValid = false;
            $(this).addClass('input-error');
            let htmlAlert = `<span class="helper text-danger" style="z-index: 999;margin-top: 75px;">${$(this).data('require')}</span>`;
            $(this).parent().append(htmlAlert);
        }
    });
    return checkValid;
}
// Check xem có đúng kiểu Email khi nhập vào không ?
function isValidEmail(email) {
    // Basic email format validation using regular expression
    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}
