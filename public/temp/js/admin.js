// Gán sự kiện click cho checkbox
// Dropdown
$(document).ready(function(){
    $('.nav-item.dropdown-user').hover(function(){
        $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();
    }, function(){
        $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();
    });

    $('.nav-item.dropdown-user').on('click', function(){
        $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();
    });
});

// Thêm xóa active giữa các mục Sidebar
$(document).ready(function () {
    var currentPath = window.location.href;
    $('.menu-item a').each(function () {
        var menuItemPath = $(this).attr('href');
        if (menuItemPath == currentPath) {
            $('.menu-item').removeClass('active');
            $('.menu-item.open').removeClass('active open');
            $(this).closest('.menu-item').addClass('active');
            $(this)
                .closest('.menu-sub')
                .closest('.menu-item')
                .addClass('active open');
        }
    });
});

// tạo Alias tự động
$(document).ready(function () {
    $('#title-store').on('input', function () {
        var title = $(this).val();
        var slug = slugify(title);
        $('#slug-store').val(slug);
    });
    $('.form_cate_update').each(function () {
        var form_id = $(this).data('id');
        $('#title-edit-'+form_id).on('input',function () {
            var title = $(this).val();
            var slug = slugify(title);
            $('#slug-edit-'+form_id).val(slug); // Sửa chỗ này
            console.log('#slug-edit-'+form_id);
        });
    });

    function slugify(text) {
        var unaccentedText = text
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '');
        return unaccentedText
            .toLowerCase()
            .trim()
            .replace(/\s+/g, '-')
            .replace(/[^\w\-]+/g, '')
            .replace(/\-\-+/g, '-')
            .replace(/^-+|-+$/g, '');
    }

});

// Xóa dữ liệu không load lại trang

$(document).ready(function () {
    $('.btnDeleteAsk').on('click', function () {
        const id = $(this).data('id');
        const url = $(this).data('url');
        // Xóa vĩnh viễn
        $('.delete-forever').click(function(){
            $.ajax({
                url: url ,
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function(data){
                    console.log(data);
                    $('#deleteModal').modal('hide'); // Ẩn modal sau khi xóa thành công
                    $('.modal-backdrop.fade.show').addClass('d-none');
                    $(`tr[data-id="${id}"]`).remove(); // Xóa hàng trong bảng
                    setTimeout(function () {
                        alert('Đã xóa thành công !');
                    },300)
                },
                error: function(error){
                    alert('Bạn không có quyền thực hiện hành động này!')
                }
            });
        });
    });
});

// Show Modal check validate
$(document).ready(function () {
    $('.alert-error').each(function () {
        $(this).closest('.modal').modal('show')
    })
})



// TEST
$(document).ready(function(){
    $('body form button[type="submit"]').on('click', function(e){
        e.preventDefault();
        let form = $(this).closest('form');
        let formID = form.attr('id');
        let formAction = form.data('action'); // Lấy route action từ thuộc tính data-action
        if(validateForm(`#${formID}`)) {
            let formData = form.serialize(); // được sử dụng khi bạn muốn gửi dữ liệu của form dưới dạng chuỗi để thực hiện các yêu cầu HTTP như POST hoặc GET.
            $.ajax({
                type: "POST",
                url: formAction, // Sử dụng route action tương ứng của form
                data: formData,
                success: function(response) {
                    alert('Đã gửi thành công !');
                    // Xóa Các Dữ liệu cũ trong các ô Input
                    $(`#${formID} input[type=text], #${formID} input[type=email], #${formID} textarea`).val('');
                },
                error: function() {
                    console.log("An error occurred.");
                }
            });
        } else {
            alert('Các trường có dấu * là bắt buộc');
        }
    });

    // Click để xóa các thông báo đỏ của check dữ liệu
    $('body').on('click', '.input-field', function(e){
        e.preventDefault();
        $(this).parent().find('.helper').remove();
        $(this).removeClass('input-error'); //
    });
    // Add click event listener to the entire body
    $('body').on('click', function(e) {
        $('.helper').remove(); // Remove error helpers
        $('.input-error').removeClass('input-error'); // Remove input-error class
    });
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

            if(value == null || value == '' || value == undefined) {
                checkValid = false;
                $(this).addClass('input-error');
                let htmlAlert = `<span class="helper" style="z-index: 999;margin-top: 75px;">${$(this).data('require')}</span>`;
                $(this).parent().append(htmlAlert);
            }
            // Check if the field is an email input and validate the format
            if (fieldType === 'email' && value !== '') {
                if (!isValidEmail(value)) {
                    checkValid = false;
                    $(this).addClass('input-error');
                    let emailAlert = `<span class="helper" style="z-index: 999;margin-top: 75px;">Chưa nhập đúng kiểu email</span>`;
                    $(this).parent().append(emailAlert);
                }
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
});


