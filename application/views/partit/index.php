<div class="row mr-4 ml-4">
  <div class="col">
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

    <!-- Pesan Eror -->
    <?php if (validation_errors()) : ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= validation_errors(); ?>
      </div>
    <?php endif; ?>


    <!-- Pesan Sukses -->
    <?= $this->session->flashdata('message'); ?>

    <?= $this->session->flashdata('img_uploaded_msg'); ?>

  </div>
</div>

<div class="row mr-4 ml-4">
  <div class="col">
    <h3 class="mt-3 z"><?= $tittle; ?></h3>
  </div>
  <div class="col mb-2">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-primary btn-sm float-right tombolTambahPart mt-3 z" data-toggle="modal" data-target="#modalAddPart" href="">
      Add Part
    </button>
  </div>
</div>

<div class="row mr-4 ml-4">
  <div class="col">
    <ul class="list-group">
      <table class="table table-hover table-bordered table-sm mydatatable" cellspacing="0" width="100%">
        <thead class="thead-dark">
          <tr>
            <th scope="col" class="text-center">Item Id</th>
            <th scope="col" class="text-center">Part Name</th>
            <th scope="col" class="text-center">Part Detail</th>
            <th scope="col" class="text-center">Stok</th>
            <th scope="col" class="text-center">Receipt</th>
            <th scope="col" class="text-center">Note</th>
            <th scope="col" class="text-center">BPP</th>
            <th scope="col" class="text-center">Image</th>
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
              <td><?= date('d F Y', $ast['receipt_date']); ?></td>
              <td><?= $ast['part_note']; ?></td>
              <td><?= $ast['bpp_number']; ?></td>
              <td style="text-align: center;">
                <a href="<?= $ast['part_id']; ?>" data-toggle="modal" data-target="#modalImage" class="badge badge-success">View</a>
              </td>
              <!--<td style="text-align: center;"><a href="<?= $ast['part_id']; ?>" data-toggle="modal" data-target="#modalBpp" class="badge badge-info" >View</a></td> 
                      <td style="text-align: center;"><a href="" data-toggle="modal" data-target="#modalPembayaran" class="badge badge-info" >View</a></td> 
                      -->
            </tr>
          <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <th scope="col" class="text-center">Item Id</th>
            <th scope="col" class="text-center">Part Name</th>
            <th scope="col" class="text-center">Part Detail</th>
            <th scope="col" class="text-center">Stok</th>
            <th scope="col" class="text-center">Receipt</th>
            <th scope="col" class="text-center">Note</th>
            <th scope="col" class="text-center">BPP</th>
            <th scope="col" class="text-center">Image</th>
            <!--<th scope="col">BPP</th>
                      <th scope="col">Bayar</th>
                      -->
          </tr>
        </tfoot>
      </table>
    </ul>
  </div>
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

      <div class="modal-body mt-1">
        <form action="<?= base_url(); ?>Partit/tambahPart" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" id="id">
          <div class="row align-items-start">
            <div class="container">
              <div class="row ml-2 mr-2">
                <div class="col">
                  <div class="form-group">
                    <label for="InvAx">Select Item</label>
                    <select class="form-control" id="InvAx" name="InvAx">
                      <?php foreach ($InvAx as $ax) : ?>
                        <option value="<?= $ax['ITEMID']; ?>"><?= $ax['ITEMID']; ?> <?= $ax['NAMEALIAS']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
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
                <div class="col-5">
                  <label for="idpc" class="col-form-label-sm text-muted">BPP Number</label>
                  <input class="form-control form-control-sm" id="bpp_number" name="bpp_number" type="text" autocomplete="off" placeholder="">
                  <small class="form-text text-danger"><?= form_error('bpp_number'); ?></small>
                </div>
                <div class="col-2">
                  <label for="idpc" class="col-form-label-sm text-muted">Qty</label>
                  <input class="form-control form-control-sm" id="part_qty" name="part_qty" type="text" autocomplete="off" placeholder="">
                  <small class="form-text text-danger"><?= form_error('part_qty'); ?></small>
                </div>
                <div class="col-">
                  <label for="idpc" class="col-form-label-sm text-muted">Receipt Date</label>
                  <input placeholder="Tanggal" type="text" autocomplete="off" class="form-control form-control-sm datepicker-here" data-language='en' name="receipt_date" id="receipt_date">
                </div>
              </div>
              <div class="row ml-2 mr-2">
                <div class="col">
                  <label for="idpc" class="col-form-label-sm text-muted">Part Note</label>
                  <textarea class="form-control form-control-sm" id="part_note" name="part_note" type="text" autocomplete="off" placeholder=""></textarea>
                </div>
              </div>
              <div class="row ml-2 mr-2">
                <div class="col">
                  <label for="image">Photo</label>
                  <input class="form-control-file <?= form_error('image') ? 'is-invalid' : '' ?>" type="file" name="image" />
                  <div class="invalid-feedback">
                    <?php echo form_error('image') ?>
                  </div>
                </div>
              </div>
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
</div>

<!-- Modal Image-->
<div class="modal fade" id="modalImage" tabindex="-1" role="dialog" aria-labelledby="modalImageLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalImageLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="upload_file" id="upload-file" value="upl-img" class="btn btn-primary mrgT">Upload</button>
      </div>
    </div>
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