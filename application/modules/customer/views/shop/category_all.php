<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Main Start -->
<main class="main-wrap catagories-classic mb-xxl">
  <!-- Search Box Start -->
  <!-- <div class="search-box">
        <i class="iconly-Search icli search"></i>
        <input class="form-control" type="search" placeholder="Search here..." />
        <i class="iconly-Voice icli mic"></i>
      </div> -->
  <!-- Search Box End -->

  <!-- Catagories Section Start -->
  <div class="section-p-t">
    <div class="catagories-wrap">
      <?php if (count($categories) > 0) : ?>
        <?php foreach ($categories as $category) : ?>
          <div class="product-list media">
            <a href="<?php echo site_url('category/' . $category->id . '/' . $category->name . '/'); ?>"><img src="<?php echo get_theme_uri('images/catagoeris/4.png'); ?>" class="img-fluid" alt="offer" /></a>
            <div class="media-body">
              <a href="<?php echo site_url('category/' . $category->id . '/' . $category->name . '/'); ?>"> <?php echo $category->name; ?> </a>
              <p class="content-color"> Deskripsi kategori</p>
            </div>
            <span>
              <a href="<?php echo site_url('category/' . $category->id . '/' . $category->name . '/'); ?>" class="arrow-nav"> <i data-feather="chevron-right"></i></a></span>
          </div>
        <?php endforeach; ?>
      <?php else : ?>
      <?php endif; ?>

    </div>
  </div>
  <!-- Catagories Section End -->
</main>
<!-- Main End -->