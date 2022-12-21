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
                        Neraca Lajur
                        <small>Preview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i>Dasboard</a></li>
                        <li class="active">Neraca Lajur</li>
                    </ol>
                </section>

                 <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12" style="background-color:azure;">
                            
                            
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Bengkel Anugerah</h3>                                  
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" style="vertical-align:middle;">Nomor</th>
                                                <th rowspan="2" style="vertical-align:middle;">Nama</th>
                                                <th colspan="2">Neraca Saldo</th>
												<th colspan="2">Penyesuaian</th>
                                                <th colspan="2">NS Disesuaikan</th>
                                                <th colspan="2">Laba Rugi</th>
                                                <th colspan="2">Neraca</th>
                                            </tr>
                                            <tr>
                                                <td>Debit</td>
                                                <td>Kredit</td>
                                                <td>Debit</td>
                                                <td>Kredit</td>
                                                <td>Debit</td>
                                                <td>Kredit</td>
                                                <td>Debit</td>
                                                <td>Kredit</td>
                                                <td>Debit</td>
                                                <td>Kredit</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $st_lr_d = 0; $st_lr_k = 0;
											$st_a_d = 0; $st_a_k = 0;
											$sql = mysql_query("SELECT * FROM rekening INNER JOIN labarugi_akhir ON rekening.nomor = labarugi_akhir.nomor");
											while ($row = mysql_fetch_array($sql))
											{
												echo '<tr>';
												echo '<td>'.$row['nomor'].'</td>';
												echo '<td>'.$row['nama'].'</td>';
                                                echo '<td>'.number_format($row['saldo_d'],"0",",",".").'</td>';
                                                echo '<td>'.number_format($row['saldo_k'],"0",",",".").'</td>';
                                                echo '<td>'.number_format($row['d_penyesuaian'],"0",",",".").'</td>';
                                                echo '<td>'.number_format($row['k_penyesuaian'],"0",",",".").'</td>';
                                                echo '<td>'.number_format($row['NS_disesuaikan_D'],"0",",",".").'</td>';
                                                echo '<td>'.number_format($row['NS_disesuaikan_K'],"0",",",".").'</td>';
                                                if($row['jenis']=='Biaya Operasional'||$row['jenis']=='Pendapatan'|| $row['jenis']=='Pendapatan dan Biaya diluar Usaha'){
                                                    echo '<td>'.number_format($row['labarugi_d'],"0",",",".").'</td>';
                                                    echo '<td>'.number_format($row['labarugi_k'],"0",",",".").'</td>';
                                                    echo '<td>0</td>';
                                                    echo '<td>0</td>';
                                                    $st_lr_d += $row['labarugi_d'];
                                                    $st_lr_k += $row['labarugi_k'];
                                                }
                                                else{
                                                    echo '<td>0</td>';
                                                    echo '<td>0</td>';
                                                    echo '<td>'.number_format($row['akhir_d'],"0",",",".").'</td>';
                                                    echo '<td>'.number_format($row['akhir_k'],"0",",",".").'</td>';
													$st_a_d +=$row['akhir_d'];
													$st_a_k +=$row['akhir_k'];
                                                }
                                                 echo '</tr>';
											}
                                           
                                            echo '<tr>';
                                            echo '<tdcolspan="2">Sub Total</td>';
                                            echo '<td></td>';
                                            echo '<td ></td>';
                                            echo '<td ></td>';
                                            echo '<td ></td>';
                                            echo '<td ></td>';
                                            echo '<td ></td>';
                                            echo '<td >'.number_format($st_lr_d,"0",",",".").'</td>';
                                            echo '<td >'.number_format($st_lr_k,"0",",",".").'</td>';
                                            echo '<td >'.number_format($st_a_d,"0",",",".").'</td>';
                                            echo '<td >'.number_format($st_a_k,"0",",",".").'</td>';
											echo '</tr>';
											if($st_lr_k > $st_lr_d){
												$bersih = 'Laba';
											}
											else{
												$bersih = 'Rugi';
											}
											$b_lr = $st_lr_k - $st_lr_d;
											$b_a = $st_a_d - $st_a_k;
                                            echo '<tr>';
                                            echo '<td class="bg-blue" colspan="2">'.$bersih.' Bersih</td>';
                                            echo '<td class="bg-yellow"></td>';
                                            echo '<td class="bg-yellow"></td>';
                                            echo '<td class="bg-yellow"></td>';
                                            echo '<td class="bg-yellow"></td>';
                                            echo '<td class="bg-yellow"></td>';
                                            echo '<td class="bg-yellow"></td>';
                                            echo '<td class="bg-yellow">'.number_format($b_lr,"0",",",".").'</td>';
                                            echo '<td class="bg-yellow"></td>';
                                            echo '<td class="bg-yellow"></td>';
                                            echo '<td class="bg-yellow">'.number_format($b_a,"0",",",".").'</td>';
											echo '</tr>';
											$t_lr_d = $st_lr_d+$b_lr;
											$t_a_k = $st_a_k+$b_a;
											echo '<tr>';
                                            echo '<td class="bg-green" colspan="2">Total</td>';
                                            echo '<td class="bg-green"></td>';
                                            echo '<td class="bg-green"></td>';
                                            echo '<td class="bg-green"></td>';
                                            echo '<td class="bg-green"></td>';
                                            echo '<td class="bg-green"></td>';
                                            echo '<td class="bg-green"></td>';
                                            echo '<td class="bg-green">'.number_format($t_lr_d,"0",",",".").'</td>';
                                            echo '<td class="bg-green">'.number_format($st_lr_k,"0",",",".").'</td>';
                                            echo '<td class="bg-green">'.number_format($st_a_d,"0",",",".").'</td>';
                                            echo '<td class="bg-green">'.number_format($t_a_k,"0",",",".").'</td>';
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
