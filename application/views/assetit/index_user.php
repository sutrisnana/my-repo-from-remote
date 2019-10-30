<div class="container mb-2 mt-2" style="min-height: 36rem;">
  <?php if ($this->session->flashdata('flash')) : ?>
    <div class="row mt-3">
      <div class="col-md-6">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Data PC<strong> berhasil</strong> <?= $this->session->flashdata('flash'); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if (empty($asset)) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      Data <strong><?= $keyword ?></strong> tidak ditemukan
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php endif; ?>

  <div class="row">
    <div class="col">
      <h3 class="mt-3 z">Data Asset PC</h3>
    </div>

    <div class="col">
      <form action="<?= base_url('assetit'); ?>" method="POST">
        <div class="input-group mt-4">
          <input type="text" class="form-control" placeholder="Cari data PC" name="keyword" autocomplete="off" autofucus>
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
              <th scope="col">#</th>
              <th scope="col">No. Asset</th>
              <th scope="col">User</th>
              <th scope="col">Dept</th>
              <th scope="col">Type</th>
              <th scope="col">Procesor</th>
              <th scope="col">RAM</th>
              <th scope="col">HDD</th>
              <th scope="col">History</th>
              <th scope="col">Detail</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($asset as $ast) : ?>
              <tr>
                <td><?= ++$start; ?></td>
                <td><?= $ast['idpc']; ?></td>
                <td><?= $ast['user']; ?></td>
                <td><?= $ast['dept']; ?></td>
                <td><?= $ast['jenis']; ?></td>
                <td><?= $ast['Processor']; ?></td>
                <td><?= $ast['Ram']; ?></td>
                <td><?= $ast['Hdd']; ?></td>

                <td><a href="<?= base_url(); ?>assetit/historyPc/<?= $ast['idpc']; ?>" class="badge badge-primary">History</a></td>
                <td><a href="<?= base_url(); ?>assetit/detailPc/<?= $ast['id']; ?>" class="badge badge-info">Detail</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <th scope="col">#</th>
              <th scope="col">No. Asset</th>
              <th scope="col">User</th>
              <th scope="col">Dept</th>
              <th scope="col">Type</th>
              <th scope="col">Procesor</th>
              <th scope="col">RAM</th>
              <th scope="col">HDD</th>
              <th scope="col">History</th>
              <th scope="col">Detail</th>
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