@extends('student.layouts.student-layout')
@section('content-header')
<h5 class="font-weight-bold">Riwayat</h5>
<p>Pembelajaran yang Anda lakukan dapat diulang-ulang.
    <br>
    Anda tidak perlu khawatir karena pada pembelajaran tidak
    dilakukan penilaian
</p>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <table class="table table-hover table-head-fixed text-nowrap">
            <thead>
                <tr>
                    <th>Soal</th>
                    <th>Status</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($submissons as $submisson)
                <tr>
                    <td>{{$submisson -> {'title'} }}</td>

                    @if ($submisson -> {'status'} == "Passed")
                    <td><span class="badge badge-success">{{$submisson -> {'status'} }}</span></td>
                    @else
                    <td><span class="badge badge-danger">{{$submisson -> {'status'} }}</span></td>
                    @endif

                    <td>
                        {{-- <a class="btn btn-primary btn-sm"
                            href="{{route('student.exercise.question.detail', ['id' => $submisson->{'question_id'} ] )}}"
                            target="_blank">
                            <i class="fas fa-eye"></i></a> --}}
                            sdfs
                    </td>
                </tr>
            </tbody>
            @empty
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Tidak ada data pembelajaran!</h5>
            </div>
            @endforelse
        </table>
    </div>
</div>
@endsection