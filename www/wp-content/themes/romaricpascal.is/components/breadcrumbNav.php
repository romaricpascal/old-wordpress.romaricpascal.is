<nav class="rp-BreadcrumbNav">
    <div class="rp-CollapsedItemsMenu">
        <a class="rp-BreadcrumbLink rp-CollapsedItemsMenuToggle js-toggle" data-toggle-group="overlays" data-toggle-target=".rp-CollapsedItems">
            <span class="rp-BreadcrumbLinkSeparator"></span>
            <span class="rp-BreadcrumbLink__title">...</span>
        </a>
        <div class="rp-CollapsedItems js-outsideToggle"></div>
    </div>
    <div class="rp-BreadcrumbNavItems js-collapsible">
		<?php foreach($breadcrumbs as $breadcrumb): ?>
		<a href="<?= $breadcrumb['href'] ?>" class="rp-BreadcrumbLink">
			<span class="rp-BreadcrumbLinkSeparator"></span>
			<span class="rp-BreadcrumbLink__title"><?= $breadcrumb['title']?></span>
		</a>
		<?php endforeach; ?>
    </div>
</nav>