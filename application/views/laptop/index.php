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
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">No. Asset</th>
            <th scope="col" class="text-center">User</th>
            <th scope="col" class="text-center">Dept</th>
            <th scope="col" class="text-center">Type</th>
            <th scope="col" class="text-center">Merk</th>
            <th scope="col" class="text-center">Ukuran</th>
            <th scope="col" class="text-center">Procesor</th>
            <th scope="col" class="text-center">RAM</th>
            <th scope="col" class="text-center">HDD</th>
            <th scope="col" class="text-center">Tahun</th>
            <th scope="col" class="text-center">History</th>
            <th scope="col" class="text-center">Detail</th>
            <th scope="col" class="text-center">Edit</th>
            <th scope="col" class="text-center">Hapus</th>
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

              <td class="text-center"><a href="<?= base_url(); ?>laptop/historyLaptop/<?= $l['id_laptop']; ?>" class="badge badge-primary historyLaptop" data-toggle="modal" data-target="#modalLaptop">History</a></td>
              <td class="text-center"><a href="" class="badge badge-info detailLaptop" data-id="<?= $l['id']; ?>" data-toggle="modal" data-target="#modalLaptop">Detail</a></td>
              <td class="text-center"><a href="" class="badge badge-secondary editLaptop" data-id="<?= $l['id']; ?>" data-toggle="modal" data-target="#modalLaptop">Ubah</a></td>
              <td class="text-center"><a href="<?= base_url(); ?>laptop/hapusLaptop/<?= $l['id']; ?>" class="badge badge-danger" onclick="return confirm('Hapus Data.?');">Hapus</a></td>
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
            <th scope="col" class="text-center">Merk</th>
            <th scope="col" class="text-center">Ukuran</th>
            <th scope="col" class="text-center">Procesor</th>
            <th scope="col" class="text-center">RAM</th>
            <th scope="col" class="text-center">HDD</th>
            <th scope="col" class="text-center">Tahun</th>
            <th scope="col" class="text-center">History</th>
            <th scope="col" class="text-center">Detail</th>
            <th scope="col" class="text-center">Edit</th>
            <th scope="col" class="text-center">Hapus</th>
          </tr>
        </tfoot>
      </table>
    </ul>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalLaptop" tabindex="-1" role="dialog" aria-labelledby="modalLaptopScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLaptopScrollableTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="form-grup">
                <label for='id_laptop' class="col-form-label-sm text-muted mb-1">Id PC</label>
                <input type="text" class="form-control form-control-sm" id="id_laptop" name="id_laptop" disabled>
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='user' class="col-form-label-sm text-muted mb-1">User</label>
                <input type="text" class="form-control form-control-sm" id="user" name="user" disabled>
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='nopenjualan' class="col-form-label-sm text-muted mb-1">Nomor Pengajuan</label>
                <input type="text" class="form-control form-control-sm" id="nopenjualan" name="nopenjualan" disabled>
              </div>
            </div>
            <div class="col-2">
              <div class="form-grup">
                <div class="row">
                  <label for='detail' class="col-form-label-sm text-muted mb-1">Detail Aplikasi</label>
                </div>
                <div class="row">
                  <div class="col">
                    <a href="" class="badge badge-info detailAplikasi" data-toggle="modal" data-target="#modalDetailAplikasi" data-id="<?= $l['id_laptop']; ?>">Applikasi</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr width=" 100%">
        </div>
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="form-grup">
                <label for='dept' class="col-form-label-sm text-muted mb-1">Departemen</label>
                <input type="text" class="form-control form-control-sm" id="dept" name="dept" disabled>
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='jenis' class="col-form-label-sm text-muted mb-1">Jenis</label>
                <input type="text" class="form-control form-control-sm" id="jenis" name="jenis" disabled>
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='pcname' class="col-form-label-sm text-muted mb-1">Nama PC</label>
                <input type="text" class="form-control form-control-sm" id="pcname" name="pcname" disabled>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-grup">
                <label for='ip' class="col-form-label-sm text-muted mb-1">IP</label>
                <input type="text" class="form-control form-control-sm" id="ip" name="ip" disabled>
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='monitor' class="col-form-label-sm text-muted mb-1">Id Monitor</label>
                <input type="text" class="form-control form-control-sm" id="monitor" name="monitor" disabled>
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='tahun' class="col-form-label-sm text-muted mb-1">Tahun</label>
                <input type="text" class="form-control form-control-sm" id="tahun" name="tahun" disabled>
              </div>
            </div>
          </div>
          <hr width="100%">
        </div>
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="form-grup">
                <label for='processor' class="col-form-label-sm text-muted mb-1">Processor</label>
                <input type="text" class="form-control form-control-sm" id="processor" name="processor" disabled>
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='ram' class="col-form-label-sm text-muted mb-1">RAM</label>
                <input type="text" class="form-control form-control-sm" id="ram" name="ram" disabled>
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='vga' class="col-form-label-sm text-muted mb-1">VGA</label>
                <input type="text" class="form-control form-control-sm" id="vga" name="vga" disabled>
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='hdd' class="col-form-label-sm text-muted mb-1">HDD</label>
                <input type="text" class="form-control form-control-sm" id="hdd" name="hdd" disabled>
              </div>
            </div>
          </div>
          <hr width="100%">
        </div>

        <div class="container">
          <div class="row mb-3">
            <div class="col">
              <div class="form-grup">
                <label for='os' class="col-form-label-sm text-muted mb-1">OS</label>
                <input type="text" class="form-control form-control-sm" id="os" name="os" disabled>
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='license' class="col-form-label-sm text-muted mb-1">License</label>
                <input type="text" class="form-control form-control-sm" id="license" name="license" disabled>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <div class="form-grup">
                <label for='office' class="col-form-label-sm text-muted mb-1">Office</label>
                <input type="text" class="form-control form-control-sm" id="office" name="office" disabled>
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='antivirus' class="col-form-label-sm text-muted mb-1">Anti Virus</label>
                <input type="text" class="form-control form-control-sm" id="antivirus" name="antivirus" disabled>
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='pcstatus' class="col-form-label-sm text-muted mb-1">Status</label>
                <input type="text" class="form-control form-control-sm" id="status" name="status" disabled>
              </div>
            </div>
          </div>
          <hr width="100%">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="btnSubmit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>