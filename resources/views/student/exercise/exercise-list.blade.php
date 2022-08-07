@extends('student.layouts.student-layout')
@section('title')
iCLOP | Latihan
@endsection
@section('content-header')
<h4 style="font-weight: bold">Daftar Latihan</h4>
<p>Anda dapat mengerjakan latihan di bawah ini sebelum melakukan penilian.</p>
@endsection
@section('content')
<div class="row">
    @forelse ($exercises as $exercise)
    <div class="col-lg-6">
        <div class="small-box bg-dark">
            <div class="inner">
                <h3>{{$exercise -> {'name'} }}</h3>
                <p>{{$exercise -> year['name'] }}</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('student.exercise.question', ['id' => $exercise ->{'id'} ])}}" class="small-box-footer bg-blue">Kerjakan <i class="fas fa-arrow-circle-right"></i></a>
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
