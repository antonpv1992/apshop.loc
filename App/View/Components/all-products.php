<main class="main-products">
  <div class="wrapper goods">
    <div class="goods-list">
    <?php 
      if (is_array($products)) {
        foreach ($products as $product) {
          include COMPONENTS . DS . "product-card.php";
        } 
      }
    ?>
    </div>
    <?php
      include_once COMPONENTS . DS . "aside-products.php";
    ?>
  </div>
</main>