<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lead Contact</title>
</head>

<body>
    <h1>Hello {{$data->lead_name}},</h1>
    <p>From: {{$data->email}} </p>
    <p>Message: {!!$data->message!!}</p>
</body>

</html>