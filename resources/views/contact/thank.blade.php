<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thank you</title>
  <link rel="stylesheet" href="{{ asset('css/thank.css') }}">
</head>

<body>
  <div class="thanks-box">
    <p class="thanks-message">お問い合わせありがとうございました</p>
    <a href="{{ route('contact.index') }}" class="thanks-home-btn">HOME</a>
  </div>
</body>

</html>