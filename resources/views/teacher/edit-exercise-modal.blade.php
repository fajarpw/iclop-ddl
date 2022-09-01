<div class="modal fade editExerciseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Update Data Pembelajaran<b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header"><b>Update Data Tugas<b></div>
                    <div class="card-body">
                        <form action="{{route('teacher.exercises.update')}}" enctype="multipart/form-data" method="POST"
                            id="update_exercise">
                            @csrf
                            <input type="hidden" name="eid">
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
                </div>

            </div>
        </div>
    </div>
</div>