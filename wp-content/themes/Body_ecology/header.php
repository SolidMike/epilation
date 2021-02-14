<!DOCTYPE html>
<html lang="ru">
  <head>
    <?php $template_url = get_template_directory_uri(); ?>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Epilation</title>
    <meta name="description" content="Description"/>
    <meta name="keywords" content="Keywords"/>
    <link rel="icon" type="image/png" href="favicon.png"/>
    <link rel="stylesheet" href="<?php echo $template_url; ?>/css/libs.min.css"/>
    <link rel="stylesheet" href="<?php echo $template_url; ?>/css/style.min.css"/>
    <script>
      function fixIE(url) {
          var headID = document.getElementsByTagName('head')[0];
          var link = document.createElement('link');
          link.type = 'text/css';
          link.rel = 'stylesheet';
          headID.appendChild(link);
          link.href = url + '/fix-ie.css';
      };
      function checkIE() {
        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE ");
        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))  // If Internet Explorer, return version number
        {
          //- alert('Fucking IE!!!');
          fixIE('css'); // Ссылка на файл стилей fix-ie.css
        }
        else  // If another browser, return 0
        {
          //- alert('Other Browser');
        }
        return false;
      }
      checkIE();
    </script>

    <?php wp_head(); ?>
  </head>