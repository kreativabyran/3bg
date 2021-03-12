<?php

function kb_three_cards_render_card($card)
{
  $title = $card . '_title';
  $listname = $card . '_list';
  $image = $card . '_image';
  // only print the title if it exists
  if (get_field($listname)) : ?>
    <div class="kb-beige-box">


      <?php if (get_field($title)) : ?>
        <h3 class="kb-card-title"><?php the_field($title); ?></h3>
        <ul>
          <?php foreach (get_field($listname) as $list) : ?>
            <li>
              <?= $list["list_item"] ?>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>

      <div class="kb-image-container">
        <?php if (get_field($image)) : ?>
          <img class=" kb-position-bottom-right" src="<?php the_field($image); ?>" />
        <?php endif; ?>
      </div>
    </div>
<?php endif;
}

?>

<!-- CODE -->
<section id="kb-blocks-three-cards">
  <div class="container">
    <div class="row kb-title justify-content-center">
      <div class="col">
        <!-- TITLE -->
        <?php
        if (get_field('title')) : ?>
          <h2><?php the_field("title"); ?></h2>
        <?php endif; ?>
      </div>
    </div>

    <!-- CARDS -->
    <div class="row kb-cards justify-content-around">
      <!-- CARD 1 -->
      <div class="col-lg-4">
        <?php kb_three_cards_render_card('card1'); ?>
      </div>

      <!-- CARD 2 -->
      <div class="col-lg-4">
        <?php kb_three_cards_render_card('card2'); ?>
      </div>

      <!-- CARD 3 -->
      <div class="col-lg-4">
        <?php kb_three_cards_render_card('card3'); ?>
      </div>

    </div>

    <!-- BUTTON -->
    <div class="row justify-content-center kb-button-container">
      <div class="col">
        <?php if (get_field('button_link')) : ?>
          <a href="<?php the_field("button_link"); ?>" class="btn btn-primary kb-arrow-up-after">
            <?php the_field("button_text"); ?>
          </a>
        <?php endif; ?>
      </div>
    </div>

  </div>
</section>
