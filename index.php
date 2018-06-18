<?php require_once __DIR__ . '/reactkit/vendor/autoload.php'; use Reactkit\Reactkit; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reactkit Demo</title>
  </head>
  <body>
    <?php
      $kit = new Reactkit('http://localhost:3000');

      $kit->render('App', [
        'name' => 'Fredrik'
      ]);

      $kit->render('Demo', [
        'name' => 'Rasmus'
      ]);
    ?>

    <script src="https://unpkg.com/react@16.1.1/umd/react.development.js"></script>
    <script src="https://unpkg.com/react-dom@16.1.1/umd/react-dom.development.js"></script>
    <script src="static/js/main.js"></script>

    <?php
        $kit->hydrate();
    ?>
  </body>
</html>
