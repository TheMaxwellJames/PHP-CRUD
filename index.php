<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
     crossorigin="anonymous">
</head>
<body>
    
    <div class="container my-5">
    <h2>List of Clients</h2>
    <a href="/myshop/create.php" class="btn btn-primary" role="button">New Client</a>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $servername = "localhost";
                $username = "root";
                $password ="";
                $database = "myshop";

                // Create Connection with database
                $connection = new mysqli($servername, $username, $password, $database);


                // Check Connection
                if($connection->connect_error)
                {
                    die('connection failed:' . $connection->connect_error);
                }


                // Read all row from database table
                $sql = "SELECT * FROM clients";
                $result = $connection->query($sql);

                if (!$result){
                    die("Invalid query:" . $connection->error );
                }

                // Read data of each row
                while($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>$row[created_at]</td>
                    <td>
                        <a href='/myshop/edit.php?id=$row[id]' class='btn btn-primary btn-sm'>Edit</a>
                        <a href='/myshop/delete.php?id=$row[id]' class='btn btn-danger btn-sm' onclick='alert('Sure to delete?')'>Delete</a>
                    </td>
                </tr>
                    ";
                }
            ?>
            
        </tbody>

    </table>
    </div>



   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
   integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>
</html>