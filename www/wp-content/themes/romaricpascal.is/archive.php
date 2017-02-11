
<?php get_header(); ?>

  <section class="rp-LandingSection">
    <div class="rp-Hero l-Container">
      <h1 class="rp-HeroHeading rp-Underlined">
        Notes about <?php the_archive_title(); ?>
      </h1>
    </div>
  </section>

  <section class="rp-LandingSection t-light-on-dark">
    <div class="l-Container">

      <?php while(have_posts()): the_post(); ?>
      <a class="rp-Note" href="<?php the_permalink(); ?>">
        <h2 class="rp-NoteTitle"><?php the_title();?></h2>
        <time class="rp-NoteTime"><?php the_date('d M Y'); ?></time>
      </a>
      <?php endwhile; ?>
    </div>
  </section>

<?php get_footer(); ?>
