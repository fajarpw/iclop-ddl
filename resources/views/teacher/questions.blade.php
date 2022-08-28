@extends('teacher.layouts.teacher-layout')
@section('content-header')
<h5 class="font-weight-bold">Soal</h5>
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
                        <h5 class="modal-title">Tambah Soal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('teacher.questions.add')}}" enctype="multipart/form-data" method="POST"
                            id="add_question">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label for="title">Nama</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="title" placeholder="Nama tugas">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-book"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-danger error-text title_error"></span>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="topic">Topik</label>
                                    <div class="input-group">
                                        <select class="form-control" name="topic">
                                            <option selected disabled>- Pilih Topik -</option>
                                            <option value="CREATE Database">CREATE Database</option>
                                            <option value="CREATE Table">CREATE Table</option>
                                            <option value="ALTER Table">ALTER Table</option>
                                            <option value="DROP Table">DROP Table</option>
                                            <option value="DROP Database">DROP Database</option>
                                        </select>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-list"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-danger error-text topic_error"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12">
                                    <label for="dbname">Nama Database </label>
                                    <span class="fas fa-question" data-toggle="tooltip_dbname" data-placement="right"
                                        title="Nama Database yang akan digunakan untuk pembelajaran."></span>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="dbname"
                                            placeholder="Nama database">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-database"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-danger error-text dbname_error"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12">
                                    <label for="description">Deskripsi</label>
                                    <div class="input-group">
                                        <textarea rows="3" type="text" class="form-control" name="description"
                                            placeholder="Deskripsi tugas"></textarea>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-sticky-note"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-danger error-text description_error"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12">
                                    <label for="required_table">Required Table</label>
                                    <span class="fas fa-question" data-toggle="tooltip_requiredTable"
                                        data-placement="right"
                                        title="TIDAK WAJIB DIISI. Digunakan untuk membuat tabel yang dibutuhkan untuk pemebelajaran."></span>
                                    <div class="input-group">
                                        <textarea rows="5" type="text" class="form-control" name="required_table"
                                            placeholder="Required table"></textarea>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-code"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-danger error-text required_table_error"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="test_code">Test Code</label>
                                    <span class="fas fa-question" data-toggle="tooltip_requiredTable"
                                        data-placement="right" title="Contoh tersedia pada button di bawah."></span>
                                    <div>
                                        <button type="button"
                                            class="toggleShowTestCodeBox btn btn-primary btn-sm">Tampilkan
                                            Contoh</button>
                                    </div>
                                    <div class="testCodeBox" style="display: none;">
                                        <code style="display:block; white-space:pre-wrap">
                                            CREATE EXTENSION IF NOT EXISTS pgtap;
                                            CREATE OR REPLACE FUNCTION public.testschema()
                                            RETURNS SETOF TEXT LANGUAGE plpgsql AS $$
                                            BEGIN
                                            RETURN NEXT has_column( 'artists', 'id');
                                            RETURN NEXT col_type_is( 'artists', 'id', 'integer', 'Tipe kolom id adalah INTEGER');
                                            END;
                                            $$;
                                            SELECT * FROM runtests('public'::name);
                                        </code>
                                        <p>Dokumentasi selengkapnya dapat dilihat <a
                                                href="https://pgtap.org/documentation.html" target="_blank">disini</a>
                                        </p>
                                    </div>
                                    <div class="input-group mt-2">
                                        <textarea rows="5" type="text" class="form-control" name="test_code"
                                            placeholder="Test code"></textarea>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-code"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-danger error-text test_code_error"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12">
                                    <label for="guidance">File Panduan
                                    </label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" name="guidance" data-value="">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-file-pdf"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-danger error-text guidance_error"></span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-warning btn-block">Simpan Perubahan</button>
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
        <table id="question_table" class="table table-bordered">
            <thead>
                <tr class="headings">
                    <th class="column-title">No </th>
                    <th class="column-title">Nama</th>
                    <th class="column-title">Topik</th>
                    <th class="column-title">Deskripsi</th>
                    <th class="column-title">Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
</div>
@include('teacher/edit-question-modal')
@endsection

@section('script')
<script>
    $('.toggleShowTestCodeBox').on('click', function() {
            $('.testCodeBox').toggle();
        });

    $('#question_table').DataTable({
            processing: true,
            info: true,
            ajax: "{{ route('teacher.questions.list') }}",
            columns: [{
                    data: "id",
                    name: "id"
                },
                {
                    data: "title",
                    name: "title"
                },
                {
                    data: "topic",
                    name: "topic"
                },
                {
                    data: "description",
                    name: "description"
                },
                {
                    data: "actions",
                    name: "actions"
                },
            ]
        });

        $('#add_question').on('submit', function(e){
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
                        $(form)[0].reset();
                        toastr.success(data.msg);
                        $('#task_table').load(location.href + " #task_table" );
                    }
                }
            });
        });

        $(document).on('click', '#editQuestion', function () { 
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

        $('#update_question').on('submit', function(e){
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
</script>
@endsection