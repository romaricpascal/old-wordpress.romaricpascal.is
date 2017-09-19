<?php 
  $endDate = DateTime::createFromFormat('Y-m-d', get_field('end_date'));
  $trackableURL = getTrackableUrl('giveaway', 'twitter', get_bloginfo('url').get_permalink());
  $shareUrl = replacePlaceholder('url', $trackableURL, SOCIAL_SHARE_PATTERNS['Twitter']);
  $text = get_field('tweet_text');
  $shareUrl.="&text=".urlencode($text);
?>

<article class="u-mw-30em-xl-down" >
	<header class="u-mw-48 rp-HeaderWithSubhead u-mb-2">
		<h1 class="rp-HeaderWithSubhead__heading u-ta-c"><?php the_title(); ?></h1>
		<div class="u-ta-c"><?php the_content(); ?></div>
	</header>
	<div class="l-sideBySide l-sideBySide-tight">
	<?php rp_render('postThumbnailImg', [
        'post' => rp_get_the_post(),
        'classes' => 'u-d-b u-ord-first u-mw-35-xl u-fl-none',
        'size' => '800',
        'srcset' => ['200','400','800','1200','1600']
      ]);?>
      <div class="u-mw-15-xl u-ord-last u-fl-none">
      	<p class="u-mb-0">If you want to be part of the draw, easy:</p>
        <ol class="rp-GiveawayCTAs u-list-flat">
          <li class="u-ord-first"><a class="rp-TwitterCTA" href="<?= $shareUrl ?>" target="_blank" rel="noopener">Share this page on Twitter</a></li>
          <li class="u-ord-last"><a class="rp-TwitterCTA" href="http://twitter.com/romaricpascal" target="_blank" rel="noopener">Follow @romaricpascal</a></li>
        </ol>
        <p>
          I'll draw the lucky winner on <strong><?= $endDate->format('M. jS'); ?></strong> ! In the meantime, feel free to browse around and look at <a href="/drawing-letters/">artworks I've created</a> or <a href="/writing-about/">read about lettering or web development</a>.
        </p>
        <p>Thanks for participating!</p>
      </div>
     </div>
</article>