<?php
	include("header.php");
	include("nav.php");
	include("koneksi.php");
?>

 <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Chart Of Account
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i>Chart Of Account
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
<section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Data Rekening</h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nomor</th>
                                                <th>Nama</th>
                                                <th>Jenis</th>
												<th>KLP</th>
                                                <th>Edit</th>
                                                <th>Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
											$sql = mysql_query("SELECT * FROM rekening");
											//$no = 1;
											while ($row = mysql_fetch_array($sql))
											{
												echo '<tr>';
												//echo '<td>'.$no.'</td>';
												echo '<td>'.$row['nomor'].'</td>';
												echo '<td>'.$row['nama'].'</td>';
												echo '<td>'.$row['jenis'].'</td>';
												echo '<td>'.$row['klp'].'</td>';
												echo '<td><a href="edit.php?page=client&id=' . $row['nomor'] . '">Edit</a></td>';
												echo '<td><a href="hapus.php?page=client&id=' . $row['nomor'] . '">Hapus</a></td>';
												echo '</tr>';
												//$no++;
												
												// baca nama, nomor, dan tagihan
												$nama = $row['nama'];
												$nomor = $row['nomor'];
												$jenis = $row['jenis'];
												$klp = $row['klp'];
											}
											?>
											
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->


               
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php

include("footer.php");

?>