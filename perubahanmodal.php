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
                        <i ></i>Perubahan Modal
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dasboard</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Perubahan Modal</li>
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
