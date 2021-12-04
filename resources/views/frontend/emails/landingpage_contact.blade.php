<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lead Contact</title>
</head>

<body>
    <h1>Hello {{$broker_name}},</h1>
    <p>Landing page form submitted below are the details: </p>
    <p>From: {{$data->fname}} {{$data->lname}}</p>
    <p>Email: {{$data->email}}</p>
    <p>Phone: {!!$data->phone!!}</p>
    <p>Message: {!!$data->message!!}</p>
    <p>Best,</p>
    <p>The Realysta Team</p>
</body>

</html>
