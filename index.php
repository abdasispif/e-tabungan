<?php 
    require_once 'Core/init.php';
    $siswa = $siswa->data_tabungan();
    $total_siswa = $total_siswa->data_siswa();
    $siswa_nabung = mysqli_num_rows($total_siswa);
    if (!Session::exists('nip')) {
        header('Location: login.php');
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
                <div class="col-xl-4 col-lg-6 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-block">
                                <div class="media">
                                    <div class="media-body text-xs-left">
                                        <h3 class="pink"><?= $siswa_nabung ?> Orang</h3>
                                        <span>Jumlah Siswa Menabung</span>
                                    </div>
                                    <div class="media-right media-middle">
                                        <i class="icon-user pink font-large-2 float-xs-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-block">
                                <div class="media">
                                    <div class="media-body text-xs-left">
                                        <h3 class="teal">Rp. 2.345,00</h3>
                                        <span>Tabungan Hari Ini</span>
                                    </div>
                                    <div class="media-right media-middle">
                                        <i class="icon-cash teal font-large-2 float-xs-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-block">
                                <div class="media">
                                    <div class="media-body text-xs-left">
                                        <h3 class="deep-orange">Rp. 9.387,00</h3>
                                        <span>Tabungan Bulan Ini</span>
                                    </div>
                                    <div class="media-right media-middle">
                                        <i class="icon-bag deep-orange font-large-2 float-xs-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ stats -->

            <!-- Recent invoice with Statistics -->
            <iv class="row match-height">
                <div class="col-xl-8 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Riwayat Transaksi</h4>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-block">
                                <p>Total Jumlah Penabung Hari Ini <span class="float-xs-right"><a href="#">Lihat Semua Transaksi<i class="icon-arrow-right2"></i></a></span></p>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0" id="data-siswa">
                                    <thead>
                                        <tr>
                                            <th>ID Tabungan</th>
                                            <th>Nama Siswa</th>
                                            <th>Kelas/Jurusan</th>
                                            <th>Tanggal Menbung</th>
                                            <th>Jumlah Tabungan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($siswa as $key => $data_siswa) : ?>
                                        <tr>
                                            <td class="text-truncate"><a href="#"><?= $data_siswa['id_tabungan'] ?></a></td>
                                            <td class="text-truncate"><?= $data_siswa['nama'] ?></td>
                                            <td class="text-truncate"><span class="tag tag-default tag-success"><?= $data_siswa['kelas'] ?> / <?= $data_siswa['jurusan'] ?></span></td>
                                            <td class="text-truncate"><?= $data_siswa['tanggal_nabung'] ?></td>
                                            <td class="text-truncate">Rp. <?= number_format($data_siswa['jumlah_tabungan'], 2, ',', '.' ); ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Rekor</h4>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                    <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                    <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block">
                                <p>Siswa Paling Rajin Menabung</p>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <span class="tag tag-primary tag-pill float-xs-right">Rp. 10.000,00</span>Abd. Asis
                                    </li>
                                    <li class="list-group-item">
                                        <span class="tag tag-success tag-pill float-xs-right">Rp. 9.900,00</span> Misbahul Anam
                                    </li>
                                    <li class="list-group-item">
                                        <span class="tag tag-danger tag-pill float-xs-right">Rp. 8.432,00</span> Abd.Haris
                                    </li>
                                    <li class="list-group-item">
                                        <span class="tag tag-danger tag-pill float-xs-right">Rp. 4.432,00</span> Irfan Mas'ud
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

    </div>
</div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

<script>
    $(document).ready(function() {
        $('#data-siswa').DataTable();
        
    } );

</script>


<?php require_once 'templates/footer.php' ?>