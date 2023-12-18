@extends('layout.layout')
@section('content')
    <div class="mx-auto upload">
        <h1 class="fw-bold text-center mb-5 text-info">Upload Tài liệu của bạn</h1>
        <form action="{{route('upload')}}" method="post" enctype="multipart/form-data" id="form_document_upload" class="form-create">
            @csrf
            <div class='mb-3 row'>
                <div class="col-4">
                    <label
                        class='form-label text-black fw-bold'
                        for='basic-default-fullname'
                    >Up File(docx, pptx, pdf, xlsx) :</label>
                </div>
               <div class="col-8">
                   <input
                       type='file'
                       class='form-control title input-field'
                       id='file-store'
                       name='file' data-require='Mời chọn file'
                   />
               </div>
            </div>
            <div class='mb-3 row'>
                <div class="col-4">
                    <label
                        class='form-label text-black fw-bold'
                        for='basic-default-fullname'
                    >Tên Tài liệu:</label>
                </div>
                <div class="col-8">
                    <input
                        data-count="{{$count_docs}}"
                        type='text'
                        class='form-control title input-field '
                        id='title-store'
                        placeholder='Input Title'
                        name='title' data-require='Mời nhập Tiêu đề'
                    />
                </div>
            </div>
            <div class='mb-3 row'>
                <div class="col-4">
                    <label
                        class='form-label text-black fw-bold'
                        for='basic-default-company'
                    >Slug:</label>
                </div>
                <div class="col-8">
                    <input
                        type='text'
                        class='form-control slug input-field'
                        id='slug-store'
                        placeholder='Input Slug'
                        name='slug' data-require='Mời nhập Slug'
                    />
                </div>
            </div>
            <div class='mb-3 row'>
               <div class="col-4">
                   <label
                       class='form-label text-black fw-bold'
                       for='basic-default-email'
                   >Description:</label>
               </div>
                <div class='col-8'>
                    <input
                        type='text'
                        id='desc'
                        class='form-control'
                        placeholder='Input Description'
                        name='desc'
                    />
                </div>
            </div>
            <div class='mb-3 row'>
                <div class="col-4">
                    <label
                        class='form-label text-black fw-bold'
                        for='basic-default-email'
                    >Source:</label>
                </div>
                <div class='col-8'>
                    <input
                        type='text'
                        id='Source'
                        class='form-control'
                        placeholder='Input Source'
                        name='source'
                    />
                </div>
            </div>
            <div class='mb-3 row'>
              <div class="col-4">
                  <label
                      class='form-label text-black fw-bold'
                      for='basic-default-email'
                  >Score:</label>
              </div>
                <div class='col-8'>
                    <input
                        type='number'
                        id='score'
                        max="50"
                        class='form-control'
                        placeholder='Input score < 50'
                        name='score'
                    />
                </div>
            </div>
            <div class='mb-3 row'>
              <div class="col-4">
                  <label
                      class='form-label text-black fw-bold'
                      for='basic-default-email'
                  >Từ khóa:</label>
              </div>
                <div class='col-8'>
                    <input
                        type='text'
                        id='tag'
                        class='form-control input-field'
                        placeholder='Input Tag'
                        name='tag'
                        data-require="Nhập từ khóa"
                    />
                </div>
            </div>
            <div class="form-group mb-3 row">
               <div class="col-4">
                  <label class='form-label text-black fw-bold'
                         for='basic-default-email'>Danh mục:
                  </label>
               </div>
               <div class="col-8">
                   <div class="mb-2 cate_select">
                       <select name="cate_select" class="form-control input-field" id="cate_select" data-require="Chọn danh mục">
                           <option value="">Chọn danh mục</option>
                           @foreach($cates as $cate)
                               <option value="{{ $cate->id }}">{{ $cate->title }}</option>
                           @endforeach
                       </select>
                   </div>
                   <span class="fw-bold">Hoặc</span>
                   <div class="mt-2 cate_more">
                       <div class="more_cate">
                           <input type="text" name="cate_add" id="cate_add" class="input-field form-control" data-count="{{$count_cates}}" data-require="Nhập danh mục" placeholder="Tạo mới danh mục">
                           <input type="text" name="cate_add_slug" id="cate_add_slug" class="d-none form-control">
                       </div>
                   </div>
               </div>
            </div>
            <div class="w-100 text-center">
                <button type='submit' class='btn btn-success text-back fw-bold'>Thêm mới</button>
            </div>
        </form>
    </div>
@endsection
