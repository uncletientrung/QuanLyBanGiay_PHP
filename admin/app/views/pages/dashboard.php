<!-- Page JS Plugins CSS -->
<?php $dm->get_css('js/plugins/slick-carousel/slick.css'); ?>
<?php $dm->get_css('js/plugins/slick-carousel/slick-theme.css'); ?>

<div class="content">
    <div class="js-slider slick-dotted-inner slick-dotted-white" data-dots="true" data-autoplay="true"
        data-autoplay-speed="3000">
        <div>
            <img class="img-fluid" src="<?php echo $dm->assets_folder; ?>/images/photo1.jpg" alt="Photo 1">
        </div>
        <div>
            <img class="img-fluid" src="<?php echo $dm->assets_folder; ?>/images/photo2.jpg" alt="Photo 2">
        </div>
    </div>
</div>