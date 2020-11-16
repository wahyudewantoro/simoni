<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="utf-8" />

        <title>SIMONI Bapenda Kab. Malang</title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta content="width=device-width, initial-scale=1" name="viewport" />

        <meta content="Preview page of Metronic Admin Theme #1 for fixed footer option" name="description" />

        <meta content="" name="author" />

        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">

        <link href="<?= base_url()?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <link href="<?= base_url()?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />

        <link href="<?= base_url()?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <link href="<?= base_url()?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />



         <link href="<?= base_url() ?>assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />

        <link href="<?= base_url() ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />

        <link href="<?= base_url() ?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />



        <link href="<?= base_url()?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />

        <link href="<?= base_url()?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />

        <link href="<?= base_url()?>assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />

        <link href="<?= base_url()?>assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />

        <link href="<?= base_url()?>assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />

          <link href="<?= base_url()?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

        <link href="<?= base_url()?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />

       

        <style type="text/css">

            #notifications {

                cursor: pointer;

                position: fixed;

                right: 0px;

                z-index: 9999;

                bottom: 0px;

                margin-bottom: 22px;

                margin-right: 15px;

                min-width: 300px; 

                max-width: 800px;  

            }

       /*     .page-content {
               background-image: url("back.jpeg");
                background-position: center center;
                 background-repeat: no-repeat;
                   background-size: cover;
                    height: 100%; 
            }*/

        </style>

</head>

    <body class="page-header-fixed page-footer-fixed page-sidebar-closed-hide-logo page-content-white">

        <div class="page-wrapper">

            <div class="page-header navbar navbar-fixed-top">

                <div class="page-header-inner ">

                    <!-- BEGIN LOGO -->

                    <div class="page-logo">

                        <a href="<?= base_url('welcome') ?>">

                            <!-- <img src="<?= base_url() ?>assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" /> </a> -->

                            <img src="<?= base_url() ?>assets/logo.png" alt="logo" class="logo-default" /> </a> 

                        <div class="menu-toggler sidebar-toggler">

                            <span></span>

                        </div>

                    </div>

                    <!-- END LOGO -->

                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->

                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">

                        <span></span>

                    </a>

                    <!-- END RESPONSIVE MENU TOGGLER -->



                    <!-- BEGIN TOP NAVIGATION MENU -->

                    <div class="top-menu">

                        <ul class="nav navbar-nav pull-right">

                            <li class="dropdown dropdown-user">

                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">

                                    <img alt="" class="img-circle" src="<?= base_url() ?>assets/layouts/layout/img/avatar3_small.jpg" />

                                    <span class="username username-hide-on-mobile"> <?= $this->session->userdata('tax_nama') ?> </span>

                                    <i class="fa fa-angle-down"></i>

                                </a>

                                <ul class="dropdown-menu dropdown-menu-default">

                                     <li>

                                        <a href="<?php echo base_url().'auth/logout'?>">

                                            <i class="icon-key"></i> Log Out </a>

                                    </li>

                                </ul>

                            </li>

                            <!-- END USER LOGIN DROPDOWN -->

                            <!-- END QUICK SIDEBAR TOGGLER -->

                        </ul>

                    </div>

                    <!-- END TOP NAVIGATION MENU -->

                </div>

                <!-- END HEADER INNER -->

            </div>

            <!-- END HEADER -->

            <!-- BEGIN HEADER & CONTENT DIVIDER -->

            <div class="clearfix"> </div>

            <!-- END HEADER & CONTENT DIVIDER -->

            <!-- BEGIN CONTAINER -->

            <div class="page-container">

                <!-- BEGIN SIDEBAR -->

                <div class="page-sidebar-wrapper">

                    <!-- BEGIN SIDEBAR -->

                    <div class="page-sidebar navbar-collapse collapse">

                        <!-- BEGIN SIDEBAR MENU -->

                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">

                            <?php 

                              $kode_group=$this->session->userdata('tax_role');

                              $qmenu0  =$this->db->query("SELECT a.*

                                                          FROM ms_menu a

                                                          JOIN ms_privilege b ON a.id_inc=b.ms_menu_id

                                                          WHERE ms_role_id='$kode_group' 

                                                          AND STATUS='1'  

                                                          AND parent='0' 

                                                          ORDER BY sort ASC")->result_array();

                              foreach ($qmenu0 as $row0) {

                                $parent  =$row0['id_inc'];

                                $qmenu1  =$this->db->query("SELECT a.*

                                                          FROM ms_menu a

                                                          JOIN ms_privilege b ON a.id_inc=b.ms_menu_id

                                                          WHERE ms_role_id='$kode_group' 

                                                          AND STATUS='1'  

                                                          AND parent='$parent' 

                                                          ORDER BY sort ASC");

                                $cekmenu =$qmenu1->num_rows();

                                $dmenu1  =$qmenu1->result_array();

                                  if($cekmenu>0){

                                    echo "<li class='nav-item '>

                                      <a href='javascript:;' class='nav-link nav-toggle'> <i class='".$row0['icon']."'></i>  <span class='title'>".ucwords($row0['nama_menu'])."</span> <span class='arrow'></span></a>";

                                        echo "<ul class='sub-menu'>";

                                          foreach($dmenu1 as $row1){

                                              echo "<li class='nav-item '>".anchor($row1['link_menu'],"<i class='".$row1['icon']."'></i> <span class='title'>".ucwords($row1['nama_menu']."</span>"),'class="nav-link "')."</li>";

                                          }

                                      echo "</ul>

                                      </li>";

                                      }else{

                                       echo "<li class='nav-item '>".anchor($row0['link_menu'],"<i class='".$row0['icon']."'></i> <span class='title'>".ucwords($row0['nama_menu'].'</span>'),'class="nav-link "')."</li>";

                                    }

                                  }

                                ?>

                        </ul>

                        <!-- END SIDEBAR MENU -->

                        <!-- END SIDEBAR MENU -->

                    </div>

                    <!-- END SIDEBAR -->

                </div>

                <!-- END SIDEBAR -->

                <!-- BEGIN CONTENT -->

                <div class="page-content-wrapper">

                    <div class="page-content">

                         <?=  $contents; ?>

                         <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 

                    </div>

                    <!-- END CONTENT BODY -->

                </div>

                <!-- END CONTENT -->

            </div>

            <!-- END CONTAINER -->

            <!-- BEGIN FOOTER -->

            <div class="page-footer">

                <div class="page-footer-inner"> 2018 &copy; DNH Solution

                </div>

                <div class="scroll-to-top">

                    <i class="icon-arrow-up"></i>

                </div>

            </div>

            <!-- END FOOTER -->

        </div>

     

        <!-- BEGIN CORE PLUGINS -->

        <script src="<?= base_url() ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>

        <script src="<?= base_url() ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

        <script src="<?= base_url() ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>

        <script src="<?= base_url() ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>

        <script src="<?= base_url() ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>

        <script src="<?= base_url() ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>

        <!-- END CORE PLUGINS -->

        <!-- BEGIN THEME GLOBAL SCRIPTS -->

        <script src="<?= base_url() ?>assets/global/scripts/app.min.js" type="text/javascript"></script>

        <script src="<?= base_url() ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>



         <script src="<?= base_url()?>assets/global/scripts/datatable.js" type="text/javascript"></script>

        <script src="<?= base_url()?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>

        <script src="<?= base_url()?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>

        <script src="<?= base_url()?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

        <script src="<?= base_url()?>assets/pages/scripts/table-datatables-buttons.js" type="text/javascript"></script>

        <!-- END THEME GLOBAL SCRIPTS -->

        <!-- BEGIN THEME LAYOUT SCRIPTS -->



        <script src="<?= base_url() ?>assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>

        <script src="<?= base_url() ?>assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>

        <script src="<?= base_url() ?>assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>

        <script src="<?= base_url() ?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>

        <script src="<?= base_url() ?>assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>

        <!-- END THEME LAYOUT SCRIPTS -->

        <script>   

            $('#notifications').slideDown('slow').delay(3000).slideUp('slow');

            $(function() {

              $('.page-sidebar-menu a[href~="' + location.href + '"]').parents('li').addClass('active open');

            });





        </script>

    </body>



</html>
