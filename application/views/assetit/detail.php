<div class="container mx-auto mt-4" style="width: 52rem;">
  <div class="row">
    <div class="col">
      <div class="card bg-light mb-2" style="max-width: 43rem;">
        <h5 class="card-header">Detail PC</h5>
        <div class="card-body">
          <div class="container">
            <div class="row">
              <div class="col">
                <label for='dept' class="col-form-label-sm text-muted mb-1">Id PC</label>
                <h6 class="card-text"><?= $asset['idpc'] ?></h6>
              </div>
              <div class="col">
                <label for='dept' class="col-form-label-sm text-muted mb-1">User</label>
                <h6 class="card-text"><?= $asset['user'] ?></h6>
              </div>
              <div class="col">
                <label for='dept' class="col-form-label-sm text-muted mb-1">Nomor Pengajuan</label>
                <h6 class="card-text"><?= $asset['nopengajuan'] ?></h6>
              </div>
              <div class="col">
                <td><a href="" class="badge badge-info detailAplikasi" data-toggle="modal" data-target="#modalDetailAplikasi" data-id="<?= $asset['idpc']; ?>">Applikasi</a></td>
              </div>
            </div>
            <hr width=" 100%">
          </div>
          <div class="container">
            <div class="row">
              <div class="col">
                <label for='dept' class="col-form-label-sm text-muted mb-1">Departemen</label>
                <p class="card-text"><?= $asset['dept'] ?></p>
              </div>
              <div class="col">
                <label for='jenis' class="col-form-label-sm text-muted mb-1">Jenis</label>
                <p class="card-text"><?= $asset['jenis'] ?></p>
              </div>
              <div class="col">
                <label for='pcname' class="col-form-label-sm text-muted mb-1">Nama PC</label>
                <p class="card-text"><?= $asset['pcname'] ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <label for='ip' class="col-form-label-sm text-muted mb-1">IP</label>
                <p class="card-text"><?= $asset['Ip'] ?></p>
              </div>
              <div class="col">
                <label for='monitor' class="col-form-label-sm text-muted mb-1">Id Monitor</label>
                <p class="card-text"><?= $asset['Monitor'] ?></p>
              </div>
              <div class="col">
                <label for='tahun' class="col-form-label-sm text-muted mb-1">Tahun</label>
                <p class="card-text"><?= $asset['Tahun'] ?></p>
              </div>
            </div>
            <hr width="100%">
          </div>
          <div class="container">
            <div class="row">
              <div class="col">
                <label for='processor' class="col-form-label-sm text-muted mb-1">Processor</label>
                <p class="card-text"><?= $asset['Processor'] ?></p>
              </div>
              <div class="col">
                <label for='ram' class="col-form-label-sm text-muted mb-1">RAM</label>
                <p class="card-text"><?= $asset['Ram'] ?></p>
              </div>
              <div class="col">
                <label for='vga' class="col-form-label-sm text-muted mb-1">VGA</label>
                <p class="card-text"><?= $asset['Vga'] ?></p>
              </div>
              <div class="col">
                <label for='hdd' class="col-form-label-sm text-muted mb-1">HDD</label>
                <p class="card-text"><?= $asset['Hdd'] ?></p>
              </div>
            </div>
            <hr width="100%">
          </div>

          <div class="container">
            <div class="row mb-3">
              <div class="col">
                <label for='os' class="col-form-label-sm text-muted mb-1">OS</label>
                <p class="card-text"><?= $asset['OS'] ?></p>
              </div>
              <div class="col">
                <label for='license' class="col-form-label-sm text-muted mb-1">License</label>
                <p class="card-text"><?= $asset['License'] ?></p>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col">
                <label for='office' class="col-form-label-sm text-muted mb-1">Office</label>
                <p class="card-text"><?= $asset['Office'] ?></p>
              </div>
              <div class="col">
                <label for='antivirus' class="col-form-label-sm text-muted mb-1">Anti Virus</label>
                <p class="card-text"><?= $asset['Antivirus'] ?></p>
              </div>
              <div class="col">
                <label for='pcstatus' class="col-form-label-sm text-muted mb-1">Status</label>
                <p class="card-text"><?= $asset['pcstatus'] ?></p>
              </div>
            </div>
            <hr width="100%">
          </div>
          <a href="<?= base_url(); ?>assetit" class="card-link">Kembali</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Detail Aplikasi-->
<div class="modal fade" id="modalDetailAplikasi" tabindex="-1" role="dialog" aria-labelledby="modalDetailAplikasiLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDetailAplikasiLabel">Aplikasi Yang Terinstal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">

          <div class="form-body">
            <div id="salle_list"></div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>