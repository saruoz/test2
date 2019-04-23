<!-- #page-wrapper -->
<div id="page-wrapper">

    <!--#header-->
    <div id="header">
    
        <!--#header-inside-->
        <div id="header-inside" class="container_12">
            
            <?php if ($page['header'] && !$page['content_top']) { ?>
            <div class="grid_9">
            <?php } elseif (($page['header'] && $page['content_top']) || ($page['content_top'])) { ?>
            <div class="grid_4">    
            <?php } else { ?>
            <div class="grid_12">
            <?php } ?>
            <?php if ($logo): ?>
                    <div id="logo" class="clearfix">
                    <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"> <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /> </a>
                    </div>
                    <?php endif; ?>

                <!-- #header-inside-left -->
                <div id="header-inside-left">
				<!--	<?php if ($logo): ?>
                    <div id="logo" class="clearfix">
                    <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"> <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /> </a>
                    </div>
                    <?php endif; ?> -->

                    <?php if ($site_name || $site_slogan): ?>
                        <!-- #name-and-slogan -->
                        <div id="name-and-slogan">
						<?php if ($site_name):?>
                        <div id="site-name">
                        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
                        </div>
                        <?php endif; ?>
                        
                        <?php if ($site_slogan):?>
                        <div id="site-slogan">
                        <i class="fa fa-fighter-jet" aria-hidden="true"></i>
                        <?php print $site_slogan; ?>
                        </div>
                        <?php endif; ?>
                        </div> 
                        <!-- EOF:#name-and-slogan -->
                    <?php endif; ?>
                </div>
                <!--EOF:#header-inside-left-->
            </div>
            
            <?php if ($page['content_top']) :?>
                <div class="grid_5">
                    <!-- #header-inside-right -->
                    <div id="content-top" class="clearfix">
                        <?php print render($page['content_top']); ?>
                    </div>
                    <!--EOF:#header-inside-right-->
                </div>
            <?php endif; ?>

            <?php if ($page['header']) :?>
                <div class="grid_3">
                    <!-- #header-inside-right -->
                    <div id="header-inside-right" class="clearfix">
                        <?php print render($page['header']); ?>
                    </div>
                    <!--EOF:#header-inside-right-->
                </div>
            <?php endif; ?>

        </div>
        <!--EOF:#header-inside-->
    </div>
    <!--EOF:#header-->

    <!--#main-menu-->
    <div id="main-menu" class="container_12">
     

        <div class="grid_12" >
            <!--#main-menu-inside-->
            <div id="main-menu-inside">
                <!--#menu-->
                <div id="menu" class="clearfix">
                    <?php if ($page['navigation']) :?>
                    <?php print drupal_render($page['navigation']); ?>
                    <?php else :
                    if (module_exists('i18n_menu')) {
                    $main_menu_tree = i18n_menu_translated_tree(variable_get('menu_main_links_source', 'main-menu'));
                    } else { $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu')); }
                    print drupal_render($main_menu_tree);
                    endif; ?>
                </div>
                <!--EOF:#menu-->
            </div>
            <!--EOF:#main-menu-inside-->
        </div>

    </div>
    <!--EOF:#main-menu-->

    <!--#banner-->
    <div id="banner">
        <!--#banner-inside-->
        <div id="banner-inside" class="container_12">

            <?php if ($page['banner']) : ?>
            <div class="grid_12">
            <?php print render($page['banner']); ?>
            </div>
            <?php endif; ?>

            <?php if (theme_get_setting('slideshow_display','corkedscrewer')): ?>
                    
            <?php if ($is_front): ?>

            <div class="grid_12">
<!--#slideshow-->
<div id="slideshow">

<!--slides-->
<div class="slides">
<!--slider-item-->
<div class="slider-item">
<div class="slider-item-image"><a href="http://unfittofit.com/node/4"><img src="<?php print base_path() . drupal_get_path('theme', 'corkedscrewer') ;?>/images/local/Old Book Surrounded by Pestal_Slide1.jpg"/></a></div>
<div class="slider-item-title">Good Reads</div>
<div class="slider-item-body">Unique resource for Women</div>
</div>
<!--EOF:slider-item-->

<!--slider-item-->
<div class="slider-item">
<div class="slider-item-image"><a href="http://unfittofit.com/node/10"><img src="<?php print base_path() . drupal_get_path('theme', 'corkedscrewer') ;?>/images/local/Doctor Crushing Herbs_Slide3.jpeg"/></a></div>
<div class="slider-item-title light">Herb Resources </div>
<div class="slider-item-body">Quality Sources of Natural Health Supplies</div>
</div>
<!--EOF:slider-item-->

<!--slider-item-->
<div class="slider-item">
<div class="slider-item-image"><a href="http://unfittofit.com/node/5"><img src="<?php print base_path() . drupal_get_path('theme', 'corkedscrewer') ;?>/images/local/Women Doing Yoga_Slide1.jpeg"/></a></div>
<div class="slider-item-title light">Best Health Tidbits</div>
<div class="slider-item-body">Articles on Hollistic Health and Wellbeing</div>
</div>
<!--EOF:slider-item-->

<!--slider-item-->
<div class="slider-item">
<div class="slider-item-image"><a href="http://unfittofit.com/node/11"><img src="<?php print base_path() . drupal_get_path('theme', 'corkedscrewer') ;?>/images/local/Black Woman Meditating_Slide2.jpeg"/></a></div>
<div class="slider-item-title">Spritual Life </div>
<div class="slider-item-body">Life is Eternal</div>
</div>
<!--EOF:slider-item-->
</div> 
<!--EOF:slides-->

<!--slide-control-->
<div class="slide-control">
<div id="prev" href="#"><span class="websymbols"><</span></div>
<div id="next" href="#"><span class="websymbols">></span></div>
</div>
<!--EOF:slide-control-->

<!--#slide-nav-->
<ul id="slide-nav">
<li><a href="#"></a></li>
<li><a href="#"></a></li>
<li><a href="#"></a></li>
<li><a href="#"></a></li>
</ul> 
<!--EOF:#slide-nav-->                

</div>
<!--EOF:#slideshow-->
            </div>    

            <?php endif; ?>

            <?php endif; ?>

        </div>
        <!--EOF:#banner-inside-->
    </div>
    <!--EOF:#banner-->

    <!--#content-->
    <div id="content" class="container_12">
        <!--#content-inside-->
        <div id="content-inside" class="clearfix">

            <?php if ($page['highlighted']): ?>
            <div class="grid_12">
                <div id="highlighted"><?php print render($page['highlighted']); ?></div>
            </div>
            <?php endif; ?>

            <?php if (theme_get_setting('highlighted_display','corkedscrewer')): ?>
                    
            <?php if ($is_front): ?>            
            <div class="grid_12">
                <!--#featured-->
                <div id="featured" class="clearfix">
                
                <div class="grid_3 alpha">
                <!--featured-teaser-->
                <div class="featured-teaser">
                <div class="featured-teaser-image"><a href="http://unfittofit.com/node/5"><img src="<?php print base_path() . drupal_get_path('theme', 'corkedscrewer') ;?>/images/local/image3.png"/></a></div>
                <div class="featured-teaser-title">Health & Herbs</div>
                <!--<div class="featured-teaser-body"></div>-->
                </div>
                <!--EOF:featured-teaser-->
                
                <!--featured-teaser-->
                <div class="featured-teaser">
                <div class="featured-teaser-image"><a href="http://unfittofit.com/node/4"><img src="<?php print base_path() . drupal_get_path('theme', 'corkedscrewer') ;?>/images/local/Resources.png"/></a></div>
                <div class="featured-teaser-title">Resources</div>
                <!--<div class="featured-teaser-body"></div>-->

                </div>
                <!--EOF:featured-teaser-->
                
                <!--featured-teaser-->
                <div class="featured-teaser">
                <div class="featured-teaser-image"><a href="http://unfittofit.com/node/5"><img src="<?php print base_path() . drupal_get_path('theme', 'corkedscrewer') ;?>/images/local/Invest In Your Health.jpg"/></a></div>
                <div class="featured-teaser-title"></div>
                <!--<div class="featured-teaser-body"></div>-->
                </div> 
                <!--EOF:featured-teaser-->
                </div>
                
                <div class="grid_6">
                <!--featured-->
                <div class="featured">
                <div class="featured-image"><a href="http://unfittofit.com/node/11"><img src="<?php print base_path() . drupal_get_path('theme', 'corkedscrewer') ;?>/images/local/image7.png"/></a></div>
                <div class="featured-title"><h2><a href="#">The Spirit of Spritual Life</a></h2></div>
                <div class="featured-body">The mission of unfittofit.com is to empower and educate women, specifically women of color to take control of their health and healthcare.</div>
                </div>
                <!--EOF:featured-->
                </div>
                
                <div class="grid_3 omega">
                <!--featured-teaser-->
                <div class="featured-teaser">
                <div class="featured-teaser-image"><a href="#"><img src="<?php print base_path() . drupal_get_path('theme', 'corkedscrewer') ;?>/images/local/image5.png"/></a></div>
                <div class="featured-teaser-title">Remedies</div>
                <!--<div class="featured-teaser-body"></div>-->

                </div>
                <!--EOF:featured-teaser-->
                
                <!--featured-teaser-->
                <div class="featured-teaser">  
                <div class="featured-teaser-image"><a href="#"><img src="<?php print base_path() . drupal_get_path('theme', 'corkedscrewer') ;?>/images/local/image6.png"/></a></div>
                <div class="featured-teaser-title">Individual Herbs</div>
                <!--<div class="featured-teaser-body"></div>-->

                </div>  
                <!--EOF:featured-teaser-->
                
                <!--featured-teaser-->
                <div class="featured-teaser">  
                <div class="featured-teaser-image"><a href="#"><img src="<?php print base_path() . drupal_get_path('theme', 'corkedscrewer') ;?>/images/local/Please Donate.jpg"/></a></div>
                <div class="featured-teaser-title"></div>
                <!--<div class="featured-teaser-body"></div>-->

                </div>  
                <!--EOF:featured-teaser-->
                </div>   
                
                </div>
                <!--EOF:#featured-->
            </div>

            <?php endif; ?>

            <?php endif; ?>    

            <div class="grid_12">
                <div class="breadcrumb-wrapper">
                <?php if (theme_get_setting('breadcrumb_display','corkedscrewer')): print $breadcrumb; endif; ?>
                </div>
                <?php print $messages; ?>
            </div>

            <?php if ($page['sidebar_first']) :?>
                <!--.sidebar first-->
                <div class="grid_3">
                    <div class="sidebar">
                    <?php print render($page['sidebar_first']); ?>
                    </div>
                </div>
                <!--EOF:.sidebar first-->
            <?php endif; ?>


            <?php if ($page['sidebar_first'] && $page['sidebar_second']) { ?>
            <div class="grid_6">
            <?php } elseif ($page['sidebar_first'] || $page['sidebar_second']) { ?>
            <div class="grid_9">
            <?php } else { ?>
            <div class="grid_12">    
            <?php } ?>
                <!--#main-content-->
                <div id="main-content">
                <?php print render($title_prefix); ?>
                <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
                <?php print render($title_suffix); ?>
                <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
                <?php print render($page['help']); ?>
                <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
                <?php print render($page['content']); ?>
                </div>
                <!--EOF:#main-content-->
            </div>


            <?php if ($page['sidebar_second']) :?>
                <!--.sidebar second-->
                <div class="grid_3">
                    <div class="sidebar">
                    <?php print render($page['sidebar_second']); ?>
                    </div>
                </div>
                <!--EOF:.sidebar second-->
            <?php endif; ?>
            
        </div>
        <!--EOF:#content-inside-->
    </div>
    <!--EOF:#content-->
   <div id = "amazon-ad">
   <script type="text/javascript">
        amzn_assoc_placement = "adunit0";
        amzn_assoc_tracking_id = "patwitinc-20";
        amzn_assoc_ad_mode = "manual";
        amzn_assoc_ad_type = "smart";
        amzn_assoc_marketplace = "amazon";
        amzn_assoc_region = "US";
        amzn_assoc_title = "Books from Amazon";
        amzn_assoc_linkid = "8e54e9e70bc9727747658a0bacf5769f";
        amzn_assoc_search_bar = "false";
        amzn_assoc_asins = "0756628679,B0002NKDRU,0738213594,B00KEUBDFW";
</script>
<script src="//z-na.amazon-adsystem.com/widgets/onejs?MarketPlace=US"></script>
   </div>
    <!--#footer-->
    <div id="footer">
        <!--#footer-top-->
        <div id="footer-top" class="container_12">
            <div class="grid_4">
                <div class="footer-area">
                <?php if ($page['footer_featured']) :?>
                <?php print render($page['footer_featured']); ?>
                <?php endif; ?>
                </div>           
            </div>
            <div class="grid_2">
                <div class="footer-area">
                <?php if ($page['footer_first']) :?>
                <?php print render($page['footer_first']); ?>
                <?php endif; ?>
                </div>
            </div>
            <div class="grid_2">
                <div class="footer-area">
                <?php if ($page['footer_second']) :?>
                <?php print render($page['footer_second']); ?>
                <?php endif; ?>
                </div>
            </div>
            <div class="grid_2">
                <div class="footer-area">
                <?php if ($page['footer_third']) :?>
                <?php print render($page['footer_third']); ?>
                <?php endif; ?> 
                </div>
            </div>
            <div class="grid_2">
                <div class="footer-area">
                <?php if ($page['footer_fourth']) :?>
                <?php print render($page['footer_fourth']); ?>
                <?php endif; ?> 
                </div>
            </div>
        </div>
        <!--EOF:#footer-top-->   
        <!--#footer-bottom-->
        <div id="footer-bottom" class="container_12">
            <div class="grid_12">
                <!--#footer-bottom-inside-->
                <div id="footer-bottom-inside">
                <?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('class' => array('menu', 'secondary-menu', 'links', 'clearfix')))); ?>
                <?php if ($page['footer']) :?>
                <?php print render($page['footer']); ?>
                <?php endif; ?>
                </div>
                <!--EOF:#footer-bottom-inside-->
            </div>
        </div>
    </div>
    <!--EOF:#footer-->

</div>  
<!--EOF:#page-wrapper-->


