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

    // --------------------------- COMMENT ------------------------ //

    $('#comment_area form button[type="submit"]').on('click', function(e){
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
                    toastr.success('Đã gửi bình luận!', 'Thông báo');
                    // Xóa Các Dữ liệu cũ trong các ô Input
                    $(`#${formID} input[type=text], #${formID} input[type=email], #${formID} textarea`).val('');
                    // Gọi hàm hiển thị Comment ra HTML
                    var dataId = $('#'+formID+' .boxCommentFormReplyID ').attr('id');
                    if (formID === 'boxCommentForm') {
                        appendNewComment(response, 'comment-list');
                    } else if (formID === 'boxCommentFormReply_'+dataId) {
                        appendNewComment(response, 'comment-list__child-'+dataId);
                    }
                },
                error: function() {
                    toastr.error('Lỗi bình luận!', 'Thông báo');
                }
            });
        }
    });

// Add click event listener to the entire body
    $('body').on('click', function(e) {
        $('.helper').remove(); // Remove error helpers
        $('.input-error').removeClass('input-error'); // Remove input-error class
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

//    HIỂN THỊ COMMENT
    function appendNewComment(commentData, targetList) {
        var avatar = $('.my-avatar').attr('src');
        var currentDate = new Date();
        var hours = currentDate.getHours();
        var minutes = currentDate.getMinutes();
        var seconds = currentDate.getSeconds();
        var day = currentDate.getDate();
        var month = currentDate.getMonth() + 1; // Tháng trong JavaScript bắt đầu từ 0
        var year = currentDate.getFullYear();
        var newComment = $('<div class="comments-users d-flex mb-4">' +
            '<div class="comment-avata d-flex align-items-center justify-content-center me-3">' +
            '<img width="50" class="rounded-circle" src="' + avatar + '" alt="Avatar">' +
            '</div>' +
            '<div class="comment-user-info ">' +
            '<div class="comment-user-info-item">' +
            '<a href="">' + commentData.user_name + '</a>' +
            '</div>' +
            '<div class="comment-user-info-item">' +
            '<i class="fa-solid fa-calendar-days me-1"></i>' +
            '<span>' + year + '-' + month + '-' + day +' ' + hours + ':' + minutes +':' + seconds + '</span>' +
            '</div>' +
            '<div class="comment-user-info-item">' +
            '<p class="comment-user-desc m-0 mt-3">' +
            commentData.comment +
            '</p>' +
            '</div>' +
            '<div class="reply">' +
            '<form id="boxCommentFormReply_' + commentData.id + '" class="comment-box child d-none bg-white p-3" data-action="http://documentmanage.test/sendComment">' +
            '<p id="' + commentData.id + '" class="boxCommentFormReplyID d-none"></p>' +
            '<input type="hidden" name="_token" value="jmbwntWbDWzOKRBaCsvOPJtXzjTKp4tLhDcCXkq1" autocomplete="off">' +
            '<input type="hidden" name="document" value="59">' +
            '<input type="hidden" name="parent_comment_id" value="' + commentData.id + '">' +
            '<div class="d-flex">' +
            '<div class="comment-avata d-flex align-items-center justify-content-center me-2">' +
            '<img width="50" class="rounded-circle" src="' + avatar + '" alt="Avatar">' +
            '</div>' +
            '<div class="form-comment w-100">' +
            '<textarea name="comment" class="input-field textarea-note w-100 p-3" rows="3" placeholder="Nhập bình luận *" data-require="Vui lòng nhập nội dung!"></textarea>' +
            '</div>' +
            '</div>' +
            '<button type="submit" class="send-comment float-end btn btn-primary">Gửi bình luận</button>' +
            '</form>' +
            '</div>' +
            '</div>' +
            '</div>');

        // Thêm bình luận vào thể có class " comment-list "
        $(`.${targetList}`).prepend(newComment);
    }


// Chức năng Bấm vào " Trả lời " thì hiển form bình luận
    $('.reply-text__link').on('click', function(event) {
        event.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết
        // Ẩn tất cả các form trả lời hiện có
        $('.comment-box.child').addClass('d-none');

        // Hiển thị form trả lời tương ứng với liên kết được click
        var commentBox = $(this).closest('.comment-user').find('.comment-box.child');
        commentBox.removeClass('d-none');
    });
