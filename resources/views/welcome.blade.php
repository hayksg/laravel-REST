<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link href="/css/app.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
  </head>
  <body>

    <div class="parallax"></div>

    

    <div class="container">
      <h3>Hello world!</h3>

      

      <div id="google_translate_element"></div>

      <script type="text/javascript">
      function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
      }
      </script>

      <p>Translate this page:</p>

      <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

      <p>You can translate the content of this page by selecting a language in the select box.</p>

      <p>Scroll Up and Down this page to see the parallax scrolling effect.</p>

      

      <div style="height:1000px;background-color:red;font-size:36px">
      Scroll Up and Down this page to see the parallax scrolling effect.
      This div is just here to enable scrolling.
      Tip: Try to remove the background-attachment property to remove the scrolling effect.
      </div>



    </div>

    <div class="parallax2"></div>
  </body>
</html>
