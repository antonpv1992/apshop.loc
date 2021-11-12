<section class="breadcrumbs-area">
  <?php $link = "http://" . $_SERVER['HTTP_HOST'];?>
  <div class="wrapper">
    <ol class="breadcrumbs">
      <?php
        $crumbs = explode("/", strtok($_SERVER["REQUEST_URI"],'?')); 
        foreach($crumbs as $key => $crumb):
          if($crumb !== "" || $key == 0):
      ?>
        <li>
          <a href="<?=$link .= $crumb . '/';?>"><?=ucfirst($crumb) !== "" ? ucfirst($crumb) : "Home"?></a>
        </li>
      <?php 
          endif;
        endforeach;
      ?>
    </ol>
  </div>
</section>