<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no,
                 initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?=$pageTitle?></title>
  <link href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet"/>
  <link rel="stylesheet" href="/styles/main.css" type="text/css">
  <script defer src="/scripts/main.js"></script>
</head>
<body>
  <div id="app">
  <?php
    require_once COMPONENTS . DS . "header.php";
    require_once COMPONENTS . DS . "navigation.php";
    echo $content;
    require_once COMPONENTS . DS . "footer.php";
    ?>
  </div>
</body>
</html>