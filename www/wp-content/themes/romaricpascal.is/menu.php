<?php global $menu_items; ?>

<nav class="main-navigation">
<a class="visuallyhidden focusable" tabindex="1" href="#content">Skip to content</a>
<?php if(!empty($menu_items) && $menu_items): ?>
<ul>
<?php foreach($menu_items as $menu_item): ?>
<li><a href="<?= $menu_item->url ?>"><?= $menu_item->title; ?></a></li>
<?php endforeach; ?>
<?php endif; ?>
</ul>
</nav>
