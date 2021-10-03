<main class="main-products">
  <div class="wrapper goods">
    <div class="goods-list">
    <?php 
      foreach($products as $product):
        include COMPONENTS . DS . "product-card.php";
      endforeach; 
    ?>
    </div>
    <?php
      include_once COMPONENTS . DS . "aside-products.php";
    ?>
  </div>
</main>