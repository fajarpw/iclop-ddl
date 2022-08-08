@extends('student.layouts.student-layout')
@section('title')
iCLOP | Soal Tugas
@endsection
@section('content-header')
<h5 style="font-weight: bold">Daftar Soal Tugas</h5>
<p class="font-weight-class">{{ $exam_questions[0] -> exam['name'] }}</p>
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
                @forelse ($exam_questions as $question)
                <tr>
                    <td>{{$question -> {'no'} }}</td>
                    <td>{{$question -> question['title']}}</td>
                    <td>{{$question -> question['topic']}}</td>
                    <td>{{$question -> question['description']}}</td>
                    <td>
                        <a class="btn btn-primary"
                            href="{{route('student.exam.question.detail', ['question_id' => $question->{'question_id'}, 'exam_id' => $question->{'exam_id'} ] )}}"
                            target="_blank">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </td>
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