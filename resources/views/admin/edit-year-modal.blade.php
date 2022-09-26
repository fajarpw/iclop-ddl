<div class="modal fade editYearModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Update Data Tahun Ajaran<b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header"><b>Update Data Tugas<b></div>
                    <div class="card-body">
                        <form action="{{route('admin.year.update')}}" enctype="multipart/form-data" method="POST"
                        id="update_year">
                        @csrf
                        <input type="hidden" name="yid">
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
                                    <input type="text" class="form-control" name="status" placeholder="Status">
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
                </div>

            </div>
        </div>
    </div>
</div>