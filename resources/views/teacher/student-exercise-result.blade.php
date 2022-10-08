@extends('teacher.layouts.teacher-layout')
@section('content-header')
<h5 class="font-weight-bold">Hasil Pembelajaran Mahasiswa</h5>
@endsection
@section('content')
<div class="row">
    <div class="col">
        <table id="question_table" class="table table-striped">
            <thead>
                <tr class="headings">
                    <th class="column-title">No </th>
                    <th class="column-title">Nama</th>
                    <th class="column-title">Kelas</th>
                    <th class="column-title">Nilai</th>
                    <th class="column-title">Detail</th>
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
    $('#question_table').DataTable({
            processing: true,
            info: true,
            ajax: "{{ route('teacher.exercises.result.student') }}",
            columns: [{
                    data: "id",
                    name: "id"
                },
                {
                    data: "name",
                    name: "name"
                },
                {
                    data: "score",
                    name: "score"
                },
                {
                    data: "actions",
                    name: "actions"
                },
            ]
        });
</script>
@endsection