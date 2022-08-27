@extends('teacher.layouts.teacher-layout')
@section('content-header')
<h5 class="font-weight-bold">Soal</h5>
@endsection
@section('content')
<div class="row mt-3">
    <div class="col">
        <table id="question_table" class="table table-striped jambo_table">
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

@endsection

@section('script')
<script>
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
</script>
@endsection