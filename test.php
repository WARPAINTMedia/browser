<?php
require('Browser.php');
$browser = new Browser($_SERVER['HTTP_USER_AGENT']);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Browser Class</title>
  <style type="text/css" media="screen">
    body.google-chrome.mac {
      color: white;
      background: #333;
    }
  </style>
</head>
<body class="<?php echo $browser->get_browser().' '.$browser->get_platform() ?>">
  <div class="content">
    <pre><?php var_dump($browser->get_results()); ?></pre>
  </div>
</body>
</html>