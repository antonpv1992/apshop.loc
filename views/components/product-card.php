<div class="single-good">
  <a href="">
    <img src=<?=$features["header"]["image"]?> alt="laptop">
    <h4>
      <?=$features["header"]["title"]?>
    </h4>
  </a>
  <p>
    <span>$500</span>
    <i><?=$features["header"]["price"]?></i>
  </p>
  <div class="characteristics">
    <?php foreach($features as $title => $value):
      if($title !== "header" && $title !== "desc"): 
    ?>
      <div class="single-char">
        <span><?=$title?>: </span> <?=$value?>
      </div>
    <?php 
      endif;
      endforeach;   
    ?>
  </div>
  <a class="check-product">
    <i class="fa fa-shopping-cart"></i>
    Add to cart
  </a>
</div>