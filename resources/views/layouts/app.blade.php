<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
      h1 {
        text-align: center;
        margin-top: 50px;
      }
    </style>
  </head>
  <body>
    <h1>@yield('title')</h1>
    <div class="content">
    @yield('content')
    </div>
</body>
<script src="https://ajaxzip3.github.io/ajaxzip3.js"></script>
</html>