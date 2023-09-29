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
    $('#title').on('input', function () {
        var title = $(this).val();
        var slug = slugify(title);
        $('#slug').val(slug);
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
        const user_id = $(this).data('id');

        // Xóa vĩnh viễn
        $('.delete-user').click(function(){
            $.ajax({
                url: '/admin/users/' + user_id,
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function(data){
                    console.log(data);
                    $('#deleteModal').modal('hide'); // Ẩn modal sau khi xóa thành công
                    $('.modal-backdrop.fade.show').addClass('d-none');
                    $(`tr[data-id="${user_id}"]`).remove(); // Xóa hàng trong bảng
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

// Edit user
$(document).ready(function () {
    $('.btnEditUser').on('click',function () {
        const userId = $(this).data('id');

    })
});


