<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <style>
        body{
            background-color: rgb(122, 0, 133);
        }
        header{
    color: whitesmoke;
    font-size: 40px;
    font-weight: 600;
    text-decoration-line: underline;
    text-decoration-color: whitesmoke;
    margin-top: 10px;
}

    </style>
    <title>Regitration</title>
</head>

<body>

<div class="box d-flex justify-content-center">
        <header>Regitration</header>
    </div>

    <div class="container" style="border: 2px solid black; padding-top:10px; margin-top: 20px; background-color: white; width: 400px; border-radius: 10px; padding-bottom:10px;">

    <form action="{{route('registered')}}" method="post">
    @csrf
  
    <input type="text" name="using" value="link" style="display:none;background-color:lightgrey;" placeholder="">

    <br>

    <div style="display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;">
    <label for="name">Name:</label><br>
    <input type="text" name="name" placeholder="Enter Name">
    @error('name')
        <span style="color:red">{{$message}}</span>
    @enderror
</div>
    
    <br>

    <div style="display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;">
    <label for="email">Email:</label><br>
    <input type="email" name="email" placeholder="Enter Email">
    @error('email')
        <span style="color:red">{{$message}}</span>
    @enderror
</div>

    <br>

    <div style="display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;">
    <label for="invite_code">Invite Code:</label><br>
    <input type="text" name="invite_code" value="{{$invite}}" style="pointer-events:none;background-color:lightgrey;" placeholder="Enter Invite Code (Optional)">
</div>

    <br>

    <div style="display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;">
    <label for="password">Password:</label><br>
    <input type="password" name="password" placeholder="Enter Password">
    @error('password')
        <span style="color:red">{{$message}}</span>
    @enderror
</div>
    
    <br>

    <div style="display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;">
    <label for="password_confirmation">Confirm Password:</label><br>
    <input type="password" name="password_confirmation" placeholder="Confirm Password">
</div>
    <br>

    <div style="display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;">
    <input type="submit" value="Register" class="btn btn-primary">
</div>
</form>

@if(Session::has('success'))
    <p style="color:green">{{Session::get('success')}}</p>
@endif

@if(Session::has('error'))
    <p style="color:red">{{Session::get('error')}}</p>
@endif

<a href="login">
Go to Login Page!!
</a>
</div>
</body>
</html>