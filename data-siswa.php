<?php 

    require_once 'Core/init.php';
    if (Input::get('action') === 'delete') {
        die($hapus_siswa->hapus_siswa(Input::get('nis')));
    }

    if (!Session::exists('nip')) {
        header('Location: login.php');
    }
    
    $siswa = $siswa->data_siswa();
    $total_siswa = mysqli_num_rows($siswa);
    
   
 ?>

<?php require_once 'templates/header.php'; ?>
<?php require_once 'templates/side-menu.php' ?>

<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
                <h2 class="content-header-title">Data Siswa</h2>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper col-xs-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Tables</a>
                        </li>
                        <li class="breadcrumb-item active">Basic Tables
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic Tables start -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Siswa</h4> 
                            <!-- <button type="button" class="btn btn-outline-primary mt-4" data-toggle="modal" data-target="#default">
										Launch Modal
							</button> -->
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block card-dashboard">
                                <p class="card-text">Dibawah ini merupakan data siswa yang ikut tabungan tahunan</p>
                                <?php if (Input::get('sukses')) : ?>
                                <div class="alert alert-success no-border mb-2" role="alert">
                                    <strong>Selamat!!! </strong>
                                    <?php echo Input::get('sukses');?>
                                </div>
                                <?php endif ?>
                                <?php if (Input::get('gagal')) : ?>
                                <div class="alert alert-danger no-border mb-2" role="alert">
                                    <strong>Maaf!!! </strong>
                                    <?php echo Input::get('gagal');?>
                                </div>
                                <?php endif ?>
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-striped table-bordered table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>NIS</th>
                                                <th>Nama</th>
                                                <th>Kelas</th>
                                                <th>No. Siswa</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($siswa as $key => $data_siswa) : ?>
                                            <tr>
                                                <td>
                                                    <?= $data_siswa['nis']; ?>
                                                </td>
                                                <td>
                                                    <a>
                                                        <?= $data_siswa['nama']; ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <?= $data_siswa['kelas']; ?> /
                                                        <?= $data_siswa['jurusan']; ?>
                                                </td>
                                                <td>
                                                    <?= $data_siswa['noSiswa']; ?>
                                                </td>
                                                <td><a href="data-siswa.php?action=delete&nis=<?= $data_siswa['nis'] ?>"><i class="icon-trash-o"></a></i> | <a href="" data-toggle="modal" data-target="#default"  class="icon-pencil"></a> | <i class="icon-eye4"></i></td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>NIS</th>
                                                <th>Nama</th>
                                                <th>Kelas</th>
                                                <th>No. Siswa</th>
                                                <th>Action</th>

                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade text-xs-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
                <h4 class="modal-title" id="myModalLabel1">Basic Modal</h4>
            </div>
            <div class="modal-body">
                <h5>Check First Paragraph</h5>
                <p>Oat cake ice cream candy chocolate cake chocolate cake cotton candy dragée apple pie. Brownie carrot cake candy canes bonbon fruitcake topping halvah. Cake sweet roll cake cheesecake cookie chocolate cake liquorice. Apple pie sugar plum
                    powder donut soufflé.</p>
                <p>Sweet roll biscuit donut cake gingerbread. Chocolate cupcake chocolate bar ice cream. Danish candy cake.</p>
                <hr>
                <h5>Some More Text</h5>
                <p>Cupcake sugar plum dessert tart powder chocolate fruitcake jelly. Tootsie roll bonbon toffee danish. Biscuit sweet cake gummies danish. Tootsie roll cotton candy tiramisu lollipop candy cookie biscuit pie.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();

    });
</script>

<?php require_once 'templates/footer.php'?>