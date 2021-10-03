<div class="single-good">
  <a href="">
    <img src=<?=$product->getImage();?> alt="laptop">
    <h4>
      <?=$product->getName();?>
    </h4>
  </a>
  <p>
    <span>$500</span>
    <i><?=$product->getPrice()?></i>
  </p>
  <div class="characteristics">
      <div class="single-char">
        <span>brand: </span> <?=$product->getBrand()?>
      </div>
      <div class="single-char">
        <span>type: </span> <?=$product->getCategory()?>
      </div>
    <?php foreach($product->getFeatures() as $title => $value):
    ?>
      <div class="single-char">
        <span><?=$title?>: </span> <?=$value?>
      </div>
    <?php
      endforeach;   
    ?>
  </div>
  <a class="check-product">
    <i class="fa fa-shopping-cart"></i>
    Add to cart
  </a>
</div>