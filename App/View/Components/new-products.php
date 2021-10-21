<section class="new-products">
  <div class="wrapper">
    <h3>New Products</h3>
    <ul class="products">
    <?php 
      if(is_array($hotProducts) && count($newProducts) > 0) :
        foreach($newProducts as $nproduct):
    ?>
      <li class="single-product">
        <a href="<?="/shop/" . $nproduct->getCategory() . "/" . $nproduct->getAlias()?>">
          <img src="<?="assets/images/" . $nproduct->getImage()?>" alt="laptop">
          <h4>
            <?=$nproduct->getTitle()?>
          </h4>
        </a>
        <p>
          <span><?=$nproduct->getOldPrice()?></span>
          <i><?=$nproduct->getPrice()?></i>
        </p>
        <a class="check-product">
          <i class="fa fa-shopping-cart"></i>
          Add to cart
        </a>
      </li>
    <?php 
        endforeach;
      endif; 
    ?>
    </ul>
  </div>
</section>