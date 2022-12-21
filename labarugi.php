<?php
include('header.php');
include('nav.php');
include('koneksi.php');
?>
        <div id="page-wrapper">

            <div class="container-fluid">


                 
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Laba Rugi
                        <small>Preview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i>Dasboard</a></li>
                        <li class="active">Laba Rugi</li>
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
                                        <thead>
                                            <tr>
                                                <th class="bg-green" colspan='2' style="vertical-align:middle;">Laporan Laba Rugi</th>
                                            </tr>
                                            
                                        </thead>
                                        <tbody>
											<?php
											echo '<tr>';
											echo '<th colspan="2" style="vertical-align:middle;">Pendapatan</th>';
											echo '</tr>';
											$sql = mysql_query("SELECT * FROM rekening where jenis = 'Pendapatan'");
											$jmlPn = 0;
											while ($row = mysql_fetch_array($sql))
											{
												$isi1 = $row['NS_disesuaikan_K'];
												echo '<tr>';
												echo '<td>'.$row['nama'].'</td>';
												echo '<td>'.number_format($isi1,"0",",",".").'</td>';
												echo '</tr>';
												$jmlPn+=$isi1;
											}
											echo '<tr>';
											echo '<td class="bg-aqua" style="font-weight:bold;" > Jumlah Pendapatan</td>';
											echo '<td class="bg-aqua" style="font-weight:bold;" >'.number_format($jmlPn,"0",",",".").'</td>';
											echo '</tr>';
											echo '<tr><td></td><td></td></tr>';
											?>
											<tr>
                                                <th colspan="2" style="vertical-align:middle;">Biaya Operasional</th>
                                            </tr>
											<?php
                                            $sql = mysql_query("SELECT * FROM rekening where jenis = 'Biaya Operasional'");
                                            $jmlBO = 0;
                                            while ($row = mysql_fetch_array($sql))
                                            {
                                                $isi2 = $row['NS_disesuaikan_D'];
                                                echo '<tr>';
                                                echo '<td>'.$row['nama'].'</td>';
                                                echo '<td>'.number_format($isi2,"0",",",".").'</td>';
                                                echo '</tr>';
												$jmlBO+=$isi2;
                                            }
                                            echo '<tr>';
                                            echo '<td class="bg-aqua"  style="font-weight:bold;" > Jumlah Biaya Operasional</td>';
                                            echo '<td class="bg-aqua" style="font-weight:bold;" >'.number_format($jmlBO,"0",",",".").'</td>';
                                            echo '</tr>';
											// echo '<tr><td></td><td></td></tr>';
											$jmlKotor = $jmlPn-$jmlBO;
											if ($jmlKotor>0){ $kotor = "Laba"; }
											else{ $kotor = "Rugi"; $jmlKotor = 0-$jmlKotor; }
											echo '<tr>';
                                            echo '<td class="bg-yellow" style="color:blue; font-weight:bold;" >'.$kotor.' Kotor</td>';
                                            echo '<td class="bg-yellow" style="color:blue; font-weight:bold;" >'.number_format($jmlKotor,"0",",",".").'</td>';
                                            echo '</tr>';
											echo '<tr><td></td><td></td></tr>';
											?>
											<tr>
                                                <th colspan="2" style="vertical-align:middle;">Pendapatan dan Biaya diluar Usaha</th>
                                            </tr>
											<?php
                                            $sql = mysql_query("SELECT * FROM rekening where jenis = 'Pendapatan dan Biaya diluar Usaha'");
                                            $jmlPB = 0;
                                            while ($row = mysql_fetch_array($sql))
                                            {
                                                $isi3 = $row['NS_disesuaikan_K'];
                                                echo '<tr>';
                                                echo '<td>'.$row['nama'].'</td>';
                                                echo '<td>'.number_format($isi3,"0",",",".").'</td>';
                                                echo '</tr>';
												$jmlPB+=$isi3;
                                            }
                                            echo '<tr>';
                                            echo '<td class="bg-aqua"  style="font-weight:bold;" > Jumlah Pendapatan dan Biaya diluar Usaha</td>';
                                            echo '<td class="bg-aqua" style="font-weight:bold;" >'.number_format($jmlPB,"0",",",".").'</td>';
                                            echo '</tr>';
											// echo '<tr><td></td><td></td></tr>';
											$LR = "Laba";
											if ($kotor == "Laba"){
												$jmlLR = $jmlKotor + $jmlPB;
											}
											else{
												$jmlLR = $jmlKotor - $jmlPB;
												if ($jmlLR>0){
													$LR = "Rugi";
												}
											}
                                            echo '<tr>';
                                            echo '<td class="bg-yellow" style="color:blue; font-weight:bold;" >'.$LR.' Bersih</td>';
                                            echo '<td class="bg-yellow" style="color:blue; font-weight:bold;" >'.number_format($jmlLR,"0",",",".").'</td>';
                                            echo '</tr>';   
											?>
											
										</tbody>
									</table>
                                </div><!-- /.box-body -->
								
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->


            

        </div>
        <!-- /#page-wrapper -->

    </div>
    <?php
    
    include('footer.php');
    ?>

</body>

</html>
