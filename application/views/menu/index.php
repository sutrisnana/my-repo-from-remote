<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $tittle; ?></h1>
  <div class="div">
    <div class="col-lg-8">
      <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row mt-3">
          <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              Data Menu<strong> berhasil</strong> <?= $this->session->flashdata('flash'); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <!-- Pesan Eror -->
      <?= form_error('menuname', '<div class="alert alert-danger alert-dismissible fade show"role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>') ?>

      <!-- Pesan Sukses -->
      <?= $this->session->flashdata('message'); ?>

      <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Add New Menu</a>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Menu</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($menu as $mn) : ?>
            <tr>
              <th scope="row"><?= $i; ?></th>
              <th scope="col"><?= $mn['menu'] ?></th>
              <th scope="col">
                <a href="" class="badge badge-secondary ModalUbah" data-toggle="modal" data-target="#newMenuModal" data-id="<?= $mn['id']; ?>">Edit</a>

                <a href="<?= base_url(); ?>/menu/hapusMenu/<?= $mn['id']; ?>" class="badge badge-danger" onclick="return confirm('Hapus Data.?');">Delete</a>
              </th>
            </tr>
            <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>

    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Add New Menu -->
<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu/index') ?>" method="POST">
        <input type="hidden" name="id" id="id">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control form-control-sm" id="menu" name="menu">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="btnSubmit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>