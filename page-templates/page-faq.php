<?php
/*
* Template Name: FAQ
*/

get_header();



?>
<div class="faq">
  <?php if (have_rows('faq')) : ?>
    <div class="faq__wrapper accordion" id="accordionFAQ">
      <?php $item = 1; ?>
      <?php while (have_rows('faq')) : the_row(); ?>
        <?php if ($item == 1) {
          $aria = 'aria-expanded="true"';
          $collapseClass = ' show';
        } else {
          $aria = 'aria-expanded="false"';
          $collapseClass = '';
        }
        ?>
        <div class="faq__item accordion-item">
          <h2 class="faq__header accordion-header" id="heading-<?php echo $item; ?>">
            <button class="faq__button accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $item; ?>" <?php echo $aria; ?> aria-controls="collapse-<?php echo $item; ?>">
              <?php echo get_sub_field('title'); ?>
            </button>
          </h2>
          <div id="collapse-<?php echo $item; ?>" class="accordion-collapse collapse <?php echo $collapseClass; ?>" aria-labelledby="heading-<?php echo $item; ?>" data-bs-parent="#accordionFAQ">
            <div class="faq__body accordion-body">
              <?php echo get_sub_field('description'); ?>
            </div>
          </div>
        </div>
        <?php $item++; ?>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>
</div>
<?php
get_footer();
