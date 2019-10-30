<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $tittle; ?></h1>

  <div class="div">
    <div class="col-lg-10">

      <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row mt-3">
          <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              Data Submenu<strong> berhasil</strong> <?= $this->session->flashdata('flash'); ?>
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

      <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Add New Submenu</a>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Menu</th>
            <th scope="col">Url</th>
            <th scope="col">Icon</th>
            <th scope="col">Active</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($subMenu as $sm) : ?>
            <tr>
              <th scope="row"><?= $i; ?></th>
              <th scope="col"><?= $sm['title'] ?></th>
              <th scope="col"><?= $sm['menu'] ?></th>
              <th scope="col"><?= $sm['url'] ?></th>
              <th scope="col"><?= $sm['icon'] ?></th>
              <th scope="col"><?= $sm['is_active'] ?></th>
              <th scope="col">
                <a href="" class="badge badge-secondary modalUbahSubmenu" data-toggle="modal" data-target="#newSubMenuModal" data-id="<?= $sm['id']; ?>">Edit</a>
                <a href="<?= base_url(); ?>/menu/hapusSubMenu/<?= $sm['id']; ?>" class="badge badge-danger" onclick="return confirm('Hapus Data.?');">Delete</a>
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
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newSubMenuModalLabel">Add New Submenu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('menu/submenu'); ?>" method="POST">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <input type="text" class="form-control" id="title" name="title" placeholder="Submenu Title">
          </div>
          <div class="form-group">
            <select name="menu_id" id="menu_id" name='menu_id' class="form-control">
              <?php foreach ($menu as $m) : ?>
                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="url" name="url" placeholder="Submenu Url">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu Icon">
          </div>
          <div class="div form-grup">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
              <label class="form-check-label" for="is_active">
                Active?
              </label>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="btnSubmit">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>