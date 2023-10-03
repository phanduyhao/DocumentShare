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
// $(document).ready(function () {
//     $('.alert-error').each(function () {
//         $(this).closest('.modal').modal('show')
//     })
// })
