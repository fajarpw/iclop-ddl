@extends('student.layouts.student-layout')
@section('title')
iCLOP | Soal Latihan
@endsection
@section('content-header')
<h5 style="font-weight: bold">Daftar Soal Latihan</h5>
<p class="font-weight-class">{{ $exercise_questions[0] -> exercise['name'] }}</p>
<div class="progress mb-3">
    <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0"
        aria-valuemax="100" style="width: {{ $completions . "%"}}">
        {{-- <span class="sr-only">40% Complete (success)</span> --}}
    </div>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <table class="table table-hover table-head-fixed text-nowrap">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Soal</th>
                    <th>Topik</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($exercise_questions as $questions)
                <tr>
                    <td>{{$questions -> {'no'} }}</td>
                    <td>{{$questions -> question['title'] }}</td>
                    <td>{{$questions -> question['topic'] }}</td>
                    <td>{{$questions -> question['description'] }}</td>
                    <td> <a class="btn btn-primary"
                            href="{{route('student.exercise.question.detail', [ 'exercise_id' => $questions->{'exercise_id'}, 'question_no' => $questions->{'no'} ] )}}"
                            target="_blank">
                            <i class="fas fa-pencil-alt"></i></a></td>
                </tr>
            </tbody>
            @empty
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Tidak ada data pembelajaran!</h5>
            </div>
            @endforelse
        </table>
    </div>
</div>
@endsection