<?php
    include("header.php");
    include("nav.php");
    include("koneksi.php");
?>
			 <div id="page-wrapper">

            <div class="container-fluid">


                 <!-- Main content -->
             	<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <i ></i>Jurnal Umum
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dasboard</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Jurnal Umum</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Bengkel Anugrah</h3>                                  
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Bukti</th>
                                            <th>Kode</th>
                                            <th>Nama Rekening</th>
                                            <th>Keterangan</th>
											<th>Debit</th>
											<th>Kredit</th>
                                        </tr>
										<?php
										$sql = mysql_query("SELECT * FROM jurnal");
										while ($row = mysql_fetch_array($sql))
										{
											echo '<tr>';
											echo '<td>'.$row['nama'].'</td>';
											echo '<td>'.number_format($isiP1,"0",",",".").'</td>';
											echo '</tr>';
											$jmlKw+=$isiP1;
										}
                                        ?>
                                        
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div><!-- /.row -->
				</section><!-- /.content -->                
            </aside><!-- /.right-side -->
<?php
include("footer.php");
?>