$(document).ready(function () {
    // Lấy ra trang 1 của file pdf ở list
    $('.docs-item__pdf').each(function(){
        const urlPdf = $(this).data('src');
        const container = $(this); // Lưu trữ giá trị của 'this'
        pdfjsLib.getDocument(urlPdf).promise.then(function(pdf) {
            pdf.getPage(1).then(function(page) {
                const canvas = document.createElement('canvas');
                const context = canvas.getContext('2d');
                const viewport = page.getViewport({ scale: 1 });
                canvas.height = viewport.height;
                canvas.width = viewport.width;
                const renderContext = {
                    canvasContext: context,
                    viewport: viewport
                };
                page.render(renderContext);
                container.append(canvas);
            });
        });
    });

    $('.docs-title').each(function() {
        var maxHeight = 58;
        var $title = $(this);
        var originalText = $title.text();
        $title.css({'max-height': maxHeight + 'px', 'overflow': 'hidden', 'text-overflow': 'ellipsis'});
        if ($title[0].scrollHeight > maxHeight || $title[0].scrollHeight == maxHeight) {
            var index = originalText.lastIndexOf(' ', originalText.length = 70); // Giảm độ dài thêm 4 ký tự để tránh trường hợp chưa kịp xuống hàng thì đã vượt quá chiều cao
            var shortenedText = originalText.substring(0, index) + '...';
            $title.text(shortenedText);
        }
    });

    // Hiển thị 1 nửa số trang Pdf và bắt người dùng tải xuống
    const pdfUrl = $('#pdfContainer').data('src');
    let totalPageCount = 0;
    let reachedHalfway = false; // Cờ để đánh dấu đã đến nửa trang hay chưa
    // Sử dụng PDF.js để hiển thị tệp PDF trên trang web
    pdfjsLib.getDocument(pdfUrl).promise.then(function(pdf) {
        // Lưu trữ tổng số trang
        totalPageCount = pdf.numPages;
        for (let pageNumber = 1; pageNumber <= pdf.numPages; pageNumber++) {
            pdf.getPage(pageNumber).then(function(page) {
                const canvas = document.createElement('canvas');
                const context = canvas.getContext('2d');
                const viewport = page.getViewport({ scale: 1.5 });
                canvas.height = viewport.height;
                canvas.width = viewport.width;
                const renderContext = {
                    canvasContext: context,
                    viewport: viewport
                };
                page.render(renderContext);
                $('#pdfContainer').append(canvas);
            });
        }
        // Kiểm tra khi cuộn đến nửa số trang
        $('#pdfContainer').scroll(function() {
            const scrollTop = $(this).scrollTop();
            const containerHeight = $(this).height();
            const scrollHeight = $(this)[0].scrollHeight;
            const scrolledPercentage = (scrollTop + containerHeight) / scrollHeight;
            if (scrolledPercentage >= 0.5 && !reachedHalfway) {
                toastr.error('Tải xuống để xem toàn bộ', 'Thông báo');
                reachedHalfway = true;
                $(this).addClass('overflow-hidden');
                $(this).removeClass('overflow-auto');
            }
        });
    });
})

$(document).ready(function() {

    // increase-view
    let currentURL = window.location.href;
    let urlObject = new URL(currentURL);
    let docSlug = urlObject.pathname.split('/').pop();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "/increase-view",
        data: {
            doc_slug: docSlug,
        },
        success: function(response) {
            console.log(response);
        },
        error: function(response) {
            console.log(response);
        }
    });

//    Change Background Main-slide
    let img = $('.main-slide .slick-current.slick-active img').attr('src');
    $('.main-bg img').attr('src',img);

// DOWNLOAD - SCORE
    $('.download-file').click(function(e) {
        // e.preventDefault();
        let userId = $(this).data('user-id'); // Lấy ID của người dùng
        if(userId){
            let documentId = $(this).data('id');
            let score_user = $(this).data('score-user');
            let score_doc = $(this).data('score-doc');
            let author_id = $(this).data('author');
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
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: "POST",
                            url: "/plus-score", // Đường dẫn đến phương thức để lấy tên người dùng
                            data: {
                                author_id: author_id,
                                score_doc: score_doc
                            },
                            success: function(response) {
                            },
                            error: function() {
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
        }else{
            e.preventDefault();
            toastr.error('Bạn chưa đăng nhập!', 'Thông báo');
        }
    });

//    Favourite
    $('.btn-favourite').click(function(e) {
        e.preventDefault();
        let userId = $(this).data('user-id');
        console.log(userId);
        if(userId){
            let documentId = $(this).data('id');
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
                    },
                    success: function(response) {
                        if(response.success) {
                            toastr.success(response.message, 'Thông báo');
                        }
                    },
                    error: function() {
                        toastr.error('Lỗi yêu thích!', 'Thông báo');
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
        }else{
            e.preventDefault();
            toastr.error('Bạn chưa đăng nhập!', 'Thông báo');
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
        let userId = $(this).data('user-id'); // Lấy ID của người dùng
        if(userId){
            if (rated) {
                let documentId = $(this).data('doc-id');
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
                        rate: widthNumber
                    },
                    success: function(response) {
                        $('.filled-stars').css('width', '0%');
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
        }else{
            toastr.error('Bạn chưa đăng nhập!', 'Thông báo');
        }
    });

// Đổi mật khẩu
    $('#btn-reset_pass').on('click', function () {
        // Clear old error messages
        $('#old_pass_error, #new_pass_error, #confirm_pass_error').text('');

        var oldPass = $('#old_pass').val();
        var newPass = $('#new_pass').val();
        var confirmPass = $('#confirm_pass').val();
        var hasError = false;

        if (oldPass === '') {
            $('#old_pass_error').text('Vui lòng nhập mật khẩu hiện tại!');
            hasError = true;
        }
        if (newPass === '') {
            $('#new_pass_error').text('Vui lòng nhập mật khẩu mới!');
            hasError = true;
        }
        if (confirmPass === '') {
            $('#confirm_pass_error').text('Vui lòng nhập lại mật khẩu mới!');
            hasError = true;
        }
        if (hasError) {
            return;
        }
        // Send AJAX request
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '/change-password',
            data: {
                _token: $('input[name="_token"]').val(),
                old_pass: oldPass,
                new_pass: newPass,
                confirm_pass: confirmPass
            },
            success: function (response) {
                if (response.success) {
                    toastr.success('Đổi mật khẩu thành công!', 'Thông báo');
                    $('#old_pass, #new_pass, #confirm_pass').val('');
                } else {
                    if (response.errors.old_pass) {
                        $('#old_pass_error').text(response.errors.old_pass);
                    }
                    if (response.errors.new_pass) {
                        $('#new_pass_error').text(response.errors.new_pass);
                    }
                    if (response.errors.confirm_pass) {
                        $('#confirm_pass_error').text(response.errors.confirm_pass);
                    }
                }
            },
            error: function () {
                // Handle AJAX error if needed
                alert('Something went wrong with the AJAX request');
            }
        });
    });

//    Check validate ở phần upload chọn Danh mục
    $(document).ready(function () {
        var cateSelect = $('#form_document_upload #cate_select');
        var cateMore = $('#form_document_upload #cate_add');


        cateSelect.on('change', function () {
            updateValidationClass();
        });

        cateMore.on('input', function () {
            updateValidationClass();
        });

        function updateValidationClass() {
            var cateSelect_helper = $('#form_document_upload .cate_select .helper');
            var cateMore_helper = $('#form_document_upload .cate_more .helper');
            if (cateSelect.val()) {
                // Nếu người dùng đã chọn danh mục, loại bỏ class và vô hiệu hóa input của cateMore
                cateMore.removeClass('input-field input-error').prop('disabled', true);
                cateMore_helper.addClass('d-none');

                // Loại bỏ class và vô hiệu hóa input của cateSelect
                cateSelect.removeClass('input-field input-error');
                cateSelect_helper.addClass('d-none');
            } else if (cateMore.val()) {
                // Nếu người dùng đã nhập dữ liệu, loại bỏ class và vô hiệu hóa select của cateSelect
                cateSelect.removeClass('input-field input-error').prop('disabled', true);
                cateSelect_helper.addClass('d-none');

                // Loại bỏ class của cateMore
                cateMore.removeClass('input-field input-error');
                cateMore_helper.addClass('d-none');
            } else {
                // Nếu cả hai đều trống, thêm class và kích hoạt cả hai input
                cateSelect.addClass('input-field input-error').prop('disabled', false);
                cateMore.addClass('input-field').prop('disabled', false);
                cateMore_helper.addClass('d-none');
                cateSelect_helper.addClass('d-none');
            }
        }
    });

//    Gửi phản hồi về Email
    $('.btn-send-feedback').click(function () {
        var formData = $('#feedbackForm').serialize();

        $.ajax({
            type: 'POST',
            url: '/send-feedback',
            data: formData,
            success: function (response) {
                console.log(response);  // Xử lý phản hồi từ server (nếu cần)
                alert('Phản hồi đã được gửi thành công!');
            },
            error: function (error) {
                console.log(error);  // Xử lý lỗi (nếu cần)
                alert('Có lỗi xảy ra khi gửi phản hồi!');
            }
        });
    })
});
