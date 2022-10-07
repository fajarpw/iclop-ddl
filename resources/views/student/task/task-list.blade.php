@extends('student.layouts.student-layout')
@section('title')
iCLOP | Tugas
@endsection
@section('content-header')
<h4 style="font-weight: bold">Daftar Latihan</h4>
<p>Anda dapat mengerjakan tugas untuk melakukan penilaian.</p>
@endsection
@section('content')
<div class="row">
    @forelse ($tasks as $task)
    <div class="col-lg-6">
        <div class="small-box bg-dark">
            <div class="inner">
                <h3>{{$task -> {'name'} }}</h3>
                <p>{{$task -> year['name'] }}</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('student.task.question', ['id' => $task ->{'id'} ])}}" class="small-box-footer bg-blue">Kerjakan <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    @empty
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        <h5><i class="icon fas fa-exclamation-triangle"></i> Tidak ada data pembelajaran!</h5>
    </div>
    @endforelse
</div>
@endsection
