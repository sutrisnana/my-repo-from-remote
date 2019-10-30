<div class="container mb-2 mt-2" style="min-height: 36rem;">
  <?php if ($this->session->flashdata('flash')) : ?>
    <div class="row mt-3">
      <div class="col-md-6">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Data User<strong> berhasil</strong> <?= $this->session->flashdata('flash'); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if (empty($usr)) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      Data <strong><?= $keyword ?></strong> tidak ditemukan
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
      <a href="<?= base_url(); ?>auth/registration" class="btn btn-outline-primary btn-sm float-right mt-4">Add User</a>
    </div>
    <div class="col">
      <form action="<?= base_url('user'); ?>" method="POST">
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
              <th scope="col">Name</th>
              <th scope="col">Username</th>
              <th scope="col">Image</th>
              <th scope="col">Role Id</th>
              <th scope="col">Is Active</th>
              <th scope="col">Date Created</th>
              <th scope="col">Detail</th>
              <th scope="col">Ubah</th>
              <th scope="col">Hapus</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($usr as $usr) : ?>
              <tr>
                <td><?= ++$start; ?></td>
                <td><?= $usr['name']; ?></td>
                <td><?= $usr['user_name']; ?></td>
                <td><?= $usr['image']; ?></td>
                <td><?= $usr['role_id']; ?></td>
                <td><?= $usr['is_active']; ?></td>
                <td><?= date('d F Y', $usr['date_created']); ?></td>

                <td><a href="<?= base_url(); ?>user/detailUser/<?= $usr['user_id']; ?>" class="badge badge-info">Detail</a></td>
                <td><a href="" class="badge badge-secondary UbahUser" data-id="<?= $usr['user_id']; ?>" data-toggle="modal" data-target="#modalUbahUser">Edit</a></td>
                <td><a href="<?= base_url(); ?>user/hapusUser/<?= $usr['user_id']; ?>" class="badge badge-danger" onclick="return confirm('Hapus Data.?');">Hapus</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Username</th>
              <th scope="col">Image</th>
              <th scope="col">Role Id</th>
              <th scope="col">Is Active</th>
              <th scope="col">Date Created</th>
              <th scope="col">Detail</th>
              <th scope="col">Ubah</th>
              <th scope="col">Hapus</th>
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

<!-- Modal Ubah User -->
<div class="modal fade" id="modalUbahUser" tabindex="-1" role="dialog" aria-labelledby="modalUbahUserLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalUbahUserLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('user/ubahUser') ?>" method="POST">
          <input type="hidden" id="userid" name="userid">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="password">
          </div>
          <div class="form-group">
            <label for="image">Image</label>
            <input type="text" class="form-control" id="image" name="image" placeholder="Image">
          </div>
          <div class="row ml-1">
            <div class="form-group">
              <select class="form-control" id="roleid" name="roleid">
                <option>1</option>
                <option>2</option>
                <option>3</option>
              </select>
            </div>
            <div class="form-group form-check ml-5">
              <input type="checkbox" class="form-check-input" id="isactive" name="isactive" value="1" checked>
              <label class="form-check-label" for="isactive">Is Active?</label>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="btnSubmit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>