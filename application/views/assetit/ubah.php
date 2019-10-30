<div class="mx-auto mt-4 " style="width: 43rem;">
  <div class="card bg-light mb-2" style="max-width: 43rem;">
    <h5 class="card-header">Ubah PC</h5>
    <div class="card-body">

      <form action="" method="post">
        <input type="hidden" name="id" value="<?= $assetit['idpc']; ?>">

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
                <input type="text" class="form-control form-control-sm" id="idpc" name="idpc" value='<?= $assetit['idpc']; ?>' readonly>
                <small class="form-text text-danger"><?= form_error('idpc'); ?></small>
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='user' class="col-form-label-sm text-muted mb-1">User</label>
                <input type="text" class="form-control form-control-sm" id="user" name="user" value='<?= $assetit['user']; ?>'>
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='nomor_pengajuan' class="col-form-label-sm text-muted mb-1">Nomor Pengajuan</label>
                <input type="text" class="form-control form-control-sm" id="nomor_pengajuan" name="nomor_pengajuan" value='<?= $assetit['nopengajuan']; ?>' readonly>
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
                  <?php foreach ($opt_departement as $opt_departement) : ?>
                    <?php if ($opt_departement == $assetit['dept']) : ?>
                      <option value="<?= $opt_departement; ?>" selected><?= $opt_departement; ?></option>
                    <?php else : ?>
                      <option value="<?= $opt_departement; ?>"><?= $opt_departement; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='jenis' class="col-form-label-sm text-muted mb-1">Jenis</label>
                <select class="form-control form-control-sm" id="jenis" name="jenis">
                  <?php foreach ($opt_jenis as $opt_jenis) : ?>
                    <?php if ($opt_jenis == $assetit['jenis']) : ?>
                      <option value="<?= $opt_jenis; ?>" selected><?= $opt_jenis; ?></option>
                    <?php else : ?>
                      <option value="<?= $opt_jenis; ?>"><?= $opt_jenis; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='pcname' class="col-form-label-sm text-muted mb-1">Nama PC</label>
                <input type="text" class="form-control form-control-sm" id="pcname" name="pcname" value='<?= $assetit['pcname']; ?>' readonly>
                <small class="form-text text-danger"><?= form_error('pcname'); ?></small>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-grup">
                <label for='ip' class="col-form-label-sm text-muted mb-1">IP</label>
                <input type="text" class="form-control form-control-sm" id="ip" name="ip" value='<?= $assetit['Ip']; ?>'>
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='monitor' class="col-form-label-sm text-muted mb-1">Id Monitor</label>
                <input type="text" class="form-control form-control-sm" id="monitor" name="monitor" value='<?= $assetit['Monitor']; ?>'>
                <small class="form-text text-danger"><?= form_error('monitor'); ?></small>
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='tahun' class="col-form-label-sm text-muted mb-1">Tahun</label>
                <select class="form-control form-control-sm" id="tahun" name="tahun">
                  <?php foreach ($opt_tahun as $opt_tahun) : ?>
                    <?php if ($opt_tahun == $assetit['Tahun']) : ?>
                      <option value="<?= $opt_tahun; ?>" selected><?= $opt_tahun; ?></option>
                    <?php else : ?>
                      <option value="<?= $opt_tahun; ?>"><?= $opt_tahun; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
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
              <input type="text" class="form-control form-control-sm" id="processor" name="processor" value='<?= $assetit['Processor']; ?>'>
              <small class="form-text text-danger"><?= form_error('processor'); ?></small>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='ram' class="col-form-label-sm text-muted mb-1">RAM</label>
                <input type="text" class="form-control form-control-sm" id="ram" name="ram" value='<?= $assetit['Ram']; ?>'>
                <small class="form-text text-danger"><?= form_error('ram'); ?></small>
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='vga' class="col-form-label-sm text-muted mb-1">VGA</label>
                <input type="text" class="form-control form-control-sm" id="vga" name="vga" value='<?= $assetit['Vga']; ?>'>
                <small class="form-text text-danger"><?= form_error('vga'); ?></small>
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='hdd' class="col-form-label-sm text-muted mb-1">HDD</label>
                <input type="text" class="form-control form-control-sm" id="hdd" name="hdd" value='<?= $assetit['Hdd']; ?>'>
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
                  <?php foreach ($opt_os as $opt_os) : ?>
                    <?php if ($opt_os == $assetit['OS']) : ?>
                      <option value="<?= $opt_os; ?>" selected><?= $opt_os; ?></option>
                    <?php else : ?>
                      <option value="<?= $opt_os; ?>"><?= $opt_os; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='license' class="col-form-label-sm text-muted mb-1">License</label>
                <input type="text" class="form-control form-control-sm" id="license" name="license" value='<?= $assetit['License']; ?>'>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-grup">
                <label for='office' class="col-form-label-sm text-muted mb-1">Office</label>
                <input type="text" class="form-control form-control-sm" id="office" name="office" value='<?= $assetit['Office']; ?>'>
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='antivirus' class="col-form-label-sm text-muted mb-1">Anti Virus</label>
                <input type="text" class="form-control form-control-sm" id="antivirus" name="antivirus" value='<?= $assetit['Antivirus']; ?>'>
              </div>
            </div>
            <div class="col">
              <div class="form-grup">
                <label for='pc_status' class="col-form-label-sm text-muted mb-1">Status</label>
                <select class="form-control form-control-sm" id="pcstatus" name="pcstatus">
                  <?php foreach ($opt_status as $opt_status) : ?>
                    <?php if ($opt_status == $assetit['pcstatus']) : ?>
                      <option value="<?= $opt_status; ?>" selectd><?= $opt_status; ?></option>
                    <?php else : ?>
                      <option value="<?= $opt_status; ?>"><?= $opt_status; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
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