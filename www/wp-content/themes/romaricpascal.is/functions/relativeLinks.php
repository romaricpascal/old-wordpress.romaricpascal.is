<?php
define('RELATIVE_URL_FILTERS', ['post_link',
    'post_type_link',
    'page_link',
    'attachment_link',
    'get_shortlink',
    'post_type_archive_link',
    'get_pagenum_link',
    'get_comments_pagenum_link',
    'term_link',
    'search_link',
    'day_link',
    'month_link',
    'year_link',
]);

// From https://deluxeblogtips.com/relative-urls/
add_action( 'template_redirect', function() {
    // Don't do anything if:
    // - In feed
    // - In sitemap by WordPress SEO plugin
    if ( is_feed() || get_query_var( 'sitemap' ) )
        return;

    foreach ( RELATIVE_URL_FILTERS as $filter )
    {
        add_filter( $filter, 'wp_make_link_relative' );
    }
});