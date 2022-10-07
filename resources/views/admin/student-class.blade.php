@extends('admin.layouts.admin-layout')
@section('title')
iCLOP | Kelas
@endsection
@section('content-header')
<h4 class="font-weight-bold">
    @php
    $dt = \Carbon\Carbon::today();
    echo $dt->toFormattedDateString();
    @endphp
</h4>
<p>
    <marquee behavior="" direction=""><span class="font-weight-bold">Selamat Datang di Aplikasi Pembelajaran DDL!</span>
    </marquee>
</p>
@endsection
@section('content')
<div class="row">
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
            ajax: "{{ route('admin.class.student') }}",
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