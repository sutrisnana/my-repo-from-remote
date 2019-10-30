<div class="mx-auto mt-4 " style="width: 52rem; min-height: 36rem;">
  <div class="card bg-light mb-2">
    <h5 class="card-header">History Asset</h5>
    <div class="card-body" style="min-height: 5rem;">
      <div class="col-sm-12 scroll mb-2">
        <?php foreach ((array) $asset as $row) : ?>
          <div class="row">
            <div class="col-2">
              <p class="card-text"><?= $row['perubahan']; ?></p>
              <p class="card-text font-weight-light"><?= $row['tgl_perbaikan']; ?></p>
            </div>
            <div class="col-2">
              <p class="card-text" id="tipe" name="tipe" value="<?= $row['tipe']; ?>"><?= $row['tipe']; ?></p>
              <p class="card-text font-weight-light"><?= $row['user']; ?></p>
            </div>
            <div class="col">
              <div class="row">
                <div class="col">
                  <p class="card-text font-weight-bold"><?= $row['nomor_wo']; ?></p>
                  <hr align="left" width="100%">
                </div>
                <div class="col-sm-3">
                  <!-- Button trigger modal -->
                  <a href="" class="badge badge-secondary detailHistory" data-toggle="modal" data-target="#modalDetailPart" data-id="<?= $row['id_history']; ?>">Detail Part</a>
                </div>
              </div>
              <p class="card-text text-monospace"><?= $row['note']; ?></p>
            </div>
          </div>
          <hr width="100%">
        <?php endforeach; ?>
      </div>
      <a href="<?= base_url(); ?>assetit" class="card-link">Kembali</a>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalDetailPart" tabindex="-1" role="dialog" aria-labelledby="modalDetailPartLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDetailPartLabel">Detail Pemakaian Part</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-row align-items-center">
          <div class="col-sm-3 my-1">
            <div class="form-grup">
              <label for='bpp' class="col-form-label-sm text-muted mb-1">Nomor Bpp</label>
              <input type="text" class="form-control form-control-sm" id="bpp" name="bpp" disabled>
            </div>
          </div>
          <div class="col-sm-3 my-1">
            <div class="form-grup">
              <label for='receiptdate' class="col-form-label-sm text-muted mb-1">Receipt Date</label>
              <input type="text" class="form-control form-control-sm" id="receiptdate" name="receiptdate" disabled>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-grup">
              <label for='partqty' class="col-form-label-sm text-muted mb-1">Qty</label>
              <input type="text" class="form-control form-control-sm" id="partqty" name="partqty" disabled>
            </div>
          </div>
          <div class="col-sm-4 my-1">
            <div class="form-grup">
              <label for='itemidax' class="col-form-label-sm text-muted mb-1">Item ID</label>
              <input type="text" class="form-control form-control-sm" id="itemidax" name="itemidax" disabled>
            </div>
          </div>
        </div>
        <div class="row mt-2">
          <div class="col">
            <div class="form-grup">
              <label for='part_note' class="col-form-label-sm text-muted mb-1">Note</label>
              <textarea class="form-control" id="part_note" name="part_note" rows="3" disabled></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>