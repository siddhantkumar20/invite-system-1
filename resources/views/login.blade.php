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
    <title>Login Page</title>
</head>
<body>
    
    <div class="box d-flex justify-content-center">
        <header>Login Page</header>
    </div>

    <div class="container" style="border: 2px solid black; padding-top:10px; margin-top: 20px; background-color: white; width: 400px; border-radius: 10px;">
    <form action="{{route('login')}}" method="post">
    @csrf
    <div style="display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;">
    <label for="email">Email:</label><br>
    <input type="email" name="email" placeholder="Enter Email" value="{{old('email')}}">
    @error('email')
    <span style="color:red;">
{{$message}}
</span>
@enderror
</div>
<br>

<div style="display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;">
<label for="email">Password:</label><br>
<input type="password" name="password" id="" placeholder="Enter Password">
    @error('password')
    <span style="color:red;">
{{$message}}
</span>
@enderror
</div>
<br>
<div style="display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;">
<input type="submit" value="Login" class="btn btn-primary">
</div>
</form>

@if(Session::has('error'))
    <p style="color:red">{{Session::get('error')}}</p>
@endif

<br>
<a href="register">
    Registration Page!!
</a>

</div>
</body>
</html>