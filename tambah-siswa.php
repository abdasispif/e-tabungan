<?php 

    require_once 'Core/init.php';

    if (Input::get('submit')) {
        $siswa->tambah_siswa(array(
            'nis' => Input::get('nis'),
            'nama' => Input::get('nama'),
            'kelas' => Input::get('kelas'),
            'jurusan' => Input::get('jurusan'),
            'tempLahir' => Input::get('ttl'),
            'tangLahir' => Input::get('tanggal-lahir'),
            'alamat' => Input::get('alamat'),
            'noSiswa' => Input::get('no-siswa'),
            'noOrtu' => Input::get('no-ortu'),
            'email' => Input::get('email'),            
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
                                

                                <form class="form" method="POST" action="tambah-siswa.php">
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="icon-eye6"></i> Tentang Siswa</h4>
                                        <div class="form-group">
                                            <label for="timesheetinput3">Nama Lengkap</label>
                                            <div class="position-relative has-icon-left">
                                                <input type="text" id="timesheetinput3" class="form-control" name="nama" placeholder="Masukan Nama Lengkap">
                                                <div class="form-control-position">
                                                    <i class="icon-user3"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="timesheetinput3">NIS</label>
                                            <div class="position-relative has-icon-left">
                                                <input type="text" id="timesheetinput3" class="form-control" name="nis" placeholder="Masukan NIS">
                                                <div class="form-control-position">
                                                    <i class="icon-card"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="timesheetinput3">Kelas</label>
                                            <div class="position-relative has-icon-left">
                                                <input type="text" id="timesheetinput3" class="form-control" name="kelas" placeholder="Masukan Kelas">
                                                <div class="form-control-position">
                                                    <i class="icon-podium"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="timesheetinput3">Jurusan</label>
                                            <div class="position-relative has-icon-left">
                                                <input type="text" id="timesheetinput3" class="form-control" name="jurusan" placeholder="Masukan Jurusan">
                                                <div class="form-control-position">
                                                    <i class="icon-ios-flask-outline"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="timesheetinput3">Tempat Lahir</label>
                                            <div class="position-relative has-icon-left">
                                                <input type="text" id="timesheetinput3" class="form-control" name="ttl" placeholder="Masukan Tempat Lahir">
                                                <div class="form-control-position">
                                                    <i class="icon-location3"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="timesheetinput3">Tanggal Lahir</label>
                                            <div class="position-relative has-icon-left">
                                                <input type="date" id="timesheetinput3" class="form-control" name="tanggal-lahir">
                                                <div class="form-control-position">
                                                    <i class="icon-calendar5"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="timesheetinput3">Alamat Lengkap</label>
                                            <textarea id="timesheetinput3" class="form-control" rows="5" name="alamat"> </textarea>
                                        </div>



                                        <h4 class="form-section"><i class="icon-mail6"></i> Kontak yang Bisa di Hubungi</h4>

                                        <div class="form-group">
                                            <label for="userinput5">Nomor Tel. Siswa</label>
                                            <input class="form-control " type="text" placeholder="Masukan Tel. Siswa" name="no-siswa" id="userinput5">
                                        </div>

                                        <div class="form-group">
                                            <label for="userinput6">Nomor Tel. Ortu</label>
                                            <input class="form-control " type="text" placeholder="Masukan Tel. Ortu" id="userinput6" name="no-ortu">
                                        </div>

                                        <div class="form-group">
                                            <label>Emali</label>
                                            <input class="form-control " id="userinput7" name="email" type="text" placeholder="Masukan Email Siswa">
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