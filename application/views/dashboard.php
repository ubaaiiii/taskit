    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>PFI MEGA LIFE - <?= $judul; ?></title>
        <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Favicon icon -->
        <link rel="icon" href="<?= base_url('assets\images\favicon.ico'); ?>" type="image/x-icon">
        <!-- Google font-->
        <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet"> -->
        <!-- Required Fremwork -->
        <link rel="stylesheet" type="text/css" href="<?= base_url('bower_components\bootstrap\css\bootstrap.min.css'); ?>">
        <!-- sweet alert framework -->
        <link rel="stylesheet" type="text/css" href="<?= base_url('bower_components\sweetalert\css\sweetalert.css');?>">
        <!-- Rangeslider -->
        <link rel="stylesheet" type="text/css" href="<?= base_url('bower_components\rangeslider.js\dist\rangeslider.css');?>">
        <!-- Select 2 css -->
        <link rel="stylesheet" type="text/css" href="<?= base_url('bower_components\select2\css\select2.min.css'); ?>">
        <!-- Date-time picker css -->
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets\pages\advance-elements\css\bootstrap-datetimepicker.css'); ?>">
        <!-- Data Table Css -->
        <link rel="stylesheet" type="text/css" href="<?= base_url('bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets\pages\data-table\css\buttons.dataTables.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url('bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets\pages\data-table\extensions\buttons\css\buttons.dataTables.min.css'); ?>">
        <!-- feather Awesome -->
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets\icon\feather\css\feather.css'); ?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
        <!-- Style.css -->
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets\css\style.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets\css\jquery.mCustomScrollbar.css'); ?>">
        <!-- Required Jquery -->
        <script type="text/javascript" src="<?= base_url('bower_components\jquery\js\jquery.min.js'); ?>"></script>
        <script type="text/javascript" src="<?= base_url('bower_components\jquery-ui\js\jquery-ui.min.js'); ?>"></script>
        <script type="text/javascript" src="<?= base_url('bower_components\popper.js\js\popper.min.js'); ?>"></script>
        <script type="text/javascript" src="<?= base_url('bower_components\bootstrap\js\bootstrap.min.js'); ?>"></script>
        <!-- data-table js -->
        <script src="<?= base_url('bower_components\datatables.net\js\jquery.dataTables.min.js'); ?>"></script>
        <script src="<?= base_url('bower_components\datatables.net-buttons\js\dataTables.buttons.min.js'); ?>"></script>
        <script src="<?= base_url('assets\pages\data-table\js\jszip.min.js'); ?>"></script>
        <script src="<?= base_url('assets\pages\data-table\js\pdfmake.min.js'); ?>"></script>
        <script src="<?= base_url('assets\pages\data-table\js\vfs_fonts.js'); ?>"></script>
        <script src="<?= base_url('assets\pages\data-table\extensions\buttons\js\dataTables.buttons.min.js'); ?>"></script>
        <script src="<?= base_url('assets\pages\data-table\extensions\buttons\js\buttons.flash.min.js'); ?>"></script>
        <script src="<?= base_url('assets\pages\data-table\extensions\buttons\js\jszip.min.js'); ?>"></script>
        <script src="<?= base_url('assets\pages\data-table\extensions\buttons\js\vfs_fonts.js'); ?>"></script>
        <script src="<?= base_url('assets\pages\data-table\extensions\buttons\js\buttons.colVis.min.js'); ?>"></script>
        <script src="<?= base_url('bower_components\datatables.net-buttons\js\buttons.print.min.js'); ?>"></script>
        <script src="<?= base_url('bower_components\datatables.net-buttons\js\buttons.html5.min.js'); ?>"></script>
        <script src="<?= base_url('bower_components\datatables.net-bs4\js\dataTables.bootstrap4.min.js'); ?>"></script>
        <script src="<?= base_url('bower_components\datatables.net-responsive\js\dataTables.responsive.min.js'); ?>"></script>
        <script src="<?= base_url('bower_components\datatables.net-responsive-bs4\js\responsive.bootstrap4.min.js'); ?>"></script>
        <script type="text/javascript" src="<?= base_url('bower_components\rangeslider.js\dist\rangeslider.min.js');?>"></script>
        <style type="text/css">
            .select2-dropdown {
                z-index:99999;
            }
        </style>
    </head>
    <!-- Menu sidebar static layout -->

    <body>
        <!-- Pre-loader start -->
        <div class="theme-loader">
            <div class="ball-scale">
                <div class='contain'>
                    <div class="ring">
                        <div class="frame"></div>
                    </div>
                    <div class="ring">
                        <div class="frame"></div>
                    </div>
                    <div class="ring">
                        <div class="frame"></div>
                    </div>
                    <div class="ring">
                        <div class="frame"></div>
                    </div>
                    <div class="ring">
                        <div class="frame"></div>
                    </div>
                    <div class="ring">
                        <div class="frame"></div>
                    </div>
                    <div class="ring">
                        <div class="frame"></div>
                    </div>
                    <div class="ring">
                        <div class="frame"></div>
                    </div>
                    <div class="ring">
                        <div class="frame"></div>
                    </div>
                    <div class="ring">
                        <div class="frame"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pre-loader end -->
        <div id="pcoded" class="pcoded">
            <div class="pcoded-overlay-box"></div>
            <div class="pcoded-container navbar-wrapper">

                <nav class="navbar header-navbar pcoded-header" >
                    <div class="navbar-wrapper">

                        <div class="navbar-logo" >
                            <a class="mobile-menu" id="mobile-collapse" style="cursor: pointer;">
                                <i class="feather icon-menu"></i>
                            </a>
                            <a href="<?= base_url(); ?>">
                                <img class="img-fluid float-left" width="75%" src="<?= base_url('assets\images\razaki.png'); ?>" alt="Theme-Logo">
                            </a>
                            <a class="mobile-options">
                                <i class="feather icon-more-horizontal"></i>
                            </a>
                        </div>

                        <div class="navbar-container container-fluid">
                            <ul class="nav-left">
                                <li class="header-search">
                                    <div class="main-search morphsearch-search">
                                        <div class="input-group">
                                            <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                                            <input type="text" class="form-control">
                                            <span class="input-group-addon search-btn"><i class="feather icon-search"></i></span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a style="cursor: pointer;" onclick="javascript:toggleFullScreen()">
                                        <i class="feather icon-maximize full-screen"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav-right">
                                <li class="user-profile header-notification">
                                    <div class="dropdown-primary dropdown">
                                        <div class="dropdown-toggle" data-toggle="dropdown">
                                            <span><?= $nama; ?></span>
                                            <i class="feather icon-chevron-down"></i>
                                        </div>
                                        <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                            <li>
                                                <a style="cursor: pointer;" onclick="
                                                    $('#trigger-modal').click();
                                                    $('#load-modal-here').load('modal/karyawan/e/'+<?=$nik;?>);
                                                ">
                                                    <i class="feather icon-user"></i> Profile
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('auth/logout'); ?>">
                                                    <i class="feather icon-log-out"></i> Logout
                                                </a>
                                            </li>
                                        </ul>

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="pcoded-main-container">
                    <div class="pcoded-wrapper">
                        <nav class="pcoded-navbar">
                            <div class="pcoded-inner-navbar main-menu">
                                <div class="pcoded-navigatio-lavel">Navigation</div>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="active pcoded-trigger">
                                        <a href="<?= base_url(); ?>">
                                            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                            <span class="pcoded-mtext">Dashboard</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="pcoded-navigatio-lavel">Request & Task</div>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="pcoded-hasmenu">
                                        <a style="cursor: pointer;">
                                            <span class="pcoded-micon"><i class="feather icon-feather"></i></span>
                                            <span class="pcoded-mtext">Request</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                <a style="cursor: pointer;" onclick='
                                                    $("#trigger-modal").click();
                                                    $("#load-modal-here").load("modal/request/t/");
                                                '>
                                                    <span class="pcoded-mtext">Add New Request</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a style="cursor: pointer;" onclick='
                                                    var pathname = window.location.pathname;
                                                    if(pathname!=="/taskit/welcome"){
                                                        window.location.href = "<?=base_url();?>";
                                                        setTimeout(function(){ $("#table-request").DataTable().columns(5).search("").draw(); },1500);
                                                        setTimeout(function(){ $("#table-request").DataTable().columns(4).search("").draw(); },1500);
                                                        setTimeout(function(){ $("#table-request").DataTable().columns(3).search("").draw(); },1500);
                                                    } else {
                                                        $("#table-request").DataTable().columns(2).search("").draw();
                                                        $("#table-request").DataTable().columns(3).search("").draw();
                                                        $("#table-request").DataTable().columns(4).search("").draw();
                                                    }
                                                '>
                                                    <span class="pcoded-mtext">All Request</span>
                                                    <span class="pcoded-badge label label-inverse"><b><?= $request['all']; ?></b></span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a style="cursor: pointer;" onclick='
                                                var pathname = window.location.pathname;
                                                    if(pathname!=="/taskit/welcome"){
                                                        window.location.href = "<?=base_url();?>";
                                                        setTimeout(function(){ $("#table-request").DataTable().columns(5).search("<?=$nik;?>").draw(); },1500);
                                                    } else {
                                                        $("#table-request").DataTable().columns(4).search("<?=$nik;?>").draw();
                                                    }
                                                '>
                                                    <span class="pcoded-mtext">My Request</span>
                                                    <span class="pcoded-badge label label-inverse"><b><?= $request['your']; ?></b></span>
                                                </a>
                                            </li>

                                        </ul>
                                    </li>
                                    <li class="pcoded-hasmenu">
                                        <a style="cursor: pointer;">
                                            <span class="pcoded-micon"><i class="feather icon-clipboard"></i></span>
                                            <span class="pcoded-mtext">Task</span>
                                            <span class="pcoded-badge label label-warning"><b><?= ($jabatan=='1')?(($task['divisi']+$task['your']>99)?('99+'):($task['divisi']+$task['your'])):($task['your']); ?></b></span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                <a href="<?= base_url('my_task'); ?>">
                                                    <span class="pcoded-mtext">My Task</span>
                                                    <?php if($task['your']!==0){ ?>
                                                    <span class="pcoded-badge label label-inverse"><b><?= $task['your']; ?></b></span>
                                                    <?php } ?>
                                                </a>
                                            </li>
                                            <?php
                                                if($jabatan=='1'){
                                            ?>
                                            <li class="">
                                                <a href="<?= base_url('manager_task'); ?>">
                                                    <span class="pcoded-mtext">Task Manager</span>
                                                    <span class="pcoded-badge label label-inverse"><b><?= $task['divisi']; ?></b></span>
                                                </a>
                                            </li>
                                            <?php
                                                }
                                            ?>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="pcoded-navigatio-lavel">Master</div>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="pcoded-hasmenu">
                                        <a style="cursor: pointer;">
                                            <span class="pcoded-micon"><i class="feather icon-box"></i></span>
                                            <span class="pcoded-mtext">Tabel</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                <a href="<?= base_url('karyawan'); ?>">
                                                    <span class="pcoded-mtext">Data Karyawan</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="<?= base_url('divisi'); ?>">
                                                    <span class="pcoded-mtext">Data Divisi</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="<?= base_url('kepentingan'); ?>">
                                                    <span class="pcoded-mtext">Data Kepentingan</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <button hidden id="trigger-modal" data-toggle="modal" data-target="#large-Modal"></button>
                        <div class="modal fade" id="large-Modal" role="dialog">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content" id="load-modal-here">
                                    <div>
                                        <card>kosong</card>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pcoded-content">
                            <div class="pcoded-inner-content">
                                <div class="main-body">
                                    <div class="page-wrapper">
                                        <!-- Page-Body Start -->
                                        <div class="page-body">
                                            <div class="row">
                                                <?php
                                                if (!empty($page)) {
                                                    $this->load->view($page);
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <!-- Page-Body End -->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>


        <!-- Warning Section Starts -->
        <!-- Older IE warning message -->
        <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="../files/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="../files/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="../files/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="../files/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="../files/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
        <!-- Warning Section Ends -->
        <!-- jquery slimscroll js -->
        <script type="text/javascript" src="<?= base_url('bower_components\jquery-slimscroll\js\jquery.slimscroll.js'); ?>"></script>
        <!-- modernizr js -->
        <script type="text/javascript" src="<?= base_url('bower_components\modernizr\js\modernizr.js'); ?>"></script>
        <script type="text/javascript" src="<?= base_url('bower_components\modernizr\js\css-scrollbars.js'); ?>"></script>
        <!-- Max-length js -->
        <script type="text/javascript" src="<?= base_url('bower_components\bootstrap-maxlength\js\bootstrap-maxlength.js'); ?>"></script>
        <!-- sweet alert js -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <!-- Select 2 js -->
        <script type="text/javascript" src="<?= base_url('bower_components\select2\js\select2.full.min.js');?>"></script>
        <!-- Custom js -->
        <!-- <script src="..\files\assets\pages\data-table\extensions\buttons\js\extension-btns-custom.js"></script> -->
        <script src="<?= base_url('assets\js\pcoded.min.js'); ?>"></script>
        <script src="<?= base_url('assets\js\vartical-layout.min.js'); ?>"></script>
        <script src="<?= base_url('assets\js\jquery.mCustomScrollbar.concat.min.js'); ?>"></script>
        <!-- <script type="text/javascript" src="<?= base_url('assets\pages\dashboard\crm-dashboard.min.js'); ?>"></script> -->
        <script type="text/javascript" src="<?= base_url('assets\js\script.js'); ?>"></script>

        <script>
            $(document).ready(function() {
                $('#large-Modal').on('hidden.bs.modal', function () {
                    $('#load-modal-here').html("<div><card>kosong</card></div>");
                })
            })
        </script>

    </body>

    </html>
