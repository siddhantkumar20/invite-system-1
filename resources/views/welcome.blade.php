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

.box1{
    height:60vh;
}

img{
    height: 200px;
    width: 200px;
}

.butn{
    display: flex;
    flex-direction: column;
    background-color: rgb(240, 240, 240);
    border-radius: 10px;
}
button{
    width:200px;
}
    </style>
    
    <title>Invitation System</title>
</head>
<body>
    <div class="container">
    <div class="box d-flex justify-content-center">
        <header>Welcome to the Invitation System</header>
    </div>
    
    <br><br>
    
    <div class="box1 d-flex justify-content-center align-items-center">
    
    <div class="box butn">
    <img src="https://static.vecteezy.com/system/resources/previews/009/636/683/original/admin-3d-illustration-icon-png.png" alt="">
    <a href="admin">
        <button class="btn btn-success">Admin</button>
    </a>
    </div>
    
    <br><br>
    
    <div class="box butn" style="margin-left: 150px;">
    <img src="https://icon-library.com/images/admin-icon-png/admin-icon-png-6.jpg" alt="">
    <a href="login">
        <button class="btn btn-success">User</button>
    </a>
    </div>
    </div>
</div>
</body>
</html>