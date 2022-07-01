<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> AY | אילת </title>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


<?php

    $logo = get_field("logo", "option");
    $logo_url = isset($logo["url"]) ? $logo["url"] : "";
    $logo_alt = isset($logo["alt"]) ? $logo["alt"] : "";
?>

<!---- NAVBAR ---->
<nav id="navbar">

    <?php if($logo_url): ?>
    <!---- LOGO ---->
    <div class="logo-nav">
        <a href="<?php echo home_url(); ?>">
            <img src="<?php echo $logo_url; ?>" alt="<?php echo $logo_alt; ?>"/>
        </a>
    </div>
    <?php endif; ?>

    <?php if(wp_is_mobile()) { ?>
        <div id="nav-icon4">
            <span></span>
            <span></span>
            <span></span>
        </div>
    <?php } ?>

    <!---- MENU ---->
    <?php
        wp_nav_menu( array( 
            'theme_location' => 'main-menu', 
            'container_class' => 'custom-menu-class' )
        ); 
    ?>     

       


</nav>


    
