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

table{
  border: 1px solid;
}

th, td {
  border-bottom: 1px solid #ddd;
  text-align: center;

}

th {
  background-color: #04AA6D;
  color: white;
}


tr:nth-child(even) {background-color: #f2f2f2;}


    </style>
    <title>Welcome {{$userData->name}}</title>
</head>
<body>


<div class="box d-flex justify-content-center">
<header>Welcome {{$userData->name}}</header>
</div>

<div style="margin-left: 10px; background-color: white; width: 350px; padding: 5px; border: 2px solid red; border-radius: 6px;">
<form action="{{route('sendinvite',['id'=>$userData->id])}}" method="post">
    @csrf
    
    <input type="email" name="email" id="" placeholder="Enter Email" style="width:300px;">
    <br>
    @error('email')
    <span style="color:red;">
{{$message}}
</span>
@enderror

<br>
<input type="submit" value="Send Invite" style="margin-top:5px;" class="btn btn-success">
</form>

@if(Session::has('success'))
    <p style="color:green">{{Session::get('success')}}</p>
@endif

</div>

<br>
<hr>
<br>
<div class="container" style="border: 2px solid red; background-color: white; width: 80%; padding: 10px;">


<div class="d-flex justify-content-center align-items-center">
<h3 >Your Networks:</h3>
</div>
<hr>
<div class="d-flex justify-content-center align-items-center">
<table  style="width:80%;">
    <thead>
            <tr> 
                <th style="width:10%;">
                    Id
                </th>
                <th style="width:20%;">
                    Name
                </th>
                <th style="width:30%;">
                    Email
                </th>
                <th style="width:20%;">
                    Joined Using
                </th>
            </tr>
    </thead>
    <tbody>
        @foreach($network as $user)
        <tr>
            <td>
            {{$user->user_id}}
            </td>
            <td>
            {{$user->user_name}}
            </td>
            <td>
            {{$user->user_email}}
            </td>
            <td>
            {{$user->using}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

</div>
</body>
</html>