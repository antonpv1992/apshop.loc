<section class="product-features">
  <h4>Product Features</h4>
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
</section>