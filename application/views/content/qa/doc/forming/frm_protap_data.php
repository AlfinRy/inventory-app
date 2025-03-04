<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <h5 class="m-b-10">Data Protap Forming</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript:">QA</a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Forming</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('QA/Doc/Doc_forming/Forming') ?>">Doc Forming</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('QA/Doc/Doc_forming/frm_protap') ?>">Protap</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <div class="main-body">
          <div class="page-wrapper">
            <!-- [ Main Content ] start -->
            <div class="row">
              <!-- [ basic-table ] start -->
              <div class="col-xl-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Forming</h5> <br>
                    <h5>Doc Forming</h5> <br>
                    <h5><b>Protap</b></h5>
                    <div class="btn-group">
                      <button type="button" class="btn btn-dark btn-outline-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Jenis Document 
                      </button>
                      <div class="dropdown-menu scrollable-menu" role="menu">
                          <a class="dropdown-item" href="<?= base_url('QA/Doc/Doc_forming/frm_form') ?>">Form</a>
                          <a class="dropdown-item" href="<?= base_url('QA/Doc/Doc_forming/frm_kualifikasi') ?>">Kualifikasi</a>
                          <a class="dropdown-item" href="<?= base_url('QA/Doc/Doc_forming/frm_manual_mutu') ?>">Manual Mutu</a>
                          <a class="dropdown-item" href="<?= base_url('QA/Doc/Doc_forming/frm_prosedur_proses') ?>">Prosedur Proses</a>
                          <a class="dropdown-item" href="<?= base_url('QA/Doc/Doc_forming/frm_protap') ?>">Protap</a>
                          <a class="dropdown-item" href="<?= base_url('QA/Doc/Doc_forming/frm_rks_stabilitas') ?>">Rks Stabilitas</a>
                          <a class="dropdown-item" href="<?= base_url('QA/Doc/Doc_forming/frm_spesifikasi') ?>">Spesifikasi</a>
                          <a class="dropdown-item" href="<?= base_url('QA/Doc/Doc_forming/frm_tabel') ?>">Tabel</a>
                          <a class="dropdown-item" href="<?= base_url('QA/Doc/Doc_forming/frm_urjab') ?>">Urjab</a>
                          <a class="dropdown-item" href="<?= base_url('QA/Doc/Doc_forming/frm_validasi') ?>">Validasi</a>
                      </div>
                    </div>

                    <!-- Button trigger modal -->

                    <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                      <i class="feather icon-plus"></i>Tambah Data
                    </button>

                  </div>
                  <div class="card-block table-border-style">

                    <?php
                    // print_r($result);
                    ?>
                    <div class="table-responsive">
                      <table class="table datatable table-hover table-striped table-sm">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Jenis Doc</th>
                            <th>Nama Document</th>
                            <th>Tgl Berlaku</th>
                            <th>Tgl Review</th>
                            <th class="text-center">Detail</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('level');
                          $no = 1;
                          foreach ($result as $k) {
                            $tgl_berlaku =  explode('-', $k['tgl_berlaku'])[2] . "/" . explode('-', $k['tgl_berlaku'])[1] . "/" . explode('-', $k['tgl_berlaku'])[0];
                            $tgl_review =  explode('-', $k['tgl_review'])[2] . "/" . explode('-', $k['tgl_review'])[1] . "/" . explode('-', $k['tgl_review'])[0];
                            ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $k['jenis_doc_frm'] ?></td>
                              <td><?= $k['nama_doc_frm'] ?></td>
                              <td><?= $k['tgl_berlaku'] ?></td>
                              <td><?= $k['tgl_review'] ?></td>
                              <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#view" data-id_doc_frm="<?= $k['id_doc_frm'] ?>" data-jenis_doc_frm="<?= $k['jenis_doc_frm'] ?>" data-nama_doc_frm="<?= $k['nama_doc_frm'] ?>" data-tgl_berlaku="<?= $tgl_berlaku ?>" data-tgl_review="<?= $tgl_review ?>">
                                    <i class="feather icon-eye"></i>Detail
                                  </button>
                                </div>
                              </td>
                              <td class="text-center">
                                <?php if ($level === "admin" || $level === "purchasing") { ?>
                                  <div class="btn-group" role="group">
                                  <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#edit" data-id_doc_frm="<?= $k['id_doc_frm'] ?>" data-jenis_doc_frm="<?= $k['jenis_doc_frm'] ?>" data-nama_doc_frm="<?= $k['nama_doc_frm'] ?>" data-tgl_berlaku="<?= $tgl_berlaku ?>" data-tgl_review="<?= $tgl_review ?>">
                                      <i class="feather icon-edit-2"></i>Edit
                                </button>
                                  </div>
                                  <div class="btn-group" role="group">
                                    <a href="<?= base_url() ?>QA/Doc/Doc_forming/frm_protap/delete/<?= $k['id_doc_frm'] ?>" class="btn btn-danger btn-square text-light btn-sm" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                      <i class="feather icon-trash-2"></i>Hapus
                                    </a>
                                  </div>
                                <?php } ?>
                              </td>
                            </tr>
                          <?php
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- [ basic-table ] end -->

            </div>
            <!-- [ Main Content ] end -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Protap</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>QA/Doc/Doc_forming/frm_protap/add">
        <div class="modal-body">
          <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="jenis_doc_frm">Jenis Document</label>
                <input type="text" class="form-control" id="jenis_doc_frm" name="jenis_doc_frm" value="Protap" disabled>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama_doc_frm">Nama Document</label>
                <input type="text" class="form-control text-uppercase" id="nama_doc_frm" name="nama_doc_frm" placeholder="Nama Document" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tgl_berlaku">Tanggal Berlaku</label>
                <input type="text" class="form-control datepicker" id="tgl_berlaku" name="tgl_berlaku" placeholder="Tanggal Berlaku" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tgl_review">Tanggal Review</label>
                <input type="text" class="form-control datepicker" id="tgl_review" name="tgl_review" placeholder="Tanggal Review" autocomplete="off" required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="simpan" class="btn btn-primary" onclick="if (! confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Datanya')) { return false; }">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {

    $('#add').on('hidden.bs.modal', function() {
      $(this).find('form')[0].reset();
    });

    uppercase('#jenis_doc_frm');
    uppercase('#nama_doc_frm');

  })
</script>

<!-- Modal Detail-->
<div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Protap Forming</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="jenis_doc_frm">Jenis Document</label>
                  <input type="text" class="form-control text-uppercase" id="v-jenis_doc_frm" name="jenis_doc_frm" placeholder="Jenis Document" autocomplete="off" readonly>
                </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="nama_doc_frm">Nama Document</label>
                      <input type="text" class="form-control text-uppercase" id="v-nama_doc_frm" name="nama_doc_frm" placeholder="Nama Document" autocomplete="off" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tgl_berlaku">Tanggal Berlaku</label>
                        <input type="text" class="form-control datepicker" id="v-tgl_berlaku" name="tgl_berlaku" placeholder="Tanggal Berlaku" autocomplete="off" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label for="tgl_review">Tanggal review</label>
                    <input type="text" class="form-control datepicker" id="v-tgl_review" name="tgl_review" placeholder="Tanggal Review" autocomplete="off" readonly>
                </div>
                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#view').on('show.bs.modal', function(event) {
      var id_doc_frm = $(event.relatedTarget).data('id_doc_frm')
      var jenis_doc_frm = $(event.relatedTarget).data('jenis_doc_frm')
      var nama_doc_frm = $(event.relatedTarget).data('nama_doc_frm')
      var tgl_berlaku = $(event.relatedTarget).data('tgl_berlaku')
      var tgl_review = $(event.relatedTarget).data('tgl_review')

      $(this).find('#v-id_doc_frm').val(id_doc_frm)
      $(this).find('#v-jenis_doc_frm').val(jenis_doc_frm)
      $(this).find('#v-nama_doc_frm').val(nama_doc_frm)
      $(this).find('#v-tgl_berlaku').val(tgl_berlaku)
      $(this).find('#v-tgl_review').val(tgl_review)
    })
  })
</script>

<!-- Modal Edit-->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Protap Forming</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>QA/Doc/Doc_forming/frm_protap/update">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="jenis_doc_frm">Jenis Document</label>
                <input type="hidden" id="e-id_doc_frm" name="id_doc_frm"> <!-- INI PENTING JGN KELEWAT-->
                <select class="form-control chosen-select" id="e-jenis_doc_frm" name="jenis_doc_frm" required>
                    <option value="" disabled selected hidden>- Pilih Jenis Document -</option>
                    <option value="Form">Form</option>
                    <option value="Kualifikasi">Kualifikasi</option>
                    <option value="Manual Mutu">Manual Mutu</option>
                    <option value="Prosedur Proses">Prosedur Proses</option>
                    <option value="Protap">Protap</option>
                    <option value="RKS Stabilitas">RKS Stabilitas</option>
                    <option value="Spesifikasi">Spesifikasi</option>
                    <option value="Tabel">Tabel</option>
                    <option value="Urjab">Urjab</option>
                    <option value="Validasi">Validasi</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama_doc_frm">Nama Document</label>
                  <input type="text" class="form-control text-uppercase" id="e-nama_doc_frm" name="nama_doc_frm" placeholder="Nama Document" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tgl_berlaku">Tanggal Berlaku</label>
                <input type="text" class="form-control datepicker" id="e-tgl_berlaku" name="tgl_berlaku" placeholder="Tanggal Berlaku" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tgl_review">Tanggal review</label>
                <input type="text" class="form-control datepicker" id="e-tgl_review" name="tgl_review" placeholder="Tanggal Review" autocomplete="off" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="simpan" class="btn btn-primary" onclick="if (! confirm('Apakah Anda Yakin Untuk Mengedit Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#edit').on('show.bs.modal', function(event) {
      
      var id_doc_frm = $(event.relatedTarget).data('id_doc_frm')
      var jenis_doc_frm = $(event.relatedTarget).data('jenis_doc_frm')
      var nama_doc_frm = $(event.relatedTarget).data('nama_doc_frm')
      var tgl_berlaku = $(event.relatedTarget).data('tgl_berlaku')
      var tgl_review = $(event.relatedTarget).data('tgl_review')

      $(this).find('#e-id_doc_frm').val(id_doc_frm)
      $(this).find('#e-jenis_doc_frm').val(jenis_doc_frm)
      $(this).find('#e-jenis_doc_frm').trigger("chosen:updated");
      $(this).find('#e-nama_doc_frm').val(nama_doc_frm)
      $(this).find('#e-tgl_berlaku').val(tgl_berlaku)
      $(this).find('#e-tgl_review').val(tgl_review)
      $(this).find('#e-tgl_berlaku').datepicker().on('show.bs.modal', function(event) {
        event.stopImmediatePropagation();
      });
      $(this).find('#e-tgl_review').datepicker().on('show.bs.modal', function(event) {
        event.stopImmediatePropagation();
      });
    });

  uppercase('#e-jenis_doc_frm');
  uppercase('#e-nama_doc_frm');

  })    
</script>