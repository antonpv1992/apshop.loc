<section class="top-products">
  <div class="wrapper">
    <h3>Top Products</h3>
    <ul class="products">
    <?php 
      if(is_array($hotProducts) && count($hotProducts) > 0) :
        foreach($hotProducts as $hproduct):
    ?>
      <li class="single-product">
        <a href="<?="/shop/" . $hproduct->getCategory() . "/" . $hproduct->getAlias()?>">
          <img src="<?="assets/images/" . $hproduct->getImage()?>" alt="laptop">
          <h4>
            <?=$hproduct->getTitle()?>
          </h4>
        </a>
        <p>
          <span><?=$hproduct->getOldPrice()?></span>
          <i><?=$hproduct->getPrice()?></i>
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