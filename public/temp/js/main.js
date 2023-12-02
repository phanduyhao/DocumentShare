

$(document).ready(function() {

// DOWNLOAD - SCORE
    $('.download-file').click(function(e) {
        // e.preventDefault();
        let documentId = $(this).data('id');
        let userId = $(this).data('user-id'); // Lấy ID của người dùng
        let score_user = $(this).data('score-user');
        let score_doc = $(this).data('score-doc');

        // Gửi yêu cầu AJAX
        if(score_user > score_doc || score_user == score_doc){
            let user_score = score_user - score_doc;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "/download",
                data: {
                    document_id: documentId,
                    user_id: userId,
                },
                success: function(response) {
                    // AJAX thành công, cập nhật điểm của người dùng
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        url: "/update-score", // Thay đổi thành đường dẫn thích hợp
                        data: {
                            user_score: user_score,
                        },
                        success: function() {
                            toastr.success('Tải xuống thành công!', 'Thông báo');
                        },
                        error: function() {
                            alert("Lỗi cập nhật điểm!");
                        }
                    });
                },
                error: function() {
                    alert("Lỗi tải xuống!");
                }
            });
        } else {
            e.preventDefault();
            toastr.error('Không đủ điểm!', 'Thông báo');
        }
    });

//    Views
    $('.btn-show__details-file').click(function() {
        let documentId = $(this).data('id');
        let userId = $(this).data('user-id'); // Lấy ID của người dùng
        // Gửi yêu cầu AJAX
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "/view", // Đổi thành đường dẫn thích hợp của bạn
            data: {
                document_id: documentId,
                user_id: userId,
            },
            error: function() {
                alert("Lỗi!")
            }
        });
    });

//    Favourite
    $('.btn-favourite').click(function(e) {
        e.preventDefault();
        let documentId = $(this).data('id');
        let userId = $(this).data('user-id');
        var favouriteIcon = $(this).find('i.icon-favourite');

        // Kiểm tra xem nút đã được yêu thích hay chưa
        if (favouriteIcon.hasClass('text-danger')) {
            // Nếu đã yêu thích, thực hiện hành động bỏ yêu thích
            favouriteIcon.removeClass('text-danger');

            // Gửi yêu cầu AJAX để xóa khỏi danh sách yêu thích
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "/unfavourite", // Đặt đúng đường dẫn của bạn
                data: {
                    document_id: documentId,
                    user_id: userId,
                },
                success: function(response) {
                    if(response.success) {
                        toastr.success(response.message, 'Thông báo');
                    }
                },
                error: function() {
                    alert("Lỗi!");
                }
            });
        } else {
            // Nếu chưa yêu thích, thực hiện hành động thêm vào danh sách yêu thích
            favouriteIcon.addClass('text-danger');

            // Gửi yêu cầu AJAX để thêm vào danh sách yêu thích
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "/favourite", // Đặt đúng đường dẫn của bạn
                data: {
                    document_id: documentId,
                    user_id: userId,
                },
                success: function(response) {
                    if(response.success) {
                        toastr.success(response.message, 'Thông báo');
                    }
                },
                error: function() {
                    alert("Lỗi!");
                }
            });
        }
    });



//    ĐÁNH GIÁ

    let rated = false; // Biến để theo dõi xem đã đánh giá chưa
    $('.star').click(function() {
        const index = $(this).index();
        const rating = (index + 1) * 20; // Tính điểm đánh giá (từ 20 đến 100)
        $('.filled-stars').css('width', rating + '%');
        rated = true; // Đánh giá đã được thực hiện
    });

    $('.btn-rate').click(function () {
        if (rated) {
            let documentId = $(this).data('doc-id');
            let userId = $(this).data('user-id'); // Lấy ID của người dùng
            let styleString = $('.filled-stars').attr('style');
            let widthValue = styleString.split(':')[1];
            let trimmedWidthValue = widthValue.trim();
            var widthNumber = parseInt(trimmedWidthValue, 10);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "/rate", // Đổi thành đường dẫn thích hợp của bạn
                data: {
                    document_id: documentId,
                    user_id: userId,
                    rate: widthNumber
                },
                success: function(response) {
                    if(response.success) {
                        toastr.success(response.message, 'Thông báo');
                    }
                },
                error: function() {
                    toastr.error('Lỗi đánh giá!', 'Thông báo');
                }
            });
        } else {
            toastr.error('Chưa đánh giá tài liệu!', 'Thông báo');
        }
    });
});
