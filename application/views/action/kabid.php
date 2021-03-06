<button type="button" class="btn btn-primary" style="display: none" id='btn_act' data-toggle="modal" data-target=".step1-modal">Ambil Keputusan</button>
<div class="modal fade step1-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id='form_act_3' role="form" onsubmit="return false;" type="multipart" autocomplete="off">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ACT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input hidden value="<?= $contentData['id_pengiriman'] ?>" name="id_pengiriman">
                        <label>Keputusan</label>
                        <select class="form-control mb-3" id="act_3" name="keputusan" required>
                            <option selected=""></option>
                            <option value="terima">Terima</option>
                            <option value="tolak">Tolak</option>
                            <!-- <option value="3">Three</option> -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Survey</label>
                        <select class="form-control mb-3" id="survery_act_3" name='survey' disabled>
                            <option selected=""></option>
                            <option value="ya" id='kabid_act_survey'>Melalui Survey</option>
                            <option value="tidak" id='kabid_act_xsurvey'>Tanpa Survey</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Catatan</label>
                        <textarea class="form-control" name="catatan" rows="3"></textarea>
                    </div>
                    <!-- <p>Modal body text goes here.</p> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="act_3_btn_submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<button type="button" style="display: none" class="btn btn-primary" id='btn_act_b' data-toggle="modal" data-target=".step1-modal_b">Lanjutkan</button>
<div class="modal fade step1-modal_b" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id='form_act_5' role="form" onsubmit="return false;" type="multipart" autocomplete="off">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ACT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input hidden value="<?= $contentData['id_pengiriman'] ?>" name="id_pengiriman">

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Catatan</label>
                        <textarea class="form-control" name="catatan" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="act_5_btn_submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>


<button type="button" style="display: none" class="btn btn-primary" id='btn_act_c' data-toggle="modal" data-target=".step1-modal_c">Lanjutkan</button>
<div class="modal fade step1-modal_c" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id='form_act_c' role="form" onsubmit="return false;" type="multipart" autocomplete="off">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ACT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input hidden value="<?= $contentData['id_pengiriman'] ?>" name="id_pengiriman">

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Catatan</label>
                        <textarea class="form-control" name="catatan" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="act_c_btn_submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script>
    var act_3_form = $('#form_act_3');
    var act_3_btn_submit = $('#act_3_btn_submit');
    var act_3 = $('#act_3');
    var act_5_form = $('#form_act_5');
    var act_5_btn_submit = $('#act_5_btn_submit');
    var act_5 = $('#act_5');

    var act_c_form = $('#form_act_c');
    var act_5_btn_submit = $('#act_c_btn_submit');
    // var act_5 = $('#act_c');



    act_3_form.submit(function(event) {
        event.preventDefault();
        swal({
            title: "Konfirmasi simpan",
            text: "Yakin akan menyimpan data ini?",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#18a689",
            confirmButtonText: "Ya, Simpan!",
        }).then((result) => {
            if (!result.value) {
                return;
            }
            swal.fire({
                title: 'Loading .. !',
                html: '', // add html attribute if you want or remove
                allowOutsideClick: false,
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
            });
            $.ajax({
                url: `<?= site_url('Service/act_3') ?>`,
                'type': 'POST',
                data: act_3_form.serialize(),
                // contentType: false,
                // processData: false,
                success: function(data) {
                    // buttonIdle(PengirimanModal.addBtn);
                    var json = JSON.parse(data);
                    if (json['error']) {
                        swal("Simpan Gagal", json['message'], "error");
                        return;
                    }
                    swal("Simpan Berhasil", "", "success");
                    location.reload();
                    $('.step1-modal').modal('hide');
                },
                error: function(e) {}
            });
        });
    });
    act_5_form.submit(function(event) {
        // event.preventDefault();
        swal({
            title: "Konfirmasi simpan",
            text: "Yakin akan menyimpan data ini?",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#18a689",
            confirmButtonText: "Ya, Simpan!",
        }).then((result) => {
            if (!result.value) {
                return;
            }
            swal.fire({
                title: 'Loading .. !',
                html: '',
                allowOutsideClick: false,
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
            });
            $.ajax({
                url: `<?= site_url('Service/act_9') ?>`,
                'type': 'POST',
                data: act_5_form.serialize(),
                success: function(data) {
                    var json = JSON.parse(data);
                    if (json['error']) {
                        swal("Simpan Gagal", json['message'], "error");
                        return;
                    }
                    swal("Simpan Berhasil", "", "success");
                    // $('.step1-modal').modal('hide');
                    location.reload();
                },
                error: function(e) {}
            });
        });
    });

    act_c_form.submit(function(event) {
        // event.preventDefault();
        swal({
            title: "Konfirmasi simpan",
            text: "Yakin akan menyimpan data ini?",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#18a689",
            confirmButtonText: "Ya, Simpan!",
        }).then((result) => {
            if (!result.value) {
                return;
            }
            swal.fire({
                title: 'Loading .. !',
                html: '',
                allowOutsideClick: false,
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
            });
            $.ajax({
                url: `<?= site_url('Service/act_6') ?>`,
                'type': 'POST',
                data: act_c_form.serialize(),
                success: function(data) {
                    var json = JSON.parse(data);
                    if (json['error']) {
                        swal("Simpan Gagal", json['message'], "error");
                        return;
                    }
                    swal("Simpan Berhasil", "", "success");
                    // $('.step1-modal').modal('hide');
                    location.reload();
                },
                error: function(e) {}
            });
        });
    });
</script>