<nav class="navigation">
  <div class="wrapper">
    <ul class="navigation-list">
      <?php if(!"Framework\\Session\\Session"::getSessionKey("login")): ?>
      <li class="navigation-item <?=$pageTitle === "LoginPage" || $pageTitle === "RegistrationPage" ? "active" : "";?>">
        <a href="/login"><i class="fas fa-sign-in-alt"></i> Login</a>
      </li>
      <?php else: ?>
      <li class="navigation-item <?=$pageTitle === "LoginPage" || $pageTitle === "RegistrationPage" ? "active" : "";?>">
        <logout></logout>
      </li>
      <?php endif ?>
      <li class="navigation-item <?=$pageTitle === "HomePage" ? "active" : "";?>">
        <a href="/">Home</a>
      </li>
      <li class="navigation-item <?=$pageTitle === "ShopPage" ? "active" : "";?>">
        <a href="/shop/">Shop page</a>
      </li>
      <li class="navigation-item <?=$pageTitle === "CategoryPage" ? "active" : "";?>">
        <a>Category</a>
        <ul class="drop">
          <li class="navigation-item">
            <a href="/shop/laptop">Laptop</a>
          </li>
          <li class="navigation-item">
            <a href="/shop/tablet">Tablet</a>
          </li>
          <li class="navigation-item">
            <a href="/shop/smartphone">Smartphone</a>
          </li>
        </ul>
      </li>
      <?php if("Framework\\Session\\Session"::getSessionKey("login")): ?>
      <li class="navigation-item <?=$pageTitle === "HistoryPage" ? "active" : "";?>">
        <a href="/history">History</a>
      </li>
      <li class="navigation-item <?=$pageTitle === "ProductPage" ? "active" : "";?>">
        <a href="">Other</a>
      </li>
      <?php endif ?>
      <li class="navigation-item">
        <search-area></search-area>
      </li>
    </ul>
  </div>
</nav>

