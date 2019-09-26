<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demo Login</title>
</head>
<body>
@if(!empty($isValid) && $isValid)
    @php
        $sum = 0
    @endphp
    @for($i = 0; $i < 5; $i++)
        @php
            $sum += $i
        @endphp
    @endfor

    @for($i = 0; $i < 5; $i++)
        Tong tu 1->5 la: {{ $sum }} <br>
    @endfor
@elseif (!empty($username) && !empty($password))
    Username: {{ $username }} <br>
    Password: {{ $password }}
@else
    <form method="post">
        @csrf
        <table>
            <tr>
                <td>Username:</td>
                <td>
                    <input name="username" type="text"/>
                </td>
            </tr>
            <tr>
                <td>Password:</td>
                <td>
                    <input name="password" type="password"/>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button name="login" type="submit">Login</button>
                </td>
            </tr>
        </table>
    </form>
@endif
</body>
</html>
