<script src="/temp/admin/libs/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="/temp/build/js/slick.min.js"></script>
<script>

    // Slick - SLider Tài liệu
    $(".slider-product").slick({
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        arrows: true,
        draggable: false,
        prevArrow: `<div class="btn-right"><i class="ti-angle-right"></i></div>`,
        nextArrow: `<div class="btn-left"><i class="ti-angle-left"></i></div>`,
        dots: false,
    });

    function goToStep2() {
        $("#step-1").hide()
        $("#step-2").show()
    }
    function openInfo() {
        $("#info-user").show()
        $("#update-info-user").hide()
        $("#edit-password").hide()
    }
    function openEditInfo() {
        $("#info-user").hide()
        $("#update-info-user").show()
        $("#edit-password").hide()
    }
    function openEditPassword() {
        $("#info-user").hide()
        $("#update-info-user").hide()
        $("#edit-password").show()
    }

    $('.main-slide-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.main-slide-nav'
    });
    $('.main-slide-nav').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: '.main-slide-for',
        autoplay:true,
        autoplaySpeed: 2000,
        dots: true,
        fade: true,
        focusOnSelect: true
    });

    $('.docs-slide__home-top').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
    });
    $('.docs-slide__home-bottom').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
    });

</script>
<script src="/temp/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/temp/bootstrap/js/bootstrap.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script type="text/javascript" src="/temp/build/js/main.min.js"></script>
<script src="/temp/build/js/admin.min.js"></script>
<script type="text/javascript" src="/temp/build/js/slide.min.js"></script>
<script type="text/javascript" src="/temp/build/js/validate.min.js"></script>
<script src="/temp/admin/assets/vendor/libs/jquery/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
