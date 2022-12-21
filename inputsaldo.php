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
                      Input Saldo Penyesuaian
                        <small>Preview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i>Dasboard</a></li>
                        <li class="active">Input Saldo Penyesuaian</li>
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
                                    <h3 class="box-title">Saldo</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
								
								<?php
									if (isset($_POST['submit'])){
										if($_POST['nomor'] <> ''){
											try{
												$akun = mysql_query("SELECT * FROM rekening WHERE nomor='".$_POST['nomor']."'");
												$row = mysql_fetch_array($akun);
											}catch(Exception $x){
												
											}
										}
										else{
											echo '<div class="box-body"><div class="alert alert-warning alert-dismissable">
													  <i class="fa fa-warning"></i>
													  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
													  <b>Attention!</b> Pilih akun yang akan diedit.
												  </div></div>';
										}
									}
								?>
								
                                    <form role="form" action="pilihakun.php" method="post">
									
										<div class="form-group">
                                            <label>Akun</label>
											<?php
												echo '<input type="text" class="form-control" value="'.$row['nomor'].' '.$row['nama'].'" disabled>';
												echo '<input type="hidden" name="nomor" value="'.$row['nomor'].'">';
												echo '<input type="hidden" name="nama" value="'.$row['nama'].'">';
												echo '<input type="hidden" name="klp" value="'.$row['klp'].'">';
												echo '<input type="hidden" name="jenis" value="'.$row['jenis'].'">';
											?>
                                        </div>
										
										<div class="form-group">
											<p>Tipe : <?php
											echo $row['klp'];
											?></p>
										</div>
										
										<div class="form-group">
											<table class="table table-bordered table-striped">
												<thead>
													<tr>
														<th colspan='2'>Neraca Saldo</th>
														<th colspan='2'>Penyesuaian</th>
													</tr>
													<tr>
														<th>Debit</th>
														<th>Kredit</th>
														<th>Debit</th>
														<th>Kredit</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<th><input name="saldo_d" type="number" value="<?php echo $row['saldo_d'] ?>" <?php if($row['klp']=='Kredit'){echo 'disabled';}?> ></th>
														<th><input name="saldo_k" type="number" value="<?php echo $row['saldo_k'] ?>" <?php if($row['klp']=='Debit'){echo 'disabled';}?> ></th>
														<th><input name="penyesuaian_d" type="number" value="<?php echo $row['d_penyesuaian'] ?>"></th>
														<th><input name="penyesuaian_k" type="number" value="<?php echo $row['k_penyesuaian'] ?>"></th>
													</tr>
												</tbody>
											</table>
										</div><!-- /form-group -->
										
										<button name="submit" type="submit" class="btn btn-success">Kirim</button>
										<!-- <form> -->
										<button name="batal" type="submit" class="btn btn-danger">Batal</button>
										<!-- </form> -->

                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!--/.col (left) -->
                    </div><!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
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
