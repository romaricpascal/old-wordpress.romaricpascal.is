<form role="search" class="rp-Form-oneLine u-mb-1em" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="rp-Input u-fl-auto" placeholder="Search" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="rp-Button u-fl-none" ><?php echo _x( 'Search', 'submit button'); ?></button>
</form>
