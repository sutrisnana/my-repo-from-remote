<div class="mx-auto mt-4 " style="width: 40rem;">
  <div class="card bg-light mb-2" style="max-width: 40rem;">
    <h5 class="card-header"><?= $tittle; ?></h5>
    <div class="card-body">

      <form action="" method="post">

        <div class="container">

          <!-- Alert
                    <?php if (validation_errors()) : ?>
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <?= validation_errors(); ?>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                          </div>
                    <?php endif; ?>
                    End Alert -->

          <div class="row">
            <div class="col">
              <div class="form-grup">
                <label for='idpc' class="col-form-label-sm text-muted mb-1">Id PC</label>
                <input type="text" class="form-control form-control-sm" id="idpc" name="idpc">
                <small class="form-text text-danger"><?= form_error('idpc'); ?></small>
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='user' class="col-form-label-sm text-muted mb-1">User</label>
                <input type="text" class="form-control form-control-sm" id="user" name="user">
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='nomor_pengajuan' class="col-form-label-sm text-muted mb-1">Nomor Pengajuan</label>
                <input type="text" class="form-control form-control-sm" id="nomor_pengajuan" name="nomor_pengajuan">
              </div>
            </div>
          </div>
          <hr width="100%">
        </div>
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="form-grup">
                <label for='dept' class="col-form-label-sm text-muted mb-1">Departemen</label>
                <select class="form-control form-control-sm" id="dept" name="dept">
                  <option value="None">-</option>
                  <option value="Management">Management</option>
                  <option value="Warehouse">Warehouse</option>
                  <option value="Purchasing">Purchasing</option>
                  <option value="Engineering">Engineering</option>
                  <option value="It">It</option>
                  <option value="Qa">Qa</option>
                  <option value="Produksi">Produksi</option>
                  <option value="Hrd">Hrd</option>
                  <option value="Sales">Sales</option>
                  <option value="R&D">R&D</option>
                  <option value="Finance">Finance</option>
                  <option value="Accounting">Accounting</option>
                  <option value="Ppic">Ppic</option>
                  <option value="Gm">Gm</option>
                </select>
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='jenis' class="col-form-label-sm text-muted mb-1">Jenis</label>
                <select class="form-control form-control-sm" id="jenis" name="jenis">
                  <option value="None">-</option>
                  <option value="PC">PC</option>
                  <option value="Laptop">Laptop</option>
                </select>
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='pcname' class="col-form-label-sm text-muted mb-1">Nama PC</label>
                <input type="text" class="form-control form-control-sm" id="pcname" name="pcname">
                <small class="form-text text-danger"><?= form_error('pcname'); ?></small>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-grup">
                <label for='ip' class="col-form-label-sm text-muted mb-1">IP</label>
                <input type="text" class="form-control form-control-sm" id="ip" name="ip">
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='monitor' class="col-form-label-sm text-muted mb-1">Id Monitor</label>
                <input type="text" class="form-control form-control-sm" id="monitor" name="monitor">
                <small class="form-text text-danger"><?= form_error('monitor'); ?></small>
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='tahun' class="col-form-label-sm text-muted mb-1">Tahun</label>
                <select class="form-control form-control-sm" id="tahun" name="tahun">
                  <option value="None">-</option>
                  <option value="2016">2014</option>
                  <option value="2016">2015</option>
                  <option value="2016">2016</option>
                  <option value="2017">2017</option>
                  <option value="2018">2018</option>
                  <option value="2019">2019</option>
                  <option value="2020">2020</option>
                </select>
              </div>
            </div>
          </div>
          <hr width="100%">
        </div>
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="form-grup"></div>
              <label for='processor' class="col-form-label-sm text-muted mb-1">Processor</label>
              <input type="text" class="form-control form-control-sm" id="processor" name="processor">
              <small class="form-text text-danger"><?= form_error('processor'); ?></small>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='ram' class="col-form-label-sm text-muted mb-1">RAM</label>
                <input type="text" class="form-control form-control-sm" id="ram" name="ram">
                <small class="form-text text-danger"><?= form_error('ram'); ?></small>
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='vga' class="col-form-label-sm text-muted mb-1">VGA</label>
                <input type="text" class="form-control form-control-sm" id="vga" name="vga">
                <small class="form-text text-danger"><?= form_error('vga'); ?></small>
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='hdd' class="col-form-label-sm text-muted mb-1">HDD</label>
                <input type="text" class="form-control form-control-sm" id="hdd" name="hdd">
                <small class="form-text text-danger"><?= form_error('hdd'); ?></small>
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
                <select class="form-control form-control-sm" id="os" name="os">
                  <option value="None">-</option>
                  <option value="W7">W7</option>
                  <option value="W10">W10</option>
                  <option value="Linux">Linux</option>
                </select>
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='license' class="col-form-label-sm text-muted mb-1">License</label>
                <input type="text" class="form-control form-control-sm" id="license" name="license">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-grup">
                <label for='office' class="col-form-label-sm text-muted mb-1">Office</label>
                <input type="text" class="form-control form-control-sm" id="office" name="office">
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='antivirus' class="col-form-label-sm text-muted mb-1">Anti Virus</label>
                <input type="text" class="form-control form-control-sm" id="antivirus" name="antivirus">
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='pc_status' class="col-form-label-sm text-muted mb-1">Status</label>
                <select class="form-control form-control-sm" id="pcstatus" name="pcstatus">
                  <option value="None">-</option>
                  <option value="OK">OK</option>
                  <option value="Rusak">Rusak</option>
                  <option value="Perbaikan">Perbaikan</option>
                </select>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="card-footer text-muted">
      <div class="row">
        <div class="col">
          <a href="<?= base_url(); ?>assetit" class="card-link">Kembali</a>
        </div>
        <div class="col">
          <button class="btn btn-primary float-right" type="submit" value="">Simpan</button>
        </div>
      </div>
    </div>
    </form>
  </div>
</div>