<main class="authorization">
  <div class="wrapper">
    <form class="form" method="post" action="/registration">
      <label class="form-input">
        <input type="text" placeholder="Login" name="login">
      </label>
      <label class="form-input">
        <input type="email" placeholder="Email" name="email">
      </label>
      <label class="form-input">
        <input type="password" placeholder="Password" name="password">
      </label>
      <label class="form-input">
        <input type="password" placeholder="Password Confirm" name="confirm_password">
        </label>
      <input type="submit" value="Sign Up">
      <div>
        Already registered? => <a href="/login"><i class="fas fa-user-check"></i></a>
      </div>
    </form>
  </div>
</main>