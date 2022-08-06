@extends('student.layouts.student-layout')
@section('content-header')
<h5 style="font-weight: bold">Daftar Soal Latihan</h5>
@endsection
@section('content')
<div class="row">
    @forelse ($exercise_questions as $questions)
    <div class="col-12">
        <table class="table table-hover table-head-fixed text-nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Soal</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$questions -> {'id'} }}</td>
                    <td>{{$questions -> questions['title'] }}</td>
                    <td>{{$questions -> questions['description'] }}</td>
                    <td><span class="tag tag-danger">Denied</span></td>
                    <td> <a class="btn btn-primary" href="{{route('student.exercise.question.detail', ['id' => $questions->{'question_id'} ] )}}"
                            target="_blank">
                            <i class="fas fa-pencil-alt"></i></a></td>
                </tr>
            </tbody>
        </table>
    </div>
    @empty
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-exclamation-triangle"></i> Tidak ada data pembelajaran!</h5>
    </div>
    @endforelse
</div>

<script src="{{ asset('editor/ide.js') }} "></script>
<script src="{{ asset('editor/ace-editor/ace.js') }} "></script>
<script src="{{ asset('editor/ace-editor/mode-pgsql.js') }} "></script>
<script src="{{ asset('editor/ace-editor/theme-monokai.js') }} "></script>
<script src="{{ asset('editor/ace-editor/ext-language_tools.js') }}"></script>
<script>
    var langTools = ace.require("ace/ext/language_tools");
</script>
@endsection
@section('script')

@endsection