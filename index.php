<?php
require_once __DIR__ . "/init/init.php"
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php require_once __DIR__ . "/template/style_template.php" ?>
</head>

<body>
  <?php require_once __DIR__ . "/template/header_template.php" ?>
  <div class="container">
    <div class="row">
      <?php require_once __DIR__ . "/template/filter_col.php" ?>
      <?php require_once __DIR__ . "/template/results_col.php" ?>
    </div>
  </div>
  <?php require_once __DIR__ . "/template/script_template.php" ?>
</body>

</html>