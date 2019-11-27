<div class="row mb-2 mr-4 ml-4">
  <div class="col">
    <?php if ($this->session->flashdata('flash')) : ?>
      <div class="row mt-3">
        <div class="col-md-6">
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data<strong> berhasil</strong> <?= $this->session->flashdata('flash'); ?>
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

  </div>
</div>

<div class="row ml-4 mr-4">
  <div class="col">
    <h3 class="mt-3 z"><?= $tittle; ?></h3>
  </div>

  <div class="col">
    <a href="<?= base_url(); ?>assetit/tambahPC" class="btn btn-outline-primary btn-sm float-right mt-4">Add PC</a>
    <a href="<?= base_url(); ?>assetit/perbaikanPc" class="btn btn-outline-primary btn-sm float-right mr-2 mt-4">Perbaikan</a>
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

<ul class="list-group mr-4 ml-4 mt-3">
  <table class="table table-hover table-bordered table-sm mydatatable" cellspacing="0" width="100%">
    <thead class="thead-dark">
      <tr>
        <th scope="col" class="text-center">#</th>
        <th scope="col" class="text-center">No. Asset</th>
        <th scope="col" class="text-center">User</th>
        <th scope="col" class="text-center">Dept</th>
        <th scope="col" class="text-center">Type</th>
        <th scope="col" class="text-center">Procesor</th>
        <th scope="col" class="text-center">RAM</th>
        <th scope="col" class="text-center">HDD</th>
        <th scope="col" class="text-center">History</th>
        <th scope="col" class="text-center">Detail</th>
        <th scope="col" class="text-center">Ubah</th>
        <th scope="col" class="text-center">Hapus</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($asset as $ast) : ?>
        <tr>
          <td class="text-center"><?= ++$start; ?></td>
          <td><?= $ast['idpc']; ?></td>
          <td><?= $ast['user']; ?></td>
          <td><?= $ast['dept']; ?></td>
          <td><?= $ast['jenis']; ?></td>
          <td><?= $ast['Processor']; ?></td>
          <td><?= $ast['Ram']; ?></td>
          <td><?= $ast['Hdd']; ?></td>

          <td class="text-center"><a href="<?= base_url(); ?>assetit/historyPc/<?= $ast['idpc']; ?>" class="badge badge-primary historyPC">History</a></td>
          <td class="text-center"><a href="<?= base_url(); ?>assetit/detailPc/<?= $ast['id']; ?>" class="badge badge-info">Detail</a></td>
          <td class="text-center"><a href="<?= base_url(); ?>assetit/ubahPc/<?= $ast['id']; ?>" class="badge badge-secondary">Ubah</a></td>
          <td class="text-center"><a href="<?= base_url(); ?>assetit/hapusPc/<?= $ast['id']; ?>" class="badge badge-danger" onclick="return confirm('Hapus Data.?');">Hapus</a></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
    <tfoot>
      <tr>
        <th scope="col" class="text-center">#</th>
        <th scope="col" class="text-center">No. Asset</th>
        <th scope="col" class="text-center">User</th>
        <th scope="col" class="text-center">Dept</th>
        <th scope="col" class="text-center">Type</th>
        <th scope="col" class="text-center">Procesor</th>
        <th scope="col" class="text-center">RAM</th>
        <th scope="col" class="text-center">HDD</th>
        <th scope="col" class="text-center">History</th>
        <th scope="col" class="text-center">Detail</th>
        <th scope="col" class="text-center">Ubah</th>
        <th scope="col" class="text-center">Hapus</th>
      </tr>
    </tfoot>
  </table>
</ul>
<div class="row ml-4 mr-4">
  <div class="col">Result : <?= $total_rows; ?><?= $this->pagination->create_links();  ?></div>
</div>