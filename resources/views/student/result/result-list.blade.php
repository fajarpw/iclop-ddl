@extends('student.layouts.student-layout')
@section('title')
iCLOP | Riwayat
@endsection
@section('content-header')
<h4 style="font-weight: bold">Daftar Nilai</h4>
<p>Anda dapat melihat nilai dari Tugas dan Ujian yang telah Anda lakukan.</p>
@endsection
@section('content')
<div class="row">
    @forelse ($exercises as $exercise)
    <div class="col-lg-6">
        <div class="small-box bg-dark">
            <div class="inner">
                <h3>{{$exercise -> {'name'} }}</h3>
                <p>Nilai</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('student.exercise.result', ['id' => $exercise ->{'id'} ])}}" class="small-box-footer bg-blue">Detail <i class="fas fa-info-circle"></i></a>
        </div>
    </div>
    @empty
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-exclamation-triangle"></i> Tidak ada data pembelajaran!</h5>
    </div>
    @endforelse
</div>
@endsection
