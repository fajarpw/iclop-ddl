@extends('student.layouts.student-layout')
@section('content')
<div class="row">
    @forelse ($questions as $question)
    <div class="col-md-6">
        <embed src="{{Storage::disk('local')->url('/ddl_guidance/'.$question->guide)}}" type="application/pdf"
            style="width: 100%; height: 500px;">
    </div>
    {{-- <div class="alert alert-danger">
        <h5><i class="icon fas fa-ban"></i> Failed!</h5>
        asdds
    </div> --}}
    <div class="col-md-6">
        <div class="editor" id="editor" style="height: 200px;"></div>
        <div class="row mt-3">
            <div class="col-3">
                <button class="btn btn-primary w-100 data-toggle=" tooltip" data-placement="bottom"
                    title="Sebelumnya"><i class="fa fa-angle-left"></i></button>
            </div>
            <div class="col-3">
                <button class="btn btn-primary w-100" data-toggle="tooltip" data-placement="bottom"
                    title="Selanjutnya"><i class="fa fa-angle-right"></i></button>
            </div>
            <div class="col-3">
                <button id="runButton" class="btn btn-success w-100" data-toggle="tooltip" data-placement="bottom"
                    title="Run"><i class="fa fa-play"></i></button>
            </div>
            <div class="col-3">
                <button id="submitButton" class="btn btn-outline-warning w-100" data-toggle="tooltip"
                    data-placement="bottom" title="Submit"><i class="fa fa-check-double"></i></button>
            </div>
        </div>
        <div id="output" class="row mt-3"></div>
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
<script>
    $(document).ready(function(){
        $('#runButton').click(function () {
            if(editor.getSession().getValue() == ""){
                alert("Silakan tulis jawaban anda terlebih dahulu!");
            }else{
                $("#runButton").attr("disabled", true);
                $("#runButton").html("<i class='fas fa-spinner'></i> Processing");
                $("#submitButton").attr("disabled", true);
                $("#submitButton").html("<i class='fas fa-ban'></i> Submit");
                $.ajax({
                    // url: "{{asset('php/TEST1.php')}}",
                    //url: "{{asset('php/test/test1.php')}}",
                    url: "{{route('student.runtest')}}",
                    method: "POST",
                    data: {
                        code: editor.getSession().getValue(),
                        question_id: "{{$questions[0] -> id}}",
                    },
                    success: function(response){
                        //$(".output").html(response);
                        $("#output").html(response.result);
                        $("#runButton").attr("disabled", false)
                        $("#runButton").html("<i class='fas fa-play'></i> Run");
                        $("#submitButton").attr("disabled", false);
                        $("#submitButton").html("<i class='fas fa-check'></i> Submit");
                            
                    },
                    error: function(){
                        $(".output").html("Something went wrong!");
                        $("#runButton").attr("disabled", false)
                        $("#runButton").html("<i class='fas fa-play'></i> Run");
                        $("#submitButton").attr("disabled", false);
                        $("#submitButton").html("<i class='fas fa-check'></i> Submit");
                    }
                });    
            }
        });
    
        $('#clearResult').click(function(){
            const output = document.getElementById("output-text");
            output.remove();
        });
    });
</script>
@endsection