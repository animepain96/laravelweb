<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loop Demo</title>
</head>
<body>
    {{ $sum = 0 }}
    @for($i = 1; $i <=5; $i++)
        {{ $sum += $i }}
    @endfor

    @for($i = 1; $i <=5; $i++)
        Tong tu 1 -> 5 la: {{ $sum }} <br>
    @endfor
</body>
</html>
