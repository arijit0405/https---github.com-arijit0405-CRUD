<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>People of Wakanda</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">ARIJIT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

</nav>


<div class="container my-5">
    <h2>List OF People</h2>
    <a class="btn btn-primary" href="/Proj2/add.php" role="button">Add User</a>
    <br>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $server= "localhost";
            $username= "root";
            $password= "";
            $database= "list";

            $connection= new mysqli($server,$username,$password,$database);

            if($connection->connect_error){
                die("connection failed"- $connection->connect_error);
            }

            $sql= "SELECT * FROM names";
            $result= $connection->query($sql);

            if(!$result){
                die("Invalid Query:" - $connection->error);
            }

            while($row= $result->fetch_assoc()){
                echo "
                  <tr>
                <td>$row[id]</td>
                <td>$row[name]</td>
                <td>$row[email]</td>
                <td>$row[phone]</td>
                <td>$row[Gender]</td>
                <td>$row[created_at]</td>
                <td>
                    <a class='btn btn-primary btn-sm' href='/proj2/edit.php?id=$row[id]'>Edit</a>
                     <a class='btn btn-primary btn-sm' href='/proj2/delete.php?id=$row[id]'>Delete</a>
                </td>
            </tr>
                ";
            }

            ?>

          
        </tbody>
    </table>

    
</div>


<footer>
    <p class="p-3 bg-dark text-white text-center">
        @All Right Reserved
    </p>
</footer>


    
</body>
</html>