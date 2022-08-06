@extends('student.layouts.student-layout')
@section('content')
<div class="row">
    <div class="col-md-6">
        <ul class="nav nav-pills nav-justified">
            <li class="nav-item">
                <a class="nav-link" href="#">Modul</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Hasil Pengujian</a>
            </li>
        </ul>
    </div>
    <div class="col-md-6">
        <div class="editor" id="editor" style="height: 400px;"></div>
    </div>
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