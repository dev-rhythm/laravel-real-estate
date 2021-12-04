<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Client</title>
</head>

<body>
    <h1>Hello {{$user->fname}}</h1>
    <p>
        You've been invited to Realysta <br>
        Here are your Credentials
        <p>Username: {{$user->email}}</p>
        <p>Password: {{$password}}</p>
        <a href="https://realysta.com/#loginmodal">Click Here to Login</a>
    </p>
</body>

</html>