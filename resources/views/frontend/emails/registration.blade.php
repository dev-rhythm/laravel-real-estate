<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Client</title>
</head>

<body>
    <h1 style="text-align:left;">Dear {{$user->fname}}</h1>
    <p>
        Thank you for registering at Realysta, we’re excited to have you with us!
    </p>
    <p>
        Your free trial will last for 1 week, after which you can activate your favorite plan.
    </p>
    <p>Please click the link below to activate your account.</p>

    <p> <a href="{{route('verify_token', $user->email_token)}}">Verify Email</a></p>

    <p>Thanks,</p>
    <p>The Realysta Team</p>
</body>

</html>
