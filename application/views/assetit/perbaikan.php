<div class="mx-auto mt-4 " style="width: 60rem; min-height: 38rem;">
  <div class="card bg-light mb-2" style="max-width: 60rem;">
    <h5 class="card-header"><?= $tittle; ?></h5>
    <div class="card-body">

      <form action="<?= base_url('assetit/savePerbaikanPc') ?>" method="post">
        <div class="container">
          <div class="row align-items-start">
            <div class="col">
              <div class="card" style="width: 24rem;">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="idpc_perbaikan" class="col-form-label-sm text-muted pilihPC">No. Asset</label>
                        <select class="form-control" id="idpc_perbaikan" name="idpc_perbaikan">
                          <?php foreach ($asset as $ast) : ?>
                            <option value="<?= $ast['idpc']; ?>"><?= $ast['idpc']; ?> <?= $ast['user']; ?></option>
                          <?php endforeach; ?>
                        </select>
                        <small class="form-text text-danger"><?= form_error('idpc_perbaikan'); ?></small>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-grup">
                        <input type="text" class="form-control form-control-sm" id="user" name="user" placeholder="User">
                        <small class="form-text text-danger"><?= form_error('user'); ?></small>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <label for="perubahan" class="col-form-label-sm text-muted">Perubahan</label>
                      <select class="form-control form-control-sm" id="perubahan" name="perubahan" placeholder="Pilih">
                        <option value="Upgrade">Upgrade</option>
                        <option value="Instal">Instal</option>
                        <option value="Pergantian">Pergantian</option>
                      </select>
                      <small class="form-text text-danger"><?= form_error('perubahan'); ?></small>
                    </div>
                    <div class="col">
                      <label for="tipe" class="col-form-label-sm text-muted">Tipe</label>
                      <select class="form-control form-control-sm" id="tipe" name="tipe" placeholder="Pilih">
                        <option value="Software">Software</option>
                        <option value="Hardware">Hardware</option>
                        <option value="User">User</option>
                      </select>
                      <small class="form-text text-danger"><?= form_error('tipe'); ?></small>
                    </div>
                  </div>
                  <hr>
                  <div class="form-row align-items-center">
                    <div class="col-auto my-1">
                      <button type="button" class="badge badge-secondary" data-toggle="modal" data-target="#modalAddPart">
                        Pilih Part
                      </button>
                    </div>
                    <div class="col-sm-3 my-1">
                      <div class="form-grup">
                        <input type="text" class="form-control form-control-sm" id="bpp" name="bpp" placeholder="BPP">
                        <small class="form-text text-danger"><?= form_error('bpp'); ?></small>
                      </div>
                    </div>
                    <div class="col-sm-4 my-1">
                      <div class="form-grup">
                        <input type="text" class="form-control form-control-sm" id="receiptdate" name="receiptdate" placeholder="Receipt Date">
                        <small class="form-text text-danger"><?= form_error('receiptdate'); ?></small>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-grup">
                        <input type="text" class="form-control form-control-sm" id="partqty" name="partqty" placeholder="qty">
                        <small class="form-text text-danger"><?= form_error('partqty'); ?></small>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col">
                      <div class="form-grup">
                        <input type="hidden" class="form-control form-control-sm" id="partid" name="partid">
                        <small class="form-text text-danger"><?= form_error('partid'); ?></small>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col">
                      <div class="form-grup">
                        <input type="hidden" class="form-control form-control-sm" id="id_ax" name="id_ax">
                        <small class="form-text text-danger"><?= form_error('id_ax'); ?></small>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-grup">
                        <input type="text" class="form-control form-control-sm" id="partname" name="partname" placeholder="Part Name">
                        <small class="form-text text-danger"><?= form_error('partname'); ?></small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="idpc_perbaikan" class="col-form-label-sm text-muted">No. Asset</label>
                    <select class="form-control" id="nomor_wo" name="nomor_wo">
                      <?php foreach ($datawo as $wo) : ?>
                        <option value="<?= $wo['WONUM']; ?>"><?= $wo['WONUM']; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <small class="form-text text-danger"><?= form_error('nomor_wo'); ?></small>
                  </div>
                </div>
                <div class="col">
                  <label for="tgl_perbaikan" class="col-form-label-sm text-muted">Date</label>
                  <input placeholder="Date" type="text" autocomplete="off" class="form-control form-control-sm datepicker-here" data-language='en' name="tgl_perbaikan" id="tgl_perbaikan">
                  <small class="form-text text-danger"><?= form_error('tgl_perbaikan'); ?></small>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label for="note" class="col-form-label-sm text-muted">Note</label>
                  <textarea class="form-control" id="note" name="note" rows="3"></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-muted mt-3">
          <div class="row">
            <div class="col">
              <a href="<?= base_url(); ?>assetit" class="card-link">Kembali</a>
            </div>
            <div class="col">
              <button class="btn btn-primary float-right" type="submit" value="">Simpan</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Add Part-->
<div class="modal fade" id="modalAddPart" tabindex="-1" role="dialog" aria-labelledby="modalAddPartLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAddPartLabel">Stok Part IT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="idpc_perbaikan" class="col-form-label-sm text-muted">Pilih Part</label>
              <select class="form-control" id="part_id" name="part_id">
                <?php foreach ($partit as $part) : ?>
                  <option value="<?= $part['part_id']; ?>"><?= $part['part_name']; ?> | <?= $part['part_qty']; ?></option>
                <?php endforeach; ?>
              </select>
              <small class="form-text text-danger"><?= form_error('part_id'); ?></small>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary pilihPart">Pilih</button>
      </div>
    </div>
  </div>
</div>