<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no,
                 initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Main page</title>
  <link href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet" />
  <link rel="stylesheet" href="styles/main.css">
  <script defer src="scripts/main.js"></script>
</head>
<body>
  <?php
  include_once COMPONENTS . "header.php";
  include_once COMPONENTS . "navigation.php";
  echo $content;
  include_once COMPONENTS . "footer.php";
  
  ?>
</body>
</html>