<div class="single-good">
  <a href="<?="/shop/" . $product->getCategory() . "/" . $product->getAlias()?>">
    <img src="<?="/assets/images/" . $product->getImage()?>" alt="laptop">
    <h4>
      <?=$product->getTitle();?>
    </h4>
  </a>
  <p>
    <span><?=$product->getOldPrice()?></span>
    <i><?=$product->getPrice()?></i>
  </p>
  <div class="characteristics">
    <div class="single-char">
      <span>brand: </span> <?=$product->getBrand()?>
    </div>
    <div class="single-char">
      <span>type: </span> <?=$product->getCategory()?>
    </div>
  </div>
  <a class="check-product">
    <i class="fa fa-shopping-cart"></i>
    Add to cart
  </a>
</div>