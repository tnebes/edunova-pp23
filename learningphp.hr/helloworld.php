
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foundation for Sites</title>
    <link rel="stylesheet" href="assets/css/foundation.css">
  </head>
<body>

    <div class="grid-container">
      <?php
        require_once 'menu.php';
      ?>
      <div class="grid-x grid-padding-x">
        <div class="large-6 cell">
          <pre>
            echo 'Hello, world!';
          </pre>
        </div>
        <div class="large-6 cell">
          <?php

            print 'Hello, world!<br/>';
            echo 'Hello, world!';
            echo "Hello\n";
            echo "New line \n";

          ?>
        </div>
      </div>
    </div>

<script src="assets/js/vendor.js"></script>
<script src="assets/js/foundation.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>
