<?php
include('header.php');
include('nav.php');
include('koneksi.php');
?>
        <div id="page-wrapper">

            <div class="container-fluid">


                 <!-- Main content -->
             	<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Chart of Account
                        <small>Preview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i>Dasboard</a></li>
                        <li class="active">Insert Chart Of Account</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content" style="height:500px;">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-8">
                            
                            <!-- general form elements disabled -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Insert Account</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
								
								<?php
									if (isset($_POST['submit'])){
										if($_POST['nomor'] && $_POST['nama'] && $_POST['jenis'] && $_POST['klp'] <> ''){
											try{
												//$query = mysql_query("UPDATE rekening SET saldo='".$_POST['nomor']."' WHERE nomor='".$_POST['saldo']."'");
												$query = mysql_query("INSERT INTO rekening(nomor, nama, jenis, klp) VALUES(".$_POST['nomor'].", '".$_POST['nama']."', '".$_POST['jenis']."', '".$_POST['klp']."')");
												$query2 = mysql_query("INSERT INTO labarugi_akhir(nomor) VALUES(".$_POST['nomor'].")");
												if($query && $query2){
													echo '<div class="box-body"><div class="alert alert-success alert-dismissable">
															  <i class="fa fa-check"></i>
															  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
															  <b>Success!</b> Akun nomor '.$_POST['nomor'].' '.$_POST['nama'].' tersimpan.
														  </div></div>';
												}
												else{
													echo '<div class="box-body"><div class="alert alert-danger alert-dismissable">
														  <i class="fa fa-ban"></i>
														  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
														  <b>Error!</b> Akun nomor '.$_POST['nomor'].' '.$_POST['nama'].' gagal disimpan.<br/>
														  Pastikan nomor rekening berbeda dengan yang lain.
														  </div></div>';
												}
											}catch(Exception $x){
												
											}
										}else{
											echo '<div class="box-body"><div class="alert alert-warning alert-dismissable">
													  <i class="fa fa-warning"></i>
													  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
													  <b>Attention!</b> Tidak boleh ada yang kosong.
												  </div></div>';
										}
									}
								?>

                                    <form role="form" action="" method="post">
									
										<div class="form-group">
                                            <label>Jenis Rekening</label>
                                            <select name="jenis" class="form-control">
												<option value="">Choose...</option>
                                                <option value="Aktiva Lancar">Aktiva Lancar</option>
                                                <option value="Aktiva Tak Lancar">Aktiva Tak Lancar</option>
                                                <option value="Kewajiban">Kewajiban</option>
                                                <option value="Modal">Modal</option>
                                                <option value="Pendapatan">Pendapatan</option>
												<option value="Biaya Operasional">Biaya Operasional</option>
												<!--<option value="Biaya Administrasi dan Umum">Biaya Administrasi dan Umum</option>-->
												<option value="Pendapatan dan Biaya diluar Usaha">Pendapatan dan Biaya diluar Usaha</option>
                                            </select>
                                        </div>
										
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Nomor Rekening</label>
                                            <input name="nomor" type="number" class="form-control" placeholder="Max 6 numbers..." required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Rekening</label>
                                            <input name="nama" type="text" class="form-control" placeholder="Enter..." required/>
                                        </div>
										<div class="form-group">
										<label>Kelompok Rekening</label>
										<div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <input name="klp" type="radio" value="Debit" required>
                                                </span>
                                                <input type="text" class="form-control" value="Debit" disabled>
                                            </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <input name="klp" type="radio" value="Kredit">
                                                </span>
                                                <input type="text" class="form-control" value="Kredit" disabled>
                                            </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->
										</div><!-- /.row -->
										</div>
										<button name="submit" type="submit" class="btn btn-success">Kirim</button>
                                        <button name="reset" type="reset" class="btn btn-danger">Batal</button>

                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!--/.col (left) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->

                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <?php
    
    include('footer.php');
    ?>

</body>

</html>
