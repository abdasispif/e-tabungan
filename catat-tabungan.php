<?php 

    require_once 'Core/init.php';
    $siswa = $siswa->data_siswa();
    $nama_siswa = "";
    $nama = Input::get('nama');
    if ($nama) {
        foreach ($nama as $value) {
            $nama_siswa = $value;
        }
    }

    if (!Session::exists('nip')) {
        header('Location: login.php');
    }

    $nis = $tabungan->get_nis($nama_siswa);
    if (Input::get('submit')) {
        $tabungan->catat_tabungan(array(
            'id_tabungan' => date("Ymds"),
            'tanggal_nabung' => Input::get('tanggal-nabung'),
            'jumlah_tabungan' => (int)Input::get('jum-tabungan'),
            'penerima' => 'Admin',
            'nis' => $nis
        ));
    }
?>



<!-- import template header -->
<?php require_once 'templates/header.php'; ?>

<!-- import template side-menu -->
<?php require_once 'templates/side-menu.php'; ?>



<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- stats -->
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-colored-form-control">Data Siswa 
                            </h4>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block">

                                <div class="card-text">
                                    <p>Silahkan masukan data siswa sesuai dengan yang ada pada data raport</p>
                                </div>
                                <?php if (Input::get('sukses')) : ?>
                                <div class="alert alert-success no-border mb-2" role="alert">
									<strong>Selamat!!! </strong> <?php echo Input::get('sukses');?>
                                </div>
                                <?php endif ?>
                                <?php if (Input::get('gagal')) : ?>
                                <div class="alert alert-danger no-border mb-2" role="alert">
									<strong>Maaf!!! </strong> <?php echo Input::get('gagal');?>
                                </div>
                                <?php endif ?>
                                

                                <form class="form" method="POST" action="">
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="icon-eye6"></i> Catat Tabungan Siswa</h4>

                                        <div class="form-group">
                                            <label for="issueinput5">Pilih Siswa</label>
                                            <select id="issueinput5" name="nama[]" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Priority">
                                                <?php foreach ($siswa as $key => $nama_siswa) : ?>
                                                <option value="<?= $nama_siswa['nama'] ?>"> <?= $nama_siswa['nama'] ?> </option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                

                                        <div class="form-group">
                                            <label for="timesheetinput3">Tanggal Nabung</label>
                                            <div class="position-relative has-icon-left">
                                                <input type="date" id="timesheetinput3" class="form-control" name="tanggal-nabung" placeholder="Masukan Jurusan">
                                                <div class="form-control-position">
                                                    <i class="icon-ios-flask-outline"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="timesheetinput3">Jumlah Tabungan</label>
                                            <div class="position-relative has-icon-left">
                                                <input type="text"  id="timesheetinput3" class="form-control" name="jum-tabungan">
                                                <div class="form-control-position">
                                                    <i class="icon-calendar5"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-actions right">
                                        <input class="btn btn-primary" name="submit" type="submit" value="Simpan">
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-colored-form-control">Data Siswa</h4>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block">
                                <ol type="1">
                                    <li>Masukan Data Siswa Sesuai Dengan yang ada pada raport siswa</li>
                                    <li>Butuh Bantuan Baca panduan lengkap di halaman bantuan</li>
                                </ol>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

<?php require_once 'templates/footer.php' ?>