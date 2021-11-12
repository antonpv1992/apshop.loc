<div class="wrapper">
  <header class="header">
    <h1 class="logo">
      <a href="/">
        ap<span>Electronics</span>
      </a>
    </h1>
    <div class="cart-wrapper">
    <?php if("Framework\\Session\\Session"::getSessionKey("login")): ?>
      <cart-button></cart-button>
    <?php endif ?>
    </div>
  </header>
</div>