<?php

    $cat = get_queried_object();
    // print_r($cat);

    $houses_args = array(
		'post_type' => 'houses',
		'post_status'      => 'publish',
		'posts_per_page'    => -1,
        'tax_query' => array(
            		array(
            			'taxonomy' => 'houses_cat',
            			'field' => 'term_id',
            			'terms' => $cat->term_id,
            		)
        )
	);

    $houses = get_posts($houses_args);

?>


<?php get_header(); ?>

<!------ HERO - TAXONOMY ------->
<div class="hero-tax content-after-sticky">

    <!--- CONTENT --->
    <div class="content-div">
        <h1> <?php echo $cat->name; ?> </h1>
        <div class="desc">
            <?php echo $cat->description; ?>
        </div>
    </div>

    <?php
        $banner_mob = get_field("banner_mob","category_" . $cat->term_id);
        $banner_mob_url = isset($banner_mob["url"]) ? $banner_mob["url"] : "";
        $banner_desk = get_field("banner_desk","category_" . $cat->term_id);
        $banner_desk_url = isset($banner_desk["url"]) ? $banner_desk["url"] : "";
        $banner_desk_alt = isset($banner_desk["alt"]) ? $banner_desk["alt"] : "";
        if(!$banner_mob_url) {
            $banner_mob_url = $banner_desk_url;
        }
    ?>

    <?php if($banner_desk_url): ?>
    <!--- IMAGE --->
    <div class="img-bg">
        <picture>
            <source media="(max-width:1024px)" srcset="<?php echo $banner_mob_url; ?>; ?>">
            <img src="<?php echo $banner_desk_url; ?>" alt="<?php echo $banner_desk_alt; ?>">
        </picture>
    </div>
    <?php endif; ?>
</div>

<!------ LIST OF APARTMENTS - POSTS ------->
<div class="list-items">

    <?php foreach($houses as $house):
        
        $pre_img = get_field("pre_img", $house->ID);
        $pre_img_url = isset($pre_img["url"]) ? $pre_img["url"] : "";
        $pre_img_alt = isset($pre_img["alt"]) ? $pre_img["alt"] : "";
        
        ?>
        <a href="<?php echo get_permalink($house->ID);?>" class="item-box">
            <div class="info-div">
                <h1> <?php echo $house->post_title; ?> </h1>

                <div class="text">
                    <h3 class="amount">
                        👤  <?php echo _e("כמות אורחים: ") . get_field("amount" , $house->ID); ?>   
                    </h3>
                    <?php echo get_field("pre_desc", $post_title->ID);?> 
                </div>
                <div class="anchor"><?php _e("לחצו לפרטים נוספים"); ?></div>
            </div>
            <?php if($pre_img_url): ?>
            <div class="img-div">
                <img src="<?php echo $pre_img_url; ?>" alt="<?php echo $pre_img_alt; ?>"/>
            </div>
            <?php endif; ?>
        </a>
    <?php endforeach; ?>    

</div>




<?php get_footer(); ?>