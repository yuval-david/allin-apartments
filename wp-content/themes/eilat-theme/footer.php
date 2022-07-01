<?php

    $email_contact = get_field("email_contact", "option");
    $phone_contact = get_field("phone_contact", "option");
    $list_social = get_field("list_social", "option");
?>
<footer id="contact">

    <h1> <?php echo get_field("title_contact", "option"); ?> </h1>
    <div class="details">
        <div> <a href="mailto:<?php echo $email_contact; ?>" target="_blank"> <?php echo $email_contact; ?> </a> </div>
        <div> <a href="tel:<?php echo $phone_contact;?>" target="_blank"><?php echo $phone_contact;?></a> </div>
    </div>

    <?php if($list_social): ?>
    <div class="social-container">
        <?php foreach($list_social as $key => $social): 
            $social_url = isset($social["link"]) ? $social["link"] : "";    
            $social_icon_url = isset($social["icon"]["url"]) ? $social["icon"]["url"] : "";    
            $social_icon_alt = isset($social["icon"]["alt"]) ? $social["icon"]["alt"] : "";
            
            if($social_url && $social_icon_url):
        ?>
        <a href="<?php echo $social_url; ?>" target="_blank" class="social-item">
            <img src="<?php echo $social_icon_url; ?>" alt="<?php echo $social_icon_alt; ?>"/>
        </a>
        <?php
            endif;
        endforeach; 
        ?>
    </div>
    <?php endif; ?>
</footer>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php wp_footer(); ?>

</body>
</html>