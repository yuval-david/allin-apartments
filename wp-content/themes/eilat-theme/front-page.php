<?php /* Template Name: עמוד הבית */ ?>

<?php 

$categories_args = array(
    'taxonomy'=> 'houses_cat',
    "hide_empty" => 0
);

$cats_of_houses = get_terms($categories_args);

$head_slider_bg = get_field("head_slider_bg");

$customers_args = array(
    'post_type' => 'customers',
    'post_status'      => 'publish',
    'posts_per_page'    => -1
);

$all_customers = get_posts($customers_args);

get_header(); 

?>

<div class="hero-home">
    <!-- Slider main container -->
    <div class="header-hero">
        <h1> <?php echo get_field("main_title");?> </h1>
        <p> <?php the_content(); ?> </p>
    </div>
    <div class="arrow-more">
        <a href="#section-1">
            <?php echo get_field("text_arrow"); ?>
           <img src="<?php echo get_template_directory_uri() . '/img/arrow-down.gif';?>"/> 
        </a>
        
    </div>

    <?php if($head_slider_bg): ?>

    <div class="swiper-container swiper-home shadow">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <?php foreach($head_slider_bg as $key => $bg):
                $bg_desk = isset($bg["bg_desk"]["url"]) ? $bg["bg_desk"]["url"] : "";
                $bg_alt = isset($bg["bg_desk"]["alt"]) ? $bg["bg_desk"]["alt"] : "";
                $bg_mob = isset($bg["bg_mob"]["url"]) ? $bg["bg_mob"]["url"] : "";
                ?>
            <!-- Slides -->
            <div class="swiper-slide">
                <picture>
                    <source media="(max-width:1024px)" srcset="<?php echo $bg_mob;?>"></source>
                    <img src="<?php echo $bg_desk;?>" alt="<?php echo $bg_alt; ?>" />
                </picture>
            </div>
            <?php endforeach; ?>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>
    </div>
    
    <?php endif; ?>
</div>

<!-- SECTION 1 - Categories of apartments -->
<div class="section-1" id="section-1">

    <div class="top-area">
        <h1> <?php echo get_field("title_houses"); ?> </h1>
        <p> <?php echo get_field("sub_title_houses"); ?> </p>
    </div>

    <div class="container-blocks">
        <?php foreach($cats_of_houses as $cat): ?>
        <div class="item" style="background-image:linear-gradient(#eeeeee69, #f0f0f0c9, #f0f0f0a6),url('<?php echo get_field('img_pre','category_'. $cat->term_id)["url"];?>')">
            <h2> <?php echo $cat->name;?> </h2>
            <p class="text">
                <?php echo $cat->description;?>
            <p>
            <div class="link" id="link_home">
                <a href="<?php echo get_category_link($cat->term_id);?>"> 
                    <?php _e("לכל הדירות"); ?>
                    <i id="icon_arr" class="fa fa-arrow-circle-left"></i> 
                </a>  
            </div>
        </div>
        <?php endforeach; ?>

    </div>
</div>

<?php /* ?>
<!-- PARALLAX -->
<div class="parallax">
</div>

<!-- SECTION 2 - ADVANTAGES -->
<div class="section-2" id="section-2">
    <div class="top-area">
        <h1> היתרונות שלנו </h1>
        <p> Ay Eilat מציעים לכם מגוון שירותים </p>
    </div>

    <div class="adv-container">
            <div class="adv-item">
                <div class="adv-img">
                    <img src="<?php echo get_template_directory_uri() . '/img/temp/icon-1.jpg'; ?>" alt="icon"/>
                </div>
                <div class="adv-text">
                    זמנים
                </div>
            </div>
            <div class="adv-item">
                <div class="adv-img">
                    <img src="<?php echo get_template_directory_uri() . '/img/temp/icon-2.jpg'; ?>" alt="icon"/>
                </div>
                <div class="adv-text">
                    אטרקציות
                </div>
            </div>
            <div class="adv-item">
                <div class="adv-img">
                    <img src="<?php echo get_template_directory_uri() . '/img/temp/icon-3.jpg'; ?>" alt="icon"/>
                </div>
                <div class="adv-text">
                    חוף הים
                </div>
            </div>
            <div class="adv-item">
                <div class="adv-img">
                    <img src="<?php echo get_template_directory_uri() . '/img/temp/icon-4.jpg'; ?>" alt="icon"/>
                </div>
                <div class="adv-text">
                    מיקום
                </div>
            </div>
            <div class="adv-item">
                <div class="adv-img">
                    <img src="<?php echo get_template_directory_uri() . '/img/temp/icon-5.jpg'; ?>" alt="icon"/>
                </div>
                <div class="adv-text">
                    שירות
                </div>
            </div>
        </div>
</div>

<?php */ ?>

<!-- PARALLAX -->
<div class="parallax parallax-2">
</div>


<?php 
$is_display_customers = get_field("is_display_customers", "option");
if($all_customers && $is_display_customers): 
?>
<!-- SECTION 3 - CUSTOMERS -->
<div class="section-3" id="section-3">
    <div class="top-area">
        <h1> <?php echo get_field("title_customers"); ?> </h1>

        <!-- Slider main container -->
        <div class="swiper-container swiper-customers">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <?php foreach($all_customers as $key => $customer): 
                $area_obj = get_term_by('id', get_field("area", $customer->ID), 'houses_cat');
                ?>
            <!-- Slides -->
            <div class="swiper-slide">
                <h2 class="name"> <?php echo $customer->post_title; ?> </h2>    
                <div class="desc">
                    <?php echo get_field("content", $customer->ID); ?>
                </div>
                <div class="from">
                    <?php echo $area_obj->name; ?>
                </div>
                <?php $stars_number = get_field("rate", $customer->ID); ?>
                <div class="rate">
                    <span class="fa fa-star <?php echo $stars_number >= 1 ? "checked" : ""; ?>"></span>
                    <span class="fa fa-star <?php echo $stars_number >= 2 ? "checked" : ""; ?>"></span>
                    <span class="fa fa-star <?php echo $stars_number >= 3 ? "checked" : ""; ?>"></span>
                    <span class="fa fa-star <?php echo $stars_number >= 4 ? "checked" : ""; ?>"></span>
                    <span class="fa fa-star <?php echo $stars_number >= 5 ? "checked" : ""; ?>"></span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination customers-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

        </div>

    </div>
</div>
<?php endif; ?> 


<?php get_footer(); ?>
