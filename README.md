Browser Class
=============

A very simple class that takes in a user agent string and returns the browser name (Firefox, Chrome, Opera, etc.) and also the Operating System (Mac, Windows, Android, etc.).

### Reasons

Firstly, you *should not* use browser sniffing for fearture detection, [use Modernizr](http://modernizr.com/).

We mainly use this for style tweaks between different browsers. Or sometimes you may need to add a little script (device-specific polyfill) or tweak on a specific platform combination and so you might do a check to see if that makes sense.

The results are pretty crude. We only return `internet-explorer` if IE is found. There is *no version information*. For the platform, we only return that operation system. This means all iOS devices (iPad, iPhone, iPod) would only return `ios`. If you need to know specifics about the device, [use media queries](http://stephen.io/mediaqueries/).

### Support

**Platforms**

* Linux
* Ios
* Mac
* Windows
* Android
* Blackberry

**Browsers**

* MSIE
* Trident
* Vivaldi
* Firefox
* Chrome
* Opera
* Opera Mini
* Safari

### Usage

```php
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
      background: red;
    }
  </style>
</head>
<body class="<?php echo $browser->get_browser().' '.$browser->get_platform() ?>">
  <div class="content">
    <pre><?php var_dump($browser->get_results()); ?></pre>
  </div>
</body>
</html>
```

Results for Chrome on a Macbook:

```html
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Browser Class</title>
</head>
<body class="google-chrome mac">
  <div class="content">
    <pre>array(3) {
      ["ua"]=>
      string(120) "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.35 Safari/537.36"
      ["platform"]=>
      string(3) "mac"
      ["browser"]=>
      string(13) "google-chrome"
    }</pre>
  </div>
</body>
</html>
```