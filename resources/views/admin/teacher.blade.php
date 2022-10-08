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
        <table class="table" id="teacher_table">
            <thead>
                <tr>
                    <th>Nama</th>
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
    $('#teacher_table').DataTable({
            processing: true,
            info: true,
            serverSide: true,   
            ajax: "{{ route('admin.get.teacher') }}",
            columns: [
                {
                    data: "name",
                    name: "name"
                },
            ]
        });
</script>
@endsection