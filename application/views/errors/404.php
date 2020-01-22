<!DOCTYPE html>
<html lang="en-us" class="no-js">

<head>
    <meta charset="utf-8">
    <title>Razaki - Error 404</title>
    <meta name="description" content="Flat able 404 Error page design">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Codedthemes">
    <!-- ================= Favicons ================== -->
    <link rel="shortcut icon" href="<?= base_url('assets\errorpages\images\favicon.ico'); ?>">
    <!-- ============== Resources style ============== -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets\errorpages\css\style.css');?>">
</head>

<body class="bubble">
    <canvas id="canvasbg"></canvas>
    <canvas id="canvas"></canvas>
    <!-- Your logo on the top left -->
    <a href="<?= base_url() ;?>" class="logo-link" title="back home">
        <img src="<?= base_url('assets\images\razaki.png'); ?>" class="logo" alt="Company's logo">
    </a>
    <div class="content">
        <div class="content-box">
            <div class="big-content">
                <!-- Main squares for the content logo in the background -->
                <div class="list-square">
                    <span class="square"></span>
                    <span class="square"></span>
                    <span class="square"></span>
                </div>
                <!-- Main lines for the content logo in the background -->
                <div class="list-line">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </div>
                <!-- The animated searching tool -->
                <i class="fa fa-search color" aria-hidden="true"></i>
                <!-- div clearing the float -->
                <div class="clear"></div>
            </div>
            <!-- Your text -->
            <h1>Oops! Error 404 not found.</h1>
            <p>The page you were looking for doesn't exist.
                <br> We think the page may have moved.</p>
        </div>
    </div>
    <footer class="light">
        <ul>
            <li><a href="#">Razaki | Task-IT &copy; <?=Date('Y');?></a></li>
        </ul>
    </footer>
    <script src="<?= base_url('assets\errorpages\js\jquery.min.js');?>"></script>
    <script src="<?= base_url('assets\errorpages\js\bootstrap.min.js');?>"></script>
    <!-- Bubble plugin -->
    <script src="<?= base_url('assets\errorpages\js\bubble.js');?>"></script>
</body>

</html>
