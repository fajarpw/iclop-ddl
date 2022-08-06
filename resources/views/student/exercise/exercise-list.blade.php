@extends('student.layouts.student-layout')
@section('content-header')
<h5 style="font-weight: bold">Daftar Latihan</h5>
@endsection
@section('content')
<div class="row">
    @forelse ($exercises as $exercise)
    <div class="col-lg-3 col-6">
        <div class="small-box bg-dark">
            <div class="inner">
                <h3>{{$exercise -> {'name'} }}</h3>
                <p>{{$exercise -> {'description'} }}</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('student.exercise.question', ['id' => $exercise ->{'id'} ])}}" class="small-box-footer">Kerjakan <i class="fas fa-arrow-circle-right"></i></a>
        </div>
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