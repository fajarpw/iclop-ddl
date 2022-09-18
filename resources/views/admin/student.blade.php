@extends('admin.layouts.admin-layout')
@section('title')
iCLOP | Beranda
@endsection
@section('content-header')
<h4 class="font-weight-bold">Admin</h4>
<p><span class="font-weight-bold">Kelola Data Tahun Ajaran</span></p>
@endsection
@section('content')
<div class="row mt-3">
    <div class="col">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
            Tambah Soal
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tahun Ajaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('admin.year.add')}}" enctype="multipart/form-data" method="POST"
                            id="add_year">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label for="name">Nama</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="name" placeholder="Nama tugas">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-book"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-danger error-text name_error"></span>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="status">Status</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="status" placeholder="Status" disabled>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-book"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-danger error-text status_error"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label for="start_date">Tanggal Mulai</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="start_date"
                                            placeholder="Tanggal mulai">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-calendar"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-danger error-text start_date_error"></span>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="end_date">Tanggal berkahir</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="end_date"
                                            placeholder="Tanggal berakhir">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-calendar"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-danger error-text end_date_error"></span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col">
        <table id="year_table" class="table table-bordered">
            <thead>
                <tr class="headings">
                    <th class="column-title">No </th>
                    <th class="column-title">Nama</th>
                    <th class="column-title">Tanggal Mulai</th>
                    <th class="column-title">Tanggal Berakhir</th>
                    <th class="column-title">Status</th>
                    <th class="column-title">Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('script')
<script>
    $('#year_table').DataTable({
            processing: true,
            info: true,
            ajax: "{{ route('admin.year.list') }}",
            columns: [{
                    data: "id",
                    name: "id"
                },
                {
                    data: "name",
                    name: "name"
                },
                {
                    data: "start_date",
                    name: "start_date"
                },
                {
                    data: "end_date",
                    name: "end_date"
                },
                {
                    data: "status",
                    name: "status"
                },
                {
                    data: "actions",
                    name: "actions"
                },
            ]
        });

        $(document).on('click', '#editYear', function () { 
            const question_id = $(this).data('id');
            const url = '{{route("teacher.questions.detail")}}'
            $('.editQuestionModal').find('form')[0].reset();
            $.get(url, { question_id: question_id }, function (data) {
                const questionModal = $('.editQuestionModal');
                $(questionModal).find('form').find('input[name="qid"]').val(data.details.id);
                $(questionModal).find('form').find('input[name="title"]').val(data.details.title);
                $(questionModal).find('form').find('select[name="topic"]').val(data.details.topic);
                $(questionModal).find('form').find('input[name="score"]').val(data.details.score);
                $(questionModal).find('form').find('input[name="dbname"]').val(data.details.dbname);
                $(questionModal).find('form').find('textarea[name="required_table"]').val(data.details.required_table);
                $(questionModal).find('form').find('textarea[name="description"]').val(data.details.description);
                $(questionModal).find('form').find('textarea[name="test_code"]').val(data.details.test_code);
                $(questionModal).find('form').find('input[type="file"]').val('');
                $(questionModal).modal('show');
            }, 'json');
        });

        $('#update_year').on('submit', function(e){
            e.preventDefault();
            var form = this;
            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: new FormData(form),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function () {
                    $(this).find('span.error-text').text('');
                },
                success: function (data) {
                    if (data.code == 0) {
                        $.each(data.error, function (prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        $('#question_table').DataTable().ajax.reload(null, false);
                        $('.editQuestionModal').modal('hide');
                        $('.editQuestionModal').find('form')[0].reset();
                        toastr.success(data.msg);
                    }
                }
            });
        });
        $('#add_year').on('submit', function(e) {
            e.preventDefault();
            var form = this;
            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: new FormData(form),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(this).find('span.error-text').text('');
                },
                success: function(data) {
                    if (data.code == 0) {
                        $.each(data.error, function(prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        $(form)[0].reset();
                        $('#year_table').DataTable().ajax.reload(null, false);
                        $('.add_year').modal('hide');
                        alert(data.msg);
                    }
                }
            });
        });
</script>
@endsection