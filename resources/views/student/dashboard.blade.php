@extends('student.layouts.student-layout')
@section('content')
<div class="row mt-3">
    <div class="col-md-6">
        <embed src="{{Storage::disk('local')->url('/ddl_guidance/Master.pdf')}}" type="application/pdf"
            style="width: 100%; height: 500px;">
    </div>
    <div class="col-md-6">
        <div class="editor" id="editor" style="height: 200px;"></div>
        <div class="row mt-3">
            <div class="col-3">
                <button class="btn btn-primary w-100 data-toggle=" tooltip" data-placement="bottom" title="Run"><i
                        class="fa fa-angle-left"></i></button>
            </div>
            <div class="col-3">
                <button class="btn btn-primary w-100" data-toggle="tooltip" data-placement="bottom" title="Run"><i
                        class="fa fa-angle-right"></i></button>
            </div>
            <div class="col-3">
                <button class="btn btn-success w-100" data-toggle="tooltip" data-placement="bottom" title="Run"><i
                        class="fa fa-play"></i></button>
            </div>
            <div class="col-3">
                <button class="btn btn-outline-warning w-100" data-toggle="tooltip" data-placement="bottom"
                    title="Submit"><i class="fa fa-check-double"></i></button>
            </div>
        </div>
        <div class="row mt-3 border border-warning">
            Output
        </div>
    </div>
</div>

{{-- <div class="row border border-warning mt-3">
    <div class="col-12">
        Output
    </div> --}}
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