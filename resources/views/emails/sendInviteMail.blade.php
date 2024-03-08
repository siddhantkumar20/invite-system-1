<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$data['title']}}</title>
</head>
<body>
    <p>Hello {{ $data['email'] }}, 
    <p>Your friend {{ $data['sendername'] }} with email Id {{$data['sender']}} has invited you to Invite System</p>
    </p>

    <p>You can Register using <a href="{{$data['url1']}}">Invite link</a></p>
    <p>OR</p>
    <p>You can use invite code <b>{{$data['inviteCode']}}</b></p><br>
    <p>You can register here <a href="{{$data['url2']}}">Registration link</a> using invite code</p>

    <p>Thank You!!!</p>

</body>
</html>