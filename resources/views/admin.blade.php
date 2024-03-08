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
    <title>Admin Dashboard</title>
</head>
<body>

<div class="box d-flex justify-content-center">
<header>Welcome Admin</header>
</div>
<hr>

<div class="d-flex justify-content-center align-items-center" style="color: white;">
<h3 >People who joined using invite:</h3>
</div>

<div class="d-flex justify-content-center align-items-center">
    
<table  style="width:80%;background-color:burlywood;">
    <thead>
            <tr> 
                <th>Sender Id</th>
                <th>Sender Name</th>
                <th>Sender Email</th>
                <th>Joiner Id</th>
                <th>Joiner Name</th>
                <th>Joiner Email</th>
                <th>Joined Using</th>
            </tr>
    </thead>
    <tbody>
        @foreach($network as $user)
        <tr>
            <td>
                {{$user->parent_user_id}}
            </td>
            <td>
                {{$user->parent_user_name}}
            </td>
            <td>
                {{$user->parent_user_email}}
            </td>
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


</body>
</html>