<style type="text/css">
    
            .page-content {
               background-image: url("<?php echo base_url()?>back.jpeg");
                background-position: center center;
                 background-repeat: no-repeat;
                 background-color: #e4e9ed;
             /*      background-size: cover;
                    height: 100%; */
            }
</style>
<!-- <h1 style="background:#fff" class="page-title"> Admin Dashboard

</h1> -->

<div class="row">

<?php
    if($_SESSION['tax_role']==1){
?>

	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

	    <a class="dashboard-stat dashboard-stat-v2 blue" href="<?php echo base_url().'transaksi.html' ?>">

	        <div class="visual">

	            <i class="fa fa-money"></i>

	        </div>

	        <div class="details">

	            <div class="number">

	                <span data-counter="counterup" data-value="<?php echo $jtr?>"><?php echo $jtr?></span>

	            </div>

	            <div class="desc"> Transaksi </div>

	        </div>

	    </a>

	</div>

 

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

                                <a class="dashboard-stat dashboard-stat-v2 green" href="<?php echo base_url().'refclient.html'?>">

                                    <div class="visual">

                                        <i class="fa fa-users"></i>

                                    </div>

                                    <div class="details">

                                        <div class="number">

                                            <span data-counter="counterup" data-value="<?php echo $jtc?>"><?php echo $jtc ?></span>

                                        </div>

                                        <div class="desc"> Clients / WP </div>

                                    </div>

                                </a>

                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

                                <a class="dashboard-stat dashboard-stat-v2 red" href="<?php echo base_url().'transaksi/gagal.html'?>">

                                    <div class="visual">

                                        <i class="fa fa-close"></i>

                                    </div>

                                    <div class="details">

                                        <div class="number">

                                            <span data-counter="counterup" data-value="<?php echo $gagal?>"><?php echo $gagal ?></span>

                                        </div>

                                        <div class="desc">Data WP tidak termonitor</div>

                                    </div>

                                </a>

                            </div>

                               
<?php 
    }
?>       

</div>