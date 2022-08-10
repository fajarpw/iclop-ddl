@extends('student.layouts.student-layout')
@section('title')
iCLOP | Beranda
@endsection
@section('content-header')
<h4 class="font-weight-bold">Beranda</h4>
<p><span class="font-weight-bold">Selamat Datang di Aplikasi Pembelajaran DDL!</span>
    {{-- <br>
    Untuk memulai Anda dapat memilih menu Pembelajaran diatas! --}}
</p>
@endsection
@section('content')
<div class="row">
    <embed src="{{Storage::disk('local')->url('/ddl_guidance/Pengantar.pdf')}}" type="application/pdf"
        style="width: 100%; height: 500px;">
</div>
@endsection