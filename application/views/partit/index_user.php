<div class="container mb-5 mt-2" style="min-height: 33rem;">
  <?php if ($this->session->flashdata('flash')) : ?>
    <div class="row mt-3">
      <div class="col-md-6">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Data Part<strong> berhasil</strong> <?= $this->session->flashdata('flash'); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <div class="row">
    <div class="col">
      <h3 class="mt-3 z"><?= $tittle; ?></h3>
    </div>

  </div>
  <div class="row">
    <ul class="list-group">
      <table class="table table-hover table-bordered table-sm mydatatable" cellspacing="0" width="100%">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Item Id</th>
            <th scope="col">Part Name</th>
            <th scope="col">Part Detail</th>
            <th scope="col">Stok</th>
            <th scope="col">Receipt</th>
            <th scope="col">Note</th>
            <th scope="col">BPP</th>
            <!--<th scope="col">BPP</th>
                      <th scope="col">Bayar</th>
                      -->
          </tr>
        </thead>
        <tbody>
          <?php foreach ($asset as $ast) : ?>
            <tr>
              <td><?= $ast['item_id_ax']; ?></td>
              <td><?= $ast['part_name']; ?></td>
              <td><?= $ast['part_detail']; ?></td>
              <td><?= $ast['part_qty']; ?></td>
              <td><?= $ast['receipt_date']; ?></td>
              <td><?= $ast['part_note']; ?></td>
              <td><?= $ast['bpp_number']; ?></td>
              <!--<td style="text-align: center;"><a href="<?= $ast['part_id']; ?>" data-toggle="modal" data-target="#modalBpp" class="badge badge-info" >View</a></td> 
                      <td style="text-align: center;"><a href="" data-toggle="modal" data-target="#modalPembayaran" class="badge badge-info" >View</a></td> 
                      -->
            </tr>
          <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <th scope="col">Item Id</th>
            <th scope="col">Part Name</th>
            <th scope="col">Part Detail</th>
            <th scope="col">Stok</th>
            <th scope="col">Receipt</th>
            <th scope="col">Note</th>
            <th scope="col">BPP</th>
            <!--<th scope="col">BPP</th>
                      <th scope="col">Bayar</th>
                      -->
          </tr>
        </tfoot>
      </table>
    </ul>
  </div>

  <!-- Modal Add Part -->
  <div class="modal fade" id="modalAddPart" tabindex="-1" role="dialog" aria-labelledby="JudulModal2" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header mt-1">
          <h5 class="modal-title" id="JudulModal2">Tambah Part</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url(); ?>Partit/tambahPart" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" id="id">

          <div class="modal-body mt-1">
            <div class="row align-items-start">
              <div class="container">
                <div class="row ml-2 mr-2">
                  <div class="col">
                    <label for="idpc" class="col-form-label-sm text-muted">Part Name</label>
                    <input class="form-control form-control-sm" id="part_name" name="part_name" type="text" autocomplete="off" placeholder="">
                    <small class="form-text text-danger"><?= form_error('part_id'); ?></small>
                  </div>
                  <div class="col-4">
                    <?php $noUrut = (int) substr($ast['part_id'], 4, 3);
                    $noUrut++;
                    $char = "PART";
                    $kodeBarang = $char . sprintf("%03s", $noUrut);
                    ?>
                    <label for="idpc" class="col-form-label-sm text-muted">Part ID</label>
                    <input class="form-control form-control-sm" id="part_id" name="part_id" type="text" value="<?= $kodeBarang ?>" autocomplete="off" placeholder="" readonly>
                    <small class="form-text text-danger"><?= form_error('part_id'); ?></small>
                  </div>
                </div>
                <div class="row ml-2 mr-2">
                  <div class="col">
                    <label for="idpc" class="col-form-label-sm text-muted">Part Detail</label>
                    <textarea class="form-control form-control-sm" id="part_detail" name="part_detail" type="text" autocomplete="off" placeholder=""></textarea>
                    <small class="form-text text-danger"><?= form_error('part_detail'); ?></small>
                  </div>
                </div>
                <div class="row ml-2 mr-2">
                  <div class="col-6">
                    <label for="idpc" class="col-form-label-sm text-muted">BPP Number</label>
                    <input class="form-control form-control-sm" id="bpp_number" name="bpp_number" type="text" autocomplete="off" placeholder="">
                    <small class="form-text text-danger"><?= form_error('bpp_number'); ?></small>
                  </div>
                </div>
                <div class="row ml-2 mr-2">
                  <div class="col">
                    <label for="idpc" class="col-form-label-sm text-muted">Part Note</label>
                    <textarea class="form-control form-control-sm" id="part_note" name="part_note" type="text" autocomplete="off" placeholder=""></textarea>
                  </div>
                </div>
                <div class="row ml-2 mr-2">
                  <div class="col-6">
                    <label for="idpc" class="col-form-label-sm text-muted">Qty</label>
                    <input class="form-control form-control-sm" id="part_qty" name="part_qty" type="text" autocomplete="off" placeholder="">
                    <small class="form-text text-danger"><?= form_error('part_qty'); ?></small>
                  </div>
                  <div class="col-6">
                    <label for="idpc" class="col-form-label-sm text-muted">Receipt Date</label>
                    <input placeholder="Tanggal" type="text" autocomplete="off" class="form-control form-control-sm datepicker" name="receipt_date" id="receipt_date">
                  </div>
                </div>
                <!--
          Upload file--------------------------------------
          <div class="card mt-3 ml-2" style="width: 28rem;">
              <div class="card-body ml-3">
                  <div class="row">    
                      <table width="500" border="0">
                          <tr>
                              <td width="100">BPP</td>
                              <td><input type="file" name="nama_file" required></td>
                          </tr>
                      </table>     
                  </div>
                  <div class="row mt-2">    
                      <table width="500" border="0">
                          <tr>
                              <td width="100">Pembayaran</td>
                              <td><input type="file" name="nama_file" required></td>
                          </tr>
                      </table>     
                  </div>   
              </div>
          </div>-->
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnClose">Close</button>
            <button type="submit" class="btn btn-primary" id="btnSubmit">Simpan</button>
        </form>
      </div>
    </div>
  </div>
  <script src="<?= BASEURL; ?>/js/upload.js"></script>
</div>
</div>

<!-- Modal view BPP-->
<div id="modalBpp" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <!--<button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <h4 class="modal-title">BPP</h4>
      </div>
      <div class="modal-body">
        <embed src="../content/<?= $data['ast']['idpc'] ?>" type="application/pdf" frameborder="0" width="100%" height="400px">
        <?php console ?>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal view Pembayaran-->
<div id="modalPembayaran" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <!--<button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <h4 class="modal-title">Bukti Pembayaran</h4>
      </div>
      <div class="modal-body">
        <embed src="../content/Invoice_bpp05_0619_hub8port.pdf" frameborder="0" width="100%" height="400px">
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>