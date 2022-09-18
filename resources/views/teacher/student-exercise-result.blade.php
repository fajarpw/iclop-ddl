@extends('teacher.layouts.teacher-layout')
@section('content-header')
<h5 class="font-weight-bold">Hasil Pembelajaran Mahasiswa</h5>
@endsection
@section('content')
<div class="row">
    @forelse ($exercises as $exercise)
    <div class="col">
        test
    </div>
    @empty
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-exclamation-triangle"></i> Tidak ada data mahasiswa!</h5>
    </div>
    @endforelse
</div>
@endsection