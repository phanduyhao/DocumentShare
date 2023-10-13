@extends('admin.main')
@section('contents')
<div>
    <h1>File Information</h1>
    <p>Filename: {{ $filename }}</p>
    <p>File Path: {{ $filepath }}</p>
    <h2>File Data</h2>
    <ul>
        @foreach($file_data as $item)
            <li>{{ $item['label'] }}: {{ $item['value'] }}</li>
        @endforeach
    </ul>
</div>
@endsection
