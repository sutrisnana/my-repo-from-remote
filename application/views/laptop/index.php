<div class="container" style="min-height: 33rem;">
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
    <div class="col mb-2">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-outline-primary btn-sm float-right tombolTambahPart mt-3 z" data-toggle="modal" data-target="#modalAddPart" href="">
        Add Part
      </button>
    </div>
  </div>

  <div class="row">
    <ul class="list-group">
      <table class="table table-hover table-bordered table-sm mydatatable" cellspacing="0" width="100%">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">No. Asset</th>
            <th scope="col">User</th>
            <th scope="col">Dept</th>
            <th scope="col">Type</th>
            <th scope="col">Merk</th>
            <th scope="col">Ukuran</th>
            <th scope="col">Procesor</th>
            <th scope="col">RAM</th>
            <th scope="col">HDD</th>
            <th scope="col">Tahun</th>
            <th scope="col">History</th>
            <th scope="col">Detail</th>
            <th scope="col">Edit</th>
            <th scope="col">Hapus</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($laptop as $l) : ?>
            <tr>
              <td><?= ++$start; ?></td>
              <td><?= $l['id_laptop']; ?></td>
              <td><?= $l['user']; ?></td>
              <td><?= $l['dept']; ?></td>
              <td><?= $l['jenis']; ?></td>
              <td><?= $l['merk']; ?></td>
              <td><?= $l['ukuran']; ?></td>
              <td><?= $l['processor']; ?></td>
              <td><?= $l['ram']; ?></td>
              <td><?= $l['hdd']; ?></td>
              <td><?= $l['tahun']; ?></td>

              <td><a href="<?= base_url(); ?>laptop/historyPc/<?= $l['id_laptop']; ?>" class="badge badge-primary historyPC">History</a></td>
              <td><a href="<?= base_url(); ?>laptop/detailPc/<?= $l['id']; ?>" class="badge badge-info">Detail</a></td>
              <td><a href="<?= base_url(); ?>laptop/ubahPc/<?= $l['id']; ?>" class="badge badge-secondary">Ubah</a></td>
              <td><a href="<?= base_url(); ?>laptop/hapusPc/<?= $l['id']; ?>" class="badge badge-danger" onclick="return confirm('Hapus Data.?');">Hapus</a></td>
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
            <th scope="col">Merk</th>
            <th scope="col">Ukuran</th>
            <th scope="col">Procesor</th>
            <th scope="col">RAM</th>
            <th scope="col">HDD</th>
            <th scope="col">Tahun</th>
            <th scope="col">History</th>
            <th scope="col">Detail</th>
            <th scope="col">Edit</th>
            <th scope="col">Hapus</th>
          </tr>
        </tfoot>
      </table>
    </ul>
  </div>