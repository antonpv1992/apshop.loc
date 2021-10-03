<main class="main-products">
  <div class="wrapper goods">
    <div class="goods-list">
    <?php
      //include COMPONENTS . "product-card.php";
      //include COMPONENTS . "product-card.php";
      //include COMPONENTS . "product-card.php";
      //include COMPONENTS . "product-card.php";
      //include COMPONENTS . "product-card.php";
    ?>
      <?php 
        foreach($products as $product => $features):
          include COMPONENTS . "product-card.php";
        endforeach; 
      ?>
    </div>
    <?php
      include_once COMPONENTS . "aside-products.php";
    ?>
  </div>
</main>