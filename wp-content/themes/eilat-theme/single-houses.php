<?php
    //GET POST'S TAXONOMY
    $cat = get_the_terms(get_the_ID(), 'houses_cat')[0];
    $services = get_field("services",get_the_ID());
?>

<?php get_header(); ?>

<div class="container-house content-after-sticky">
<!-- background-image:linear-gradient(#ffffff6b, #ffffff05),url('<?php //echo get_template_directory_uri() . '/img/temp/bg-house-1.jpg'; ?>'); -->
    <div class="hero-single" style="background-image:url('<?php echo get_field("bg_desk",get_the_ID())["url"]; ?>');">
        <div class="title-hero">
            <h1> 
                <?php echo get_the_title(); ?> 
            </h1>
            <h2>
                - <?php echo $cat->name; ?> -
            </h2>
        </div>

    </div>

    <div class="section-info">
        <div class="info-div">
            <h3 class="amount">
            👤
                <?php echo _e("כמות אורחים: ") . get_field("amount", get_the_ID())?> 
            </h3>
            <div class="text">
                <?php echo get_field("desc", get_the_ID());?>
            </div>

            <div class="services">
                <?php foreach($services as $service): ?>
                <div class="service">
                    <div class="icon">
                        <img src="<?php echo get_field("icon",$service->ID)["url"]; ?>" alt="<?php echo get_field("icon",$service->ID)["alt"]; ?>"/>
                    </div>
                    <div class="title">
                        <?php echo $service->post_title; ?>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>

            <?php if(get_field("house_btn", "option")): ?>
            <a class="contact-a" href="#form">
                <?php echo get_field("house_btn", "option"); ?>
            </a>
            <?php endif; ?>
        </div>

        <div class="location-div">
            <div class="map">
                <div class="mapouter"><div class="gmap_canvas"><iframe width="400" height="260" id="gmap_canvas" src="https://maps.google.com/maps?q=%D7%90%D7%99%D7%9C%D7%AA&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://fmovies2.org">fmocies</a><br><style>.mapouter{position:relative;text-align:right;height:260px;width:400px;}</style><a href="https://www.embedgooglemap.net">how to embed a google map in html</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:260px;width:400px;}</style></div></div>
            </div>
            <!-- <a class="contact-a" href="#contact">
                מעניין אתכם? צרו קשר
            </a> -->
        </div>
    </div>


    <?php $house_gallery = get_field("house_gallery"); ?>
    <?php if($house_gallery): ?>
    <div class="bg-gallery">
        <button id="close_gallery" class="close-gallery-btn">x</button>
        <div class="section-gallery">
            <h2> <?php echo get_field("house_gallery_title", "option"); ?> </h2>
            <div class="swiper-container gallery-house">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?php foreach($house_gallery as $key => $img): ?>
                    <div class="swiper-slide">
                        <img src="<?php echo $img["url"];?>" alt="<?php echo isset($img["alt"]) ? $img["alt"] : ""; ?>" title="לחצו למעבר למסך מלא"/>
                    </div>
                    <?php endforeach; ?>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>




<?php get_footer(); ?>