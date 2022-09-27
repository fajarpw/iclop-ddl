@extends('admin.layouts.admin-layout')
@section('title')
iCLOP | Kelas
@endsection
@section('content-header')
<h4 class="font-weight-bold">
    @php
    $dt = \Carbon\Carbon::today();
    echo $dt->toFormattedDateString();
    @endphp
</h4>
<p>
    <marquee behavior="" direction=""><span class="font-weight-bold">Selamat Datang di Aplikasi Pembelajaran DDL!</span>
    </marquee>
</p>
@endsection
@section('content')
<div class="row">
    @forelse ($students as $student)
    <div class="col-lg-4">
        <div class="small-box bg-dark">
            <div class="inner">
                <h3>{{$student -> {'name'} }}</h3>
                <h3>{{$student -> {'className'} }}</h3>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('admin.class.detail', ["id"=>$student -> {'name'}])}}" class="small-box-footer bg-blue">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    @empty

    @endforelse
</div>
@endsection