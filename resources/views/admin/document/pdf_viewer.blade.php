@extends('admin.main')
@section('contents')
    <canvas id="pdfCanvas"></canvas>
    <script src="{{ asset('pdf_viewer.js') }}"></script>
@endsection
