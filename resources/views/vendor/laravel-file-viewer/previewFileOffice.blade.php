<?php
$page_title=$filename;
?>
@extends('admin.layout_office_admin')

@section('content')
<!--PDF-->
<link rel="stylesheet" href="{{ asset('vendor/laravel-file-viewer/officetohtml/pdf/pdf.viewer.css') }}">
<script src="{{ asset('vendor/laravel-file-viewer/officetohtml/pdf/pdf.js') }}"></script>
<!--Docs-->
<script src="{{ asset('vendor/laravel-file-viewer/officetohtml/docx/jszip-utils.js') }}"></script>
<script src="{{ asset('vendor/laravel-file-viewer/officetohtml/docx/mammoth.browser.min.js') }}"></script>
<!--PPTX-->
<link rel="stylesheet" href="{{ asset('vendor/laravel-file-viewer/officetohtml/PPTXjs/css/pptxjs.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/laravel-file-viewer/officetohtml/PPTXjs/css/nv.d3.min.css') }}">
<script type="text/javascript" src="{{ asset('vendor/laravel-file-viewer/officetohtml/PPTXjs/js/filereader.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/laravel-file-viewer/officetohtml/PPTXjs/js/d3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/laravel-file-viewer/officetohtml/PPTXjs/js/nv.d3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/laravel-file-viewer/officetohtml/PPTXjs/js/pptxjs.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/laravel-file-viewer/officetohtml/PPTXjs/js/divs2slides.js') }}"></script>

<!--All Spreadsheet -->
<link rel="stylesheet" href="{{ asset('vendor/laravel-file-viewer/officetohtml/SheetJS/handsontable.full.min.css') }}">
<script type="text/javascript" src="{{ asset('vendor/laravel-file-viewer/officetohtml/SheetJS/handsontable.full.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/laravel-file-viewer/officetohtml/SheetJS/xlsx.full.min.js') }}"></script>
<!--Image viewer-->
<link rel="stylesheet" href="{{ asset('vendor/laravel-file-viewer/officetohtml/verySimpleImageViewer/css/jquery.verySimpleImageViewer.css') }}">
<script type="text/javascript" src="{{ asset('vendor/laravel-file-viewer/officetohtml/verySimpleImageViewer/js/jquery.verySimpleImageViewer.js') }}"></script>
<!--officeToHtml-->
<script src="{{ asset('vendor/laravel-file-viewer/officetohtml/officeToHtml/officeToHtml.js') }}"></script>
<link rel="stylesheet" href="{{ asset('vendor/laravel-file-viewer/officetohtml/officeToHtml/officeToHtml.css') }}">
<style>
    .file-detail-card{
        width: 100%;
    bottom: 0px;
    left: 0px;
    z-index: 999;
    background: #ffffffed;
    /* position: fixed; */
    }
    .preview_container{
        /* border: solid 1px lightgray; */
        overflow: scroll;
        background: white;
        padding: 1em;
        height: 90vh
    }

    .jqvsiv_main_image_content img{
        width: 100%;
        height: auto;
    }
    /*#all_slides_warpper{*/
    /*    width: max-content;*/
    /*    transform: scale(1) !important;*/
    /*}*/
    /*.col-sm-7 #all_slides_warpper{*/
    /*    transform: scale(0.65) !important;*/
    /*}*/
</style>

@include('laravel-file-viewer::docstyledef')
    <div class="mt-4">
        <a href="{{route('documents.index')}}" class="">
            <i class='bx bx-arrow-back fw-bold fs-1' ></i>
        </a>
        <h2 class="text-center mt-3">{{$document->file}}</h2>
    </div>
    <div class="row mt-5">
        <div class="col-sm-7">
            <div id="resolte-contaniner" class="preview_container overflow-hidden d-flex flex-column align-items-center mx-auto bg-transparent"></div>
        </div>
        <div class="col-sm-5 ">
            <h2 class="text-black-main fw-semibold text-center border-bottom">Thông tin chi tiết:</h2>
            <div class="info-item border-bottom mb-3">
                <h4 class="info-title text-black-main">Slug :</h4>
                <h5 class="info-details ms-4">{{$document->slug}}</h5>
            </div>
            <div class="info-item border-bottom mb-3">
                <h4 class="info-title text-black-main">Description :</h4>
                <h5 class="info-details ms-4">{{$document->description}}</h5>
            </div>
            <div class="info-item border-bottom mb-3">
                <h4 class="info-title text-black-main">Author :</h4>
                <h5 class="info-details ms-4">{{$document->user_id}} - {{$username}}</h5>
            </div>
            <div class="info-item border-bottom mb-3">
                <h4 class="info-title text-black-main">Category :</h4>
                <h5 class="info-details ms-4">{{$cate_title}}</h5>
            </div>
            <div class="info-item border-bottom mb-3">
                <h4 class="info-title text-black-main">Point :</h4>
                <h5 class="info-details ms-4">{{$document->score}}</h5>
            </div>
            <div class="info-item border-bottom mb-3">
                <h4 class="info-title text-black-main">Size :</h4>
                <h5 class="info-details ms-4">{{$document->size}}</h5>
            </div>
            @if($document->source != null)
                <div class="info-item border-bottom mb-3">
                    <h4 class="info-title text-black-main">Source :</h4>
                    <h5 class="info-details ms-4">{{$document->source}}</h5>
                </div>
            @endif
            <div class="info-item border-bottom mb-3">
                <h4 class="info-title text-black-main">Tag :</h4>
                <h5 class="info-details ms-4">{{$tag_name}}</h5>
            </div>
            <div class="info-item border-bottom mb-3">
                <h4 class="info-title text-black-main">Status :</h4>
                <div class="d-flex align-items-center ">
                    @if($document->status == 1)
                        <i class='bx bx-check fs-2 fw-bold text-success'></i>
                        <h5 class="info-details ms-4 mb-0 text-success">{{$status}}</h5>
                    @elseif($document->status == 2)
                        <i class='bx bx-loader-circle fs-2 fw-bold text-warning'></i>
                        <h5 class="info-details ms-4 mb-0 text-warning">{{$status}}</h5>
                    @elseif($document->status == 3)
                        <i class='bx bxs-x-square fs-2 fw-bold text-danger'></i>
                        <h5 class="info-details ms-4 mb-0 text-danger">{{$status}}</h5>
                    @endif
                </div>
            </div>
            <div class="info-item border-bottom mb-3">
                <h4 class="info-title text-black-main">Created Time :</h4>
                <h5 class="info-details ms-4">{{$document->created_at}}</h5>
            </div>
            <div class="info-item border-bottom mb-3">
                <h4 class="info-title text-black-main">Updated Time :</h4>
                <h5 class="info-details ms-4">{{$document->updated_at}}</h5>
            </div>
        </div>
    </div>
<script>
    $('#slides-full-screen').click(function () {
    })
    $(function () {
    $("#resolte-contaniner").officeToHtml({
   url: '{!! $file_url !!}',
   docxSetting: {
        includeEmbeddedStyleMap: true,
        includeDefaultStyleMap: true,
        convertImage: mammoth.images.imgElement(function(image) {
            return image.read("base64").then(function(imageBuffer) {
                return {
                    src: "data:" + image.contentType + ";base64," + imageBuffer
                };
            });
        }),
        ignoreEmptyParagraphs: false,
    },

    // pdfSetting: {
    //     // setting for pdf
    // },
    // docxSetting: {
    //     // setting for docx
    // },
    pptxSetting: {
        slidesScale: "50%", //Change Slides scale by percent
        slideMode: true, /** true,false*/
        slideType: "revealjs", /*'divs2slidesjs' (default) , 'revealjs'(https://revealjs.com) */
        revealjsPath: "{{ asset('vendor/laravel-file-viewer/revealjs/') }}", /*path to js file of revealjs. default:  './revealjs/reveal.js'*/
        keyBoardShortCut: true,  /** true,false ,condition: slideMode: true*/
        mediaProcess: true, /** true,false: if true then process video and audio files */
        jsZipV2: false,
        slideModeConfig: {
            first: 1,
            nav: true, /** true,false : show or not nav buttons*/
            navTxtColor: "black", /** color */
            keyBoardShortCut: false, /** true,false ,condition: */
            showSlideNum: true, /** true,false */
            showTotalSlideNum: true, /** true,false */
            autoSlide:1, /** false or seconds , F8 to active ,keyBoardShortCut: true */
            randomAutoSlide: false, /** true,false ,autoSlide:true */
            loop: true,  /** true,false */
            background: false, /** false or color*/
            transition: "default", /** transition type: "slid","fade","default","random" , to show transition efects :transitionTime > 0.5 */
            transitionTime: 1 /** transition time between slides in seconds */
        },
        revealjsConfig: {} /*revealjs options. see https://revealjs.com */
    }
    // sheetSetting: {
    //     // setting for excel
    // },
    // imageSetting: {
    //     // setting for  images
    // }
});
});

</script>
@endsection
