<?php
    use App\Models\Crud;
    $this->Crud = new Crud();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="<?=app_name;?>" />

    <link rel="shortcut icon" href="<?php echo site_url(); ?>assets/images/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700%7CPoppins:300,400,500,600,700%7CPT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/bootstrap.css?v=4" type="text/css" />
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/style.css?v=2" type="text/css" />
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/swiper.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/dark.css?v=1" type="text/css" />
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/components/datepicker.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/magnific-popup.css" type="text/css" />
    <link href="<?php echo site_url(); ?>assets/backend/vendors/select2/select2.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/custom.css?v=<?php echo time(); ?>" type="text/css" />

    <title><?php echo $this->renderSection('title'); ?></title>
</head>

<body class="stretched">
    <div id="wrapper" class="clearfix">
        <div class="text-center mt-5">
            <img alt="" src="<?=site_url('assets/images/logo-dark.png');?>" />
            <h2>
                <?=app_name;?>
                <div style="font-size:14px" class="text-muted"><?=app_meta_desc;?></div>
            </h2>
        </div>

        <div style="min-height:400px;"><?php echo $this->renderSection('content'); ?></div>

        <footer class="mt-2 mb-5">
            <div class="text-muted text-center" style="font-size:12px;">
                <div class="mb-3">
                    <a href="https://drive.google.com/file/d/1wY4nalbzxRXGBe--mI42GQAmKg_go4B2/view?usp=share_link"><img alt="" src="<?=site_url('assets/images/android.jpg');?>" width="250px" /></a>
                </div>
                &copy; <?=date('Y');?> <?=app_name;?>. All Rights Reserved.
            </div>
        </footer>
    </div>

    <script src="<?php echo site_url(); ?>assets/js/jquery.js"></script>
    <script src="<?php echo site_url(); ?>assets/js/plugins.min.js"></script> 
    <script src="<?php echo site_url(); ?>assets/js/components/datepicker.js"></script>
    <script src="<?php echo site_url(); ?>assets/js/functions.js"></script>

    <?php echo $this->renderSection('scripts'); ?>
</body>
</html>