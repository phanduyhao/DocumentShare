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


// Thêm ảnh
function previewImages(event, formID) {
    var previewContainer = $('#image-preview-' + formID);
    var files = event.target.files;
    previewContainer.empty(); // Xóa tất cả ảnh hiện có

    $.each(files, function (index, file) {
        var reader = new FileReader();

        reader.onload = function (e) {
            var imgContainer = $('<div>').addClass('image-container');
            var imgElement = $('<img>').attr('src', e.target.result).css('max-width', '200px');
            var deleteButton = $('<button>').html('X').addClass('delete-button').attr('type', 'button');

            deleteButton.on('click', function () {
                var container = $(this).parent();
                container.remove();
                updateFileInput(formID);
            });

            imgContainer.append(imgElement).append(deleteButton);
            previewContainer.append(imgContainer);
        }

        reader.readAsDataURL(file);
    });

    updateFileInput(formID);
}

function updateFileInput(formID) {
    var fileInput = $('#file-input-' + formID);
    var previewContainer = $('#image-preview-' + formID);
    var imageContainers = previewContainer.find('.image-container');

    if (imageContainers.length > 0) {
        fileInput.attr('multiple', 'multiple');
    } else {
        fileInput.removeAttr('multiple');
    }
}


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
    $('.form-edit').each(function () {
        var title = $(this).find('.form-control.title')
        var slug = $(this).find('.form-control.slug')
        title.on('input',function () {
            var title_val = $(this).val();
            var slug_val = slugify(title_val);
            slug.val(slug_val); // Sửa chỗ này
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
                    window.location.reload()
                },
                error: function(error){
                    alert('Bạn không có quyền thực hiện hành động này!')
                }
            });
        });
    });
});


// Thêm mới dữ liệu
$(document).ready(function(){

    // Create
    $('body .form-create button[type="submit"]').on('click', function(e){
        e.preventDefault();
        let form = $(this).closest('form');
        let formID = form.attr('id');
        if(validateForm(`#${formID}`)) {
            form.submit();
        }
    });

    // Edit
    $('body .form-edit button[type="submit"]').on('click', function(e){
        e.preventDefault();
        let form = $(this).closest('form');
        let formID = form.attr('id');
        if(validateForm(`#${formID}`)) {
            form.submit();
        }
    });

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
});
