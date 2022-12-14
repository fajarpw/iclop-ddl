@extends('admin.layouts.admin-layout')
@section('title')
iCLOP | Beranda
@endsection

@section('content-header')
<h4 class="font-weight-bold">Admin</h4>
<p><span class="font-weight-bold">Daftar Mahasiswa</span></p>
@endsection

@section('content')
<div class="row mt-3">
    <div class="col">
        <table class="table" id="student_table">
            <thead>
                <tr class="text-center">
                    <th>Nama</th>
                    <th>Kelas</th>
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
    $('#student_table').DataTable({
            processing: true,
            info: true,
            serverSide: true,   
            ajax: "{{ route('admin.get.student') }}",
            columns: [
                {
                    data: "student_name",
                    name: "student.name"
                },
                {
                    data: "class_name",
                    name: "class.name"
                },
            ]
        });
</script>
@endsection