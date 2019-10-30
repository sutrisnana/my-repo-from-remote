<div class="container mb-5 mt-2" style="min-height: 32rem;">
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

  <?php if (empty($infrastruktur)) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      Data <strong><?= $keyword2 ?></strong> tidak ditemukan
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php endif; ?>

  <div class="row">
    <div class="col">
      <h3 class="mt-3 z"><?= $tittle; ?></h3>
    </div>
    <div class="col">
      <a href="<?= base_url(); ?>infrastruktur/tambahPart" class="btn btn-outline-primary btn-sm float-right mt-4">Add Infrastrukrur IT</a>
    </div>
    <div class="col">
      <form action="<?= base_url('infrastruktur/index'); ?>" method="POST">
        <div class="input-group mt-4">
          <input type="text" class="form-control" placeholder="Cari data Infrastrukrur IT" name="keyword2" autocomplete="off" autofucus>
          <div class="input-group-append">
            <input class="btn btn-outline-primary" type="submit" name="submit" value="Cari">
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="row">
    <div class="container mt-2">
      <ul class="list-group">
        <table class="table table-hover table-bordered table-sm mydatatable" cellspacing="0" width="100%">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Item Id</th>
              <th scope="col">Part Name</th>
              <th scope="col">Part Detail</th>
              <th scope="col">Area</th>
              <th scope="col">Usr Date</th>
              <th scope="col">Receipt</th>
              <th scope="col">BPP</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($infrastruktur as $i) : ?>
              <tr>
                <td><?= $i['item_id_ax']; ?></td>
                <td><?= $i['part_name']; ?></td>
                <td><?= $i['part_detail']; ?></td>
                <td><?= $i['area_part']; ?></td>
                <td><?= $i['use_date']; ?></td>
                <td><?= $i['receipt_date']; ?></td>
                <td><?= $i['bpp']; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <th scope="col">Item Id</th>
              <th scope="col">Part Name</th>
              <th scope="col">Part Detail</th>
              <th scope="col">Area</th>
              <th scope="col">Usr Date</th>
              <th scope="col">Receipt</th>
              <th scope="col">BPP</th>
            </tr>
          </tfoot>
        </table>
      </ul>
      <div class="row">
        <div class="col">Result : <?= $total_rows; ?><?= $this->pagination->create_links();  ?></div>
      </div>
    </div>

  </div>
</div>