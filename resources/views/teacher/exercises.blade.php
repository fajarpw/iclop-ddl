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
                        <form action="{{route('teacher.exercises.add')}}" enctype="multipart/form-data" method="POST"
                            id="add_exercise">
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
                                    <label for="year_id">Tahun Ajaran</label>
                                    <div class="input-group">
                                        <select class="form-control" name="year_id">
                                            <option selected disabled>- Tahun Ajaran -</option>
                                            @forelse ($years as $year)
                                            <option value="{{$year-> {'id'} }}">{{$year-> {'name'} }}</option>
                                            @empty
                                            <option value="CREATE Database" disabled>CREATE Database</option>
                                            @endforelse
                                        </select>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-list"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-danger error-text year_id_error"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12">
                                    <label for="description">Deskripsi</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="description"
                                            placeholder="Deskripsi">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-database"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-danger error-text description_error"></span>
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
        <table id="exercise_table" class="table table-striped">
            <thead>
                <tr class="headings">
                    <th class="column-title">No </th>
                    <th class="column-title">Nama</th>
                    <th class="column-title">Tahun Ajaran</th>
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
@include('teacher/edit-exercise-modal')
@endsection

@section('script')
<script>
    $('#exercise_table').DataTable({
            processing: true,
            info: true,
            ajax: "{{ route('teacher.exercises.list') }}",
            columns: [{
                    data: "id",
                    name: "id"
                },
                {
                    data: "name",
                    name: "name"
                },
                {
                    data: "year_name",
                    name: "year.name"
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

        $('#add_exercise').on('submit', function(e){
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
                        // toastr.success(data.msg);
                        alert(data.msg);
                        $('#exercise_table').DataTable().ajax.reload(null, false);
                    }
                }
            });
        });

        $(document).on('click', '#editExercise', function () { 
            const exercise_id = $(this).data('id');
            const url = '{{route("teacher.exercises.detail")}}'
            $('.editExerciseModal').find('form')[0].reset();
            $.get(url, { exercise_id: exercise_id }, function (data) {
                const exerciseModal = $('.editExerciseModal');
                $(exerciseModal).find('form').find('input[name="eid"]').val(data.details.id);
                $(exerciseModal).find('form').find('input[name="name"]').val(data.details.name);
                $(exerciseModal).find('form').find('select[name="year_id"]').val(data.details.year_id);
                $(exerciseModal).find('form').find('input[name="description"]').val(data.details.description);
                $(exerciseModal).modal('show');
            }, 'json');
        });

        $('#update_exercise').on('submit', function(e){
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
                        $('#exercise_table').DataTable().ajax.reload(null, false);
                        $('.editExerciseModal').modal('hide');
                        $('.editExerciseModal').find('form')[0].reset();
                        // toastr.success(data.msg);
                        alert(data.msg)
                    }
                }
            });
        });
</script>
@endsection