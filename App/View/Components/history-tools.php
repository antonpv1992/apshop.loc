<form class="history-tools" method="post" action="/history">
  <input type="text" name="hsearch" placeholder="search">
  <?php
    include_once COMPONENTS . DS . "history-filters.php";
    include_once COMPONENTS . DS . "history-sorts.php";
  ?>
</form>