@extends('student.layouts.student-layout')
@section('title')
iCLOP | Tugas
@endsection
@section('content-header')
<h4 style="font-weight: bold">Daftar Ujian</h4>
<p>Anda dapat mengerjakan ujian pada menu di bawah ini.</p>
@endsection
@section('content')
<div class="row">
    @forelse ($exams as $exam)
    <div class="col-lg-6">
        <div class="small-box bg-dark">
            <div class="inner">
                <h3>{{$exam -> {'name'} }}</h3>
                <p>{{$exam -> year['name'] }}</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('student.exam.question', ['id' => $exam ->{'id'} ])}}" class="small-box-footer bg-blue">Kerjakan <i class="fas fa-arrow-circle-right"></i></a>
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
