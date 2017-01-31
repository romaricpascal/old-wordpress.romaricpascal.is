<?php global $menu_items; ?>

<nav>
<a class="t-hidden-visually" tabindex="1" href="#content">Skip to content</a>
<?php if(!empty($menu_items) && $menu_items): ?>
<a class="rp-LinkToMenu" href="#main-nav">Menu</a>
<div class="rp-Menu" id="main-nav">
<?php wp_nav_menu(array('theme_location' => 'bu_mainMenu',
                        'menu_class' => 'bu-SiteMenu')); ?>

<div>Looking to work with me? <a href="mailto:<?php bloginfo('admin_email')?>">Contact me</a></div>
<a href="#header">Close menu</a>
</div>
</nav>
