<?php
  // Previous/Next navigation
  $previous_post = get_previous_post();
  if(!empty($previous_post)):
  ?>
    <span class="rp-PreviousArtworkLink rp-PreviousNextLinks__previous"><a class="previous" href="<?= get_permalink($previous_post->ID) ?>" title="<?=$previous_post->post_title; ?>">
      <?= get_the_post_thumbnail(
            $previous_post->ID,
            [128,128],
            [
              'alt' => $previous_post->post_title,
              'title' => $previous_post->post_title,
              'class' => 'rp-ArtworkLinkImage'
            ]
          )
      ?>
    </a></span>
  <?php endif;?>
  <?php
  $next_post = get_next_post();
  if(!empty($next_post)):
  ?>
    <span class="rp-NextArtworkLink rp-PreviousNextLinks__next"><a class="next" href="<?= get_permalink($next_post->ID) ?>" title="<?= $next_post->post_title;?>">
    <?= get_the_post_thumbnail(
          $next_post->ID,
          [128,128],
          [
            'alt' => $next_post->post_title,
            'title' => $next_post->post_title,
            'class' => 'rp-ArtworkLinkImage'
          ]
        );
    ?>
  <?php endif;?>
</a></span>
