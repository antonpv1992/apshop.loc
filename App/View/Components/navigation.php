<nav class="navigation">
  <div class="wrapper">
    <ul class="navigation-list">
      <?php if(!isset($_SESSION["email"])): ?>
      <li class="navigation-item <?=$pageTitle === "LoginPage" || $pageTitle === "RegistrationPage" ? "active" : "";?>">
        <a href="/login"><i class="fas fa-sign-in-alt"></i> Login</a>
      </li>
      <?php else: ?>
      <li class="navigation-item <?=$pageTitle === "LoginPage" || $pageTitle === "RegistrationPage" ? "active" : "";?>">
        <a href="/logout"><i class="fas fa-sign-in-alt"></i> Logout</a>
      </li>
      <?php endif ?>
      <li class="navigation-item <?=$pageTitle === "HomePage" ? "active" : "";?>">
        <a href="/">Home</a>
      </li>
      <li class="navigation-item <?=$pageTitle === "ShopPage" ? "active" : "";?>">
        <a href="/shop">Shop page</a>
      </li>
      <li class="navigation-item <?=$pageTitle === "CategoryPage" ? "active" : "";?>">
        <a href="/shop/laptop">Category</a>
      </li>
      <li class="navigation-item <?=$pageTitle === "ProductPage" ? "active" : "";?>">
        <a href="">Other</a>
      </li>
      <li class="navigation-item">
        <form method="post" action="shop">
          <input type="text" value="" placeholder="Search">
          <label>
            <i class="fas fa-search-plus"></i>
            <input type="submit" value="">
          </label>
        </form>
      </li>
    </ul>
  </div>
</nav>

