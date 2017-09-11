<form role="search" class="rp-Form-oneLine u-mb-1em" method="get" action="<?= esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="rp-Input u-fl-auto" placeholder="Search" value="<?= get_search_query(); ?>" name="s" />
	<button type="submit" class="rp-Button u-fl-none" ><?= _x( 'Search', 'submit button'); ?></button>
</form>
