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
                      Neraca
                        <small>Preview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i>Dasboard</a></li>
                        <li class="active">Neraca</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Foto Studio Aneka</h3>                                  
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="bg-green" colspan='2' style="vertical-align:middle;">Aktiva</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            echo '<tr>';
                                            echo '<th colspan="2" style="vertical-align:middle;">Aktiva Lancar </th>';
                                            echo '</tr>';
                                            $sql = mysql_query("SELECT * FROM rekening where jenis = 'Aktiva Lancar'");
                                            $jmlAL = 0;
                                            while ($row = mysql_fetch_array($sql))
                                            {
                                                $isi1 = $row['NS_disesuaikan_D'] - $row['NS_disesuaikan_K'];
                                                echo '<tr>';
                                                echo '<td>'.$row['nama'].'</td>';
                                                echo '<td>'.number_format($isi1,"0",",",".").'</td>';
                                                echo '</tr>';
                                                $jmlAL+=$isi1;
                                            }
                                            echo '<tr>';
                                            echo '<td class="bg-aqua" style="font-weight:bold;" > Jumlah Aktiva Lancar</td>';
                                            echo '<td class="bg-aqua" style="font-weight:bold;" >'.number_format($jmlAL,"0",",",".").'</td>';
                                            echo '</tr>';
                                            echo '<tr><td></td><td></td></tr>';
                                            ?>
                                            <tr>
                                                <th colspan="2" style="vertical-align:middle;">Aktiva Tak Lancaar</th>
                                            </tr>

                                            <?php
                                            $sql = mysql_query("SELECT * FROM rekening where jenis = 'Aktiva Tak Lancar'");
                                            $jmlAT = 0;
                                            while ($row = mysql_fetch_array($sql))
                                            {
                                                $isi2 = $row['NS_disesuaikan_D'] - $row['NS_disesuaikan_K'];
                                                echo '<tr>';
                                                echo '<td>'.$row['nama'].'</td>';
                                                echo '<td>'.number_format($isi2,"0",",",".").'</td>';
                                                echo '</tr>';
												$jmlAT+=$isi2;
                                            }
                                            echo '<tr>';
                                            echo '<td class="bg-aqua"  style="font-weight:bold;" > Jumlah Aktiva Tak Lancar</td>';
                                            echo '<td class="bg-aqua" style="font-weight:bold;" >'.number_format($jmlAT,"0",",",".").'</td>';
                                            echo '</tr>';

                                            $jmlA = $jmlAL + $jmlAT;
                                            echo '<tr><td></td><td></td></tr>';
                                            echo '<tr>';
                                            echo '<td class="bg-yellow" style="color:blue; font-weight:bold;" > Jumlah Aktiva </td>';
                                            echo '<td class="bg-yellow" style="color:blue; font-weight:bold;" >'.number_format($jmlA,"0",",",".").'</td>';
                                            echo '</tr>';

                                            
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
							</div><!-- /.box -->
							<hr/>
							<div class="box">
								<div class="box-body table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="bg-green" colspan='2' style="vertical-align:middle;">Pasiva</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            echo '<tr>';
                                            echo '<th colspan="2" style="vertical-align:middle;">Kewajiban</th>';
                                            echo '</tr>';
                                            $sql = mysql_query("SELECT * FROM rekening where jenis = 'Kewajiban'");
                                            $jmlKw = 0;
                                            while ($row = mysql_fetch_array($sql))
                                            {
                                                $isiP1 = $row['NS_disesuaikan_K'];
                                                echo '<tr>';
                                                echo '<td>'.$row['nama'].'</td>';
                                                echo '<td>'.number_format($isiP1,"0",",",".").'</td>';
                                                echo '</tr>';
                                                $jmlKw+=$isiP1;
                                            }
                                            echo '<tr >';
                                            echo '<td class="bg-aqua" style="font-weight:bold; width:80%;"> Jumlah Kewajiban</td>';
                                            echo '<td class="bg-aqua" style="font-weight:bold;" >'.number_format($jmlKw,"0",",",".").'</td>';
                                            echo '</tr>';
                                            echo '<tr><td></td><td></td></tr>';
											
                                            ?>
											<tr>
                                                <th colspan="2" style="vertical-align:middle;">Modal</th>
                                            </tr>
                                            <?php
                                            $sql = mysql_query("SELECT * FROM rekening where jenis = 'Modal'");
                                            $jmlMd = 0;
                                            while ($row = mysql_fetch_array($sql))
                                            {
                                                $isiP2 = $row['NS_disesuaikan_K'];
                                                echo '<tr>';
                                                echo '<td>'.$row['nama'].'</td>';
                                                echo '<td>'.number_format($isiP2,"0",",",".").'</td>';
                                                echo '</tr>';
												$jmlMd+=$isiP2;
                                            }
											$sql = mysql_query("SELECT * FROM subtotal where id = 1");
                                            while ($row = mysql_fetch_array($sql))
                                            {
												if ($row['hasil_bersih']>0){ $hasil = "Laba"; }
												else{ $hasil = "Rugi"; }
                                                echo '<tr>';
                                                echo '<td>Laba bersih</td>';
                                                echo '<td>'.number_format($row['hasil_bersih'],"0",",",".").'</td>';
                                                echo '</tr>';
												$jmlMd+=$row['hasil_bersih'];
                                            }
                                            echo '<tr>';
                                            echo '<td class="bg-aqua"  style="font-weight:bold;" > Jumlah Modal</td>';
                                            echo '<td class="bg-aqua" style="font-weight:bold;" >'.number_format($jmlMd,"0",",",".").'</td>';
                                            echo '</tr>';

                                            $jmlP = $jmlKw + $jmlMd;
                                            echo '<tr><td></td><td></td></tr>';
                                            echo '<tr>';
                                            echo '<td class="bg-yellow" style="color:blue; font-weight:bold;" > Jumlah Pasiva </td>';
                                            echo '<td class="bg-yellow" style="color:blue; font-weight:bold;" >'.number_format($jmlP,"0",",",".").'</td>';
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
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <?php
    
    include('footer.php');
    ?>

</body>

</html>
