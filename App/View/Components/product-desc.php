<section class="product-box">
  <div class="product-image">
    <img src="<?="/assets/images/" . $product->getImage()?>" alt="laptop">
  </div>
  <div class="product-info">
    <h3><?=$product->getFullTitle();?></h3>
    <h5><?=$product->getPrice();?></h5>
    <p>
      <?=$product->getDescription();?>
    </p>
    <div class="product-quantity">
      <input type="button" value="-">
      <input type="number" size="4" value="1" min="0" step="1">
      <input type="button" value="+">
    </div>
    <a class="check-product">
      <i class="fa fa-shopping-cart"></i>
      Add to cart
    </a>
  </div>
</section>