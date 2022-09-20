<?php
/*
* Template Name: Kontakt
*/

get_header();

?>
<div class="page-contact mb-80 mb-md-160">
  <?php if (have_posts()) : while (have_posts()) : the_post();
      the_content();
    endwhile;
  else : ?>
    <p></p>
  <?php endif; ?>
</div>
<?php

get_footer();
