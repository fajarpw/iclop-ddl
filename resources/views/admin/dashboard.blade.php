@extends('admin.layouts.admin-layout')
@section('title')
iCLOP | Beranda
@endsection

@section('content-header')
<h4 class="font-weight-bold">
    @php
    $dt = \Carbon\Carbon::today();
    echo $dt->toFormattedDateString();
    @endphp
</h4>
<p>
    <marquee behavior="" direction="
    ........;....."><span class="font-weight-bold">Selamat Datang di Aplikasi Pembelajaran DDL!</span>
    </marquee>
</p>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <form class="form-inline">
            @csrf
            <div class="form-group mx-sm-3 mb-2">
                <select id="year" class="form-control" style="max-width: 100%;">
                    <option selected>Choose...</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Pilih</button>
        </form>
    </div>
</div>
<div class="row mt-3">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-gray">
            <div class="inner">
                <h4>{{ $mahasiswa }}</h4>
                <p>Mahasiswa</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('admin.student')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-gray">
            <div class="inner">
                <h4>{{ $class }}<sup style="font-size: 20px"></sup></h4>
                <p>Kelas</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route('admin.class')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-gray">
            <div class="inner">
                <h4>{{ $dosen }}</h4>
                <p>Dosen</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="{{route('admin.teacher')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-gray">
            <div class="inner">
                <h4>{{ $year[0] -> {'name'} }}</h4>
                <p>Tahun Ajaran</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

</div>
@endsection