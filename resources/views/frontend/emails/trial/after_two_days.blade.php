<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Client</title>
</head>

<body>
    <h3 style="text-align:left;">Dear {{$user->fname}}</h3>

    <p>
        Your Realysta free membeship expired! But don’t worry, your pages are not lost! If you like how your pages
        looked you can activate your paid membership and keep showcasing you properties by clicking <a
            href="{{route('billing')}}">this link</a>:
    </p>

    <p>
        Didn’t have enough time to check it out? You can also reactivate a 1 week free membership by clicking <a
            href="{{route('user_dashbaord')}}">this link</a>:
    </p>

    <p>
        If you need any assistance please don’t hesitate to contact us, we’ll be happy to help!
    </p>

    <p>Best,</p>
    <p>The Realysta Team</p>
</body>

</html>
