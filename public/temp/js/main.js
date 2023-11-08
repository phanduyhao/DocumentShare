// // Header Mobile
// $('.header-icon .bar-actions.bar').click(function () {
//     if($('.header-icon__active').hasClass('d-none')){
//         $('.header-icon__active').removeClass('d-none')
//         $('.header-icon__active').addClass('d-flex')
//     }else{
//         $('.header-icon__active').removeClass('d-flex')
//         $('.header-icon__active').addClass('d-none')
//     }
// })
// var bar_mobile = $('.header-responsive .bar-actions.bar')
// var overlay_mobile = $('.layout-site .over-lay')
// var header_mobile = $('.header-nav.mobile')
// bar_mobile.click(function () {
//     overlay_mobile.css('right','0');
//     overlay_mobile.css('transition','.5s all');
//     header_mobile.css('transform','translateX(0)')
// })
// overlay_mobile.click(function () {
//     $(this).css('right','');
//     header_mobile.css('transform','translateX(-100%)')
// })
//
//
//
//
// // Main
// document.getElementById('backtotop').addEventListener('click', function() {
//     // Cuộn lên đầu trang
//     window.scrollTo({
//         top: 0,
//         behavior: 'smooth' // Hiệu ứng cuộn mượt (smooth scroll)
//     });
// });
//
// $(document).ready(function() {
//
//     // Xử lý Click Thêm Active
//     function addActive(event, selector) {
//         // Xóa class 'active' khỏi tất cả các thẻ có class 'active'
//         $(selector).removeClass('active');
//         // Thêm class 'active' vào thẻ được click
//         $(event.target).addClass('active');
//     }
//     $('.category-item').click(function(event) {
//         addActive(event, '.category-item');
//     });
//     $('.main-content__cate').each(function() {
//         var itemId = $(this).attr('id');
//         $('#' + itemId + ' .cate-child__item').click(function(event) {
//             addActive(event, '#' + itemId + ' .cate-child__item');
//         });
//     });
//     $(' .list-video').click(function(event) {
//         event.preventDefault()
//         $(' .list-video').removeClass('active');
//         $(this).addClass('active')
//     });
//
//
//     // Xử lý chuyển Tab bài viết theo danh mục
//     // Xử lý sự kiện click
//     $(".main-content__cate .cate-child__item").click(function() {
//         var cateID = $(this).closest('.main-content__cate').attr('id'); // Lấy ID của phần tử cha gần nhất có class main-content__cate
//         var itemId = $(this).attr("id"); // Lấy ID của tab được click
//         // Ẩn tất cả các swiper-content bên trong phần tử cha main-content__cate
//         $("#" + cateID + " .swiper-content").addClass("d-none");
//         $("#" + cateID + " .swiper-content").removeClass("d-block");
//         // Hiển thị swiper-content tương ứng với tab được click
//         $("#" + itemId + ".swiper-content").removeClass("d-none");
//         $("#" + itemId + ".swiper-content").addClass("d-block");
//
//     });
//
// });
//
//
//
//

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



//      DOWNLOAD NORMAL

    // $('.download-file').click(function() {
    //     let documentId = $(this).data('id');
    //     let userId = $(this).data('user-id'); // Lấy ID của người dùng
    //     let score_user = $(this).data('score-user');
    //     let score_doc = $(this).data('score-doc');
    //     let user_score = score_user - score_doc;
    //     // Gửi yêu cầu AJAX
    //         $.ajax({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             },
    //             type: "POST",
    //             url: "/download", // Đổi thành đường dẫn thích hợp của bạn
    //             data: {
    //                 document_id: documentId,
    //                 user_id: userId,
    //                 user_score: user_score,
    //             },
    //             error: function() {
    //                 alert("Lỗi tải xuống!");
    //             }
    //         });
    // });

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
        let userId = $(this).data('user-id'); // Lấy ID của người dùng
        var favouriteIcon = $(this).find('i.icon-favourite'); // Tìm phần tử i trong btn-favourite
        if (!favouriteIcon.hasClass('text-danger')) {
            favouriteIcon.addClass('text-danger'); // Nếu không có class text-danger, thêm vào
        }else{
            favouriteIcon.removeClass('text-danger'); // Nếu không có class text-danger, thêm vào
        }
        // Gửi yêu cầu AJAX
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "/favourite", // Đổi thành đường dẫn thích hợp của bạn
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
    });


//    ĐÁNH GIÁ
        $('.star').click(function() {
            const index = $(this).index();
            const rating = (index + 1) * 20; // Tính điểm đánh giá (từ 20 đến 100)
            $('.filled-stars').css('width', rating + '%');
        });

});
