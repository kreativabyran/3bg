<section id="kb-blocks-contact-form">
  <div class="container">
    <!-- text -->
    <div class="row justify-content-center">
      <?php
      if (get_field('title')) : ?>
        <h2 class='contact-title'><?php the_field("title"); ?></h2>
      <?php endif; ?>
    </div>

    <form action="/action_page.php" target="_blank">
      <fieldset>
        <!-- Name and Number -->
        <div class="row justify-content-center kb-row">
          <div class="col-sm-4">
            <input class="kb-input-text" type="text" placeholder="<?php the_field('name'); ?>">
          </div>

          <div class="col-sm-4">
            <input class="kb-input-text" type="text" placeholder="<?php the_field('number'); ?>">
          </div>
        </div>

        <!-- Email & Nessage -->
        <div class="row justify-content-center kb-row">
          <div class="col-sm-4">
            <input class="kb-input-text" type="text" placeholder="<?php the_field('email'); ?>">
          </div>

          <div class="col-sm-4">
            <input class="kb-input-text" type="text" placeholder="<?php the_field('message'); ?>">
          </div>
        </div>

        <!-- button -->
        <div class="row justify-content-center kb-row">
          <div class="col">
            <?php if (get_field('name')) : ?>
              <input class="btn btn-primary" type="submit" value="<?php the_field('send_button'); ?>">
            <?php endif; ?>
          </div>
        </div>
      </fieldset>
    </form>
  </div>
</section>
