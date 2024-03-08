<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$data['title']}}</title>
</head>
<body>
    <p>Hi {{$data['name']}}, Welcome to Invite System!</p>
    <p>You can now login using your credentials: </p>
    <p><b>Email: </b> {{ $data['email'] }} </p>
    <p><b>Password: </b> {{ $data['password'] }} </p>

    <p>You can now share your <a href="{{$data['url1']}}">Invite link</a></p>
    <p>OR</p>
    <p>You can share your invite code <b>{{$data['inviteCode']}}</b></p><br>
    <p>User can register here <a href="{{$data['url2']}}">Registration link</a> using invite code</p>

    <p>Thank You!!!</p>

</body>
</html>