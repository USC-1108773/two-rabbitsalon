<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
       <!--<br><br>        
       <a href="http://designful.ca/apps/stylish-price-list-wordpress/" class="spl-header logo">
            <img src="<?php //echo SPL_URL . '/assets/images/logo.png'; ?>" class="img-responsive1" alt="Image" style="height:42px">
       	</a>
        <br>-->
        <a href="http://designful.ca/apps/stylish-price-list-wordpress/" class="spl-header">
            <!--<img src="<?php echo SPL_URL . '/assets/images/list-header.png'; ?>" class="img-responsive1" alt="Image">-->
            <img src="<?php echo SPL_URL . '/assets/images/Stylish-Price-List-Logo-418x134.png'; ?>" class="img-responsive1" alt="Image" style="max-height: 70px;">
        </a>
        <?php 
            $opt=get_option('spllk_opt');
            if(empty($opt)){
            ?>
            <span class="spl_plug_ver">Demo</span>
            <?php }
            if(!empty($opt)){
            ?>
            <span class="spl_plug_ver">Premium</span>
            <?php } ?>
    </div>
</div>



<style type="text/css">
    .spl_plug_ver{
        position: relative;
        top: -15px;
        font-weight: 600;
        font-size: 21px;
        color: #314bf8;
        text-transform: uppercase;
    }
    .spl-header{
        display: inline-block;
    }

    .spl-header.logo{
        position: relative;
        top: -20px;
    }

    img.img-responsive1 {
        max-width: 80%;
        height: auto;
    }

    .inner-footer-logo-section h4 {
    float: left;
    margin-right: 16px;
}

.inner-footer-logo-section {
    float: right;
}

.inner-footer-logo-section {
    margin-top: 26px;
}

.inner-footer-logo-section img {
    -webkit-filter: grayscale(100%);
    filter: grayscale(100%);
}

.inner-footer-logo-section img {
    width: 47%;
}

.inner-footer-logo-section {
    width: 200px;
}
</style>