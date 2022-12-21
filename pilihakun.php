<?php
	include("header.php");
	include("nav.php");
	include("koneksi.php");
?>

		<div id="page-wrapper">

            <div class="container">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Input Saldo Penyesuaian
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Input Saldo Penyesuaian
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
<section class="content" style="height:500px;">

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-8">
                            <!-- general form elements disabled -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Saldo</h3>
                                </div>
								<!-- /.box-header -->
                                <div class="box-body">
									<?php
										if (isset($_POST['submit'])){
											if($_POST['nomor'] <> ''){
												try{
													if($_POST['klp']=='Debit'){
														$d = $_POST['saldo_d'] + $_POST['penyesuaian_d'] - $_POST['penyesuaian_k'];
														$query = mysql_query("UPDATE rekening SET saldo_d='".$_POST['saldo_d']."', 
														d_penyesuaian='".$_POST['penyesuaian_d']."', k_penyesuaian='".$_POST['penyesuaian_k']."', NS_disesuaikan_d='".$d."' 
														WHERE nomor='".$_POST['nomor']."'");
														if($_POST['jenis']=='Biaya Operasional'||$_POST['jenis']=='Pendapatan'|| $_POST['jenis']=='Pendapatan dan Biaya diluar Usaha'){
															$query2 = mysql_query("UPDATE labarugi_akhir set labarugi_d='".$d."' WHERE nomor='".$_POST['nomor']."'");
														}
														else{
															$query2 = mysql_query("UPDATE labarugi_akhir set akhir_d='".$d."' WHERE nomor='".$_POST['nomor']."'");
														}
													}
													else if($_POST['klp']=='Kredit'){
														$d = $_POST['saldo_k'] - $_POST['penyesuaian_d'] + $_POST['penyesuaian_k'];
														$query = mysql_query("UPDATE rekening SET saldo_k='".$_POST['saldo_k']."', 
														d_penyesuaian='".$_POST['penyesuaian_d']."', k_penyesuaian='".$_POST['penyesuaian_k']."', NS_disesuaikan_k='".$d."' 
														WHERE nomor='".$_POST['nomor']."'");
														if($_POST['jenis']=='Biaya Operasional'||$_POST['jenis']=='Pendapatan'|| $_POST['jenis']=='Pendapatan dan Biaya diluar Usaha'){
															$query2 = mysql_query("UPDATE labarugi_akhir set labarugi_k='".$d."' WHERE nomor='".$_POST['nomor']."'");
														}
														else{
															$query2 = mysql_query("UPDATE labarugi_akhir set akhir_k='".$d."' WHERE nomor='".$_POST['nomor']."'");
														}
													}
													$bersih = 0;
													$sql2 = mysql_query("SELECT * FROM labarugi_akhir");
													while ($lr = mysql_fetch_array($sql2)){
														$bersih += $lr['labarugi_k'] - $lr['labarugi_d'];
													}
													$query3 = mysql_query("UPDATE subtotal set hasil_bersih='".$bersih."' WHERE id='1'");
													
													if($query && $query2 && $query3){
														echo '<div class="box-body"><div class="alert alert-success alert-dismissable">
																  <i class="fa fa-check"></i>
																  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
																  <b>Success!</b> Saldo akun nomor '.$_POST['nomor'].' '.$_POST['nama'].' tersimpan.
															  </div></div>';
													}
													else{
														echo '<div class="box-body"><div class="alert alert-danger alert-dismissable">
															  <i class="fa fa-ban"></i>
															  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
															  <b>Error!</b> Saldo akun nomor '.$_POST['nomor'].' '.$_POST['nama'].' gagal disimpan.<br/>
															  </div></div>';
													}
												}catch(Exception $x){
													
												}
											}
											else{
												echo '<div class="box-body"><div class="alert alert-warning alert-dismissable">
														  <i class="fa fa-warning"></i>
														  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
														  <b>Attention!</b> Tidak boleh ada yang kosong.
													  </div></div>';
											}
										}
									?>
                                    <form role="form" action="inputsaldo.php" method="post">
										<div class="form-group">
                                            <label>Akun</label>
                                            <select name="nomor" required class="form-control">
											<option value="" >Choose...</option>
											<?php
											$sql = mysql_query("SELECT * FROM rekening");
											//$no = 1;
											while ($row = mysql_fetch_array($sql))
											{
												echo '<option value="'.$row['nomor'].'">'.$row['nomor'].' '.$row['nama'].'</option>';
												$klp = $row['klp'];
											}
											?>
                                            </select>
                                        </div>
										<button name="submit" type="submit" class="btn btn-success">Kirim</button>
										<button name="reset" type="reset" class="btn btn-danger">Batal</button>

                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!--/.col (left) -->
                    </div><!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
<?php

include("footer.php");

?>