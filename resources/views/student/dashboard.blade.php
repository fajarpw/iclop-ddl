@extends('student.layouts.student-layout')
@section('content-header')
<h5 class="font-weght-bold">Beranda</h5>
@endsection
@section('content')
<div class="row">
    @forelse ($classes as $class)
    <div class="col-lg-4 col-6">
        <div class="small-box bg-dark">
            <div class="inner font-weight-bold">
                <h3>{{$class -> {'name'} }}</h3>
                <p>{{$class -> teacher['name'] }}</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('student.enroll.class')}}" class="small-box-footer">Daftar <i
                    class="fas fa-arrow-circle-right"></i></a>
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

@section('script')
<script>
    $(document).ready(function(){
        $('#enroll-form').on('submit', function(e){
            e.preventDefault();
            var form = this;
                $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: new FormData(form),
                processData: false,
                dataType: 'json',
                contentType: false,
                success: function (data) {
                    if (data.code == 0) {
                        $.each(data.error, function (prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        // $(form)[0].reset();
                        // toastr.success(data.msg);
                        alert(data.msg);
                    }
                }
        });
    });
});
</script>
@endsection