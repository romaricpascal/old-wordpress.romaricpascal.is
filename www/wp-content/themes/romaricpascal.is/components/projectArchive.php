<?php
    $query = rp_query_projects_with_craft($craft,rp_get_archive_size(PROJECT_TYPE));?>
    
<?php if ($query->have_posts()): ?>

<section class="rp-HomeSection">
	<div class="l-sideBySide">
	<header class="l-sideBySide__header">
		<h2 class="rp-LetteringHeading">
			<div role="presentation">
			<svg class="rp-LetteringHeading__lettering" class="rp-LetteringHeading__lettering" version="1.1" x="0px" y="0px" width="454px" height="367.172px" viewBox="0 0 454 367.172">
				<image id="logos" style="overflow:visible;" width="454" height="257" xlink:href="/wp-content/themes/romaricpascal.is/assets/images/logos.png" transform="matrix(1 0 0 1 0 45.209)">
				</image>
					<image id="and" style="overflow:visible;" width="96" height="101" xlink:href="/wp-content/themes/romaricpascal.is/assets/images/and.png" transform="matrix(0.9945 -0.1043 0.1043 0.9945 69.5977 266.7236)">
				</image>
					<image id="brands" style="overflow:visible;" width="262" height="114" xlink:href="/wp-content/themes/romaricpascal.is/assets/images/brands.png" transform="matrix(0.9972 0.0754 -0.0754 0.9972 173.6714 219.9937)">
				</image>
					<image id="for" style="overflow:visible;" width="111" height="126" xlink:href="/wp-content/themes/romaricpascal.is/assets/images/for.png" transform="matrix(0.9995 0.0313 -0.0313 0.9995 140.0024 0)">
				</image>
			</svg>
			<img class="rp-LetteringHeading__portrait" src="/wp-content/themes/romaricpascal.is/assets/images/photo.png" />
			</div>
			<span class="rp-LetteringHeading__textFallback"><?= $craft->name; ?></span>
		</h2>
		<p><?= $craft->description; ?></p>
	</header>
	<?php rp_render('postList', ['query' => $query, 'format' => 'thumbnail', 'classes'=>'l-sideBySide__main rp-ArchiveList-project']); ?>
	</div>
</section>

<?php endif; ?>