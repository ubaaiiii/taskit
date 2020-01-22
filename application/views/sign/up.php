<!DOCTYPE html>
<html lang="en">

<head>
    <title>Razaki - <?= $judul; ?></title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js');?>"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js');?>"></script>
        <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="<?= base_url('assets\images\razaki.png'); ?>" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('bower_components\bootstrap\css\bootstrap.min.css'); ?>">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets\icon\themify-icons\themify-icons.css'); ?>">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets\icon\icofont\css\icofont.css'); ?>">
    <!-- notification.css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets\pages\notification\growl\jquery.growl.css'); ?>">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets\css\style.css'); ?>">
    <!-- Required Jquery -->
    <script type="text/javascript" src="<?= base_url('bower_components\jquery\js\jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('bower_components\jquery-ui\js\jquery-ui.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('bower_components\popper.js\js\popper.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('bower_components\bootstrap\js\bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets\pages\notification\growl\jquery.growl.js'); ?>"></script>
    <script>
        function hapus(f) {
            var form = document.getElementById(f);
            form.reset()
        }

        function field_register() {
            $('#field-sign').css({
                display: "none"
            });
            $('#field-forgot').css({
                display: "none"
            });
            $('#field-register').removeAttr("style");
            document.title = "Razaki - Registration";
            hapus('form-sign');
        }

        function field_sign() {
            $('#field-register').css({
                display: "none"
            });
            $('#field-forgot').css({
                display: "none"
            });
            $('#field-sign').removeAttr("style");
            document.title = "Razaki - Login";
            hapus('form-register');
            $('#tanggalLahir').type = 'text';
            hapus('form-forgot');
        }

        function field_forgot() {
            $('#field-sign').css({
                display: "none"
            });
            $('#field-register').css({
                display: "none"
            });
            $('#field-forgot').removeAttr("style");
            document.title = "Razaki - Forgot Password";
            hapus('form-sign');
        }
        $(document).ready(function() {
            $('#login-register').on('click', function() {
                field_sign();
            })
            $('#login-forgot').on('click', function() {
                field_sign();
            })
            $('#registration').on('click', function() {
                field_register();
            })
            $('#forgot-password').on('click', function() {
                field_forgot();
            })
        })
    </script>
</head>

<body class="fix-menu">
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
    <button id="warning-error" hidden onclick="Swal.fire({
        type: 'warning',
        title: 'Oops...',
        text: 'Harap Login Terlebih Dahulu!'
        }).then(function(){
        $('#username').focus();
        });
        "></button>
    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="text-center">
                        <img src="<?= base_url('assets\images\razaki.png'); ?>" alt="logo.png">
                    </div>
                    <div class="auth-box card">
                        <div class="card-block">
                            <fieldset id="field-sign">
                                <form id="form-sign" class="md-float-material form-material">
                                    <div class="row m-b-20">
                                        <div class="col-md-12">
                                            <h3 class="text-center">Complete Your Registration</h3>
                                        </div>
                                    </div>
                                    <div class="row m-t-25 text-left">
                                        <div class="col-12">
                                            <div class="form-group form-primary">
                                                <input type="text" name="nama_regis" class="form-control" required="" placeholder="Nama Lengkap">
                                                <span class="form-bar"></span>
                                            </div>
                                            <div class="form-group form-primary">
                                                <input type="email" name="email_regis" class="form-control" required="" placeholder="Email">
                                                <span class="form-bar"></span>
                                            </div>
                                            <div class="form-group form-primary">
                                                <input placeholder="Tanggal Lahir" required id="tanggalLahir" name="tanggalLahir" class="form-control" onfocus="(this.type='date')" type="text">
                                            </div>
                                            <div class="form-group form-primary">
                                                <select required id="divisi" name="divisi" class="form-control col-sm-12">
                                                    <option disabled selected>Pilih Divisi ..</option>
                                                    <?php foreach ($all_divisi as $ad) : ?>
                                                        <option value="<?= $ad['id']; ?>"><?= $ad['divisi']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <button type="submit" id="signText" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20"></button>
                                        </div>
                                    </div>
                                </form>
                            </fieldset>
                            <fieldset id="field-forgot" style="display: none;">
                                <form id="form-forgot" class="md-float-material form-material">
                                    <div class="row m-b-20">
                                        <div class="col-md-12">
                                            <h3 class="text-center">Forgot Password</h3>
                                        </div>
                                    </div>
                                    <div class="form-group form-primary">
                                        <input type="email" name="email" class="form-control" required="" placeholder="Enter Your Email">
                                        <span class="form-bar"></span>
                                    </div>
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Send Recovery Email</button>
                                        </div>
                                    </div>
                                    <div class="row text-left">
                                        <div class="col-12">
                                            <div class="forgot-phone text-right f-right">
                                                <a style="cursor: pointer;" id="login-forgot" class="text-right f-w-600"> Login</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </fieldset>
                            <fieldset id="field-register" style="display: none;">
                                <form id="form-register" class="md-float-material form-material" autocomplete="off">
                                    <div class="row m-b-20">
                                        <div class="col-md-12">
                                            <h3 class="text-center">Registration</h3>
                                        </div>
                                    </div>
                                    <div class="form-group form-primary">
                                        <input type="text" name="nama_regis" class="form-control" required="" placeholder="Nama Lengkap">
                                        <span class="form-bar"></span>
                                    </div>
                                    <div class="form-group form-primary">
                                        <input type="email" name="email_regis" class="form-control" required="" placeholder="Email">
                                        <span class="form-bar"></span>
                                    </div>
                                    <div class="form-group form-primary">
                                        <input placeholder="Tanggal Lahir" required id="tanggalLahir" name="tanggalLahir" class="form-control" onfocus="(this.type='date')" type="text">
                                    </div>
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Send Email Validation</button>
                                        </div>
                                    </div>
                                    <div class="row text-left">
                                        <div class="col-12">
                                            <div class="forgot-phone text-right f-right">
                                                <a style="cursor: pointer;" id="login-register" class="text-right f-w-600"> Login</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </fieldset>
                        </div>
                    </div>
                    </form>
                    <!-- end of form -->
                </div>

                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
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
    <!-- i18next.min.js -->
    <script type="text/javascript" src="<?= base_url('bower_components\i18next\js\i18next.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('bower_components\jquery-i18next\js\jquery-i18next.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets\js\common-pages.js'); ?>"></script>
    <!-- sweet alert js -->
    <script type="text/javascript" src="<?= base_url('bower_components\sweetalert\js\sweetalert.min.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script>

        $(document).ready(function() {
            $('#signText').html("Save Changes");
            $('#username').focus();
            $('#form-sign').submit(function(e) {
                e.preventDefault();
                $.growl({
                    title: "Please wait.",
                    message: "Checking information...",
                    location: "tc",
                    size: "large"
                });
                $('#signText').html("Checking...");
                $('#signText').attr('disabled', true);
                console.log($(this).serialize());
                var login = function() {
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('auth/login'); ?>",
                        dataType: "json",
                        data: $('#form-sign').serialize(),
                        success: function(response) {
                            $('signText').html("Sign In");
                            if (response.error == true) {
                                $.growl.error({
                                    title: "Login invalid.",
                                    message: "We cannot find your account!",
                                    location: "tc",
                                    size: "large"
                                });;
                                $('#signText').html("Please Try Again");
                                $('#signText').removeAttr('disabled');
                                $('#username').focus();
                            } else {
                                $('#signText').html("Success");
                                $.growl.notice({
                                    title: "Success!",
                                    message: "User found! redirecting...",
                                    location: "tc",
                                    size: "large"
                                });
                                setTimeout(function() {
                                    location.reload("<?= base_url('dashboard'); ?>");
                                }, 1500);
                            }
                        }
                    });
                };
                setTimeout(login, 1500);
            })
        })
    </script>
</body>

</html>