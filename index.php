<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container my-5"></div>
    <h2>List of Patients</h2>
    <a class="btn btn-primary" href="/website/create.php" role="button">New Patients</a>
    <br>
    <nav class="navbar">
            <a href="hcup.html">Home</a>
            <a href="#about">About</a>
            <a href="#">Appointment</a>
            <a href="Medicine.html">Medicine</a>
            <a href="contact.html">Contact</a>
        </nav>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Created At</th>
                <th>Hospital Name</th>
                <th>Hospital Phone</th>
                <th>Hospital Address</th>
                <th>Booking Date</th>
                <th>Booking Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "my";

            //Create connection
            $connection = new mysqli($servername, $username, $password, $database);

            if ($connection->connect_error) {
                die("Connection Failed: " . $connection->connect_error);
            }

            $sql = "SELECT * FROM clients";
            $result = $connection->query($sql);

            if (!$result) {
                die("Invalid query: " . $connection->error);
            }

            while($row = $result->fetch_assoc()) {
                echo "
                <tr>
                <td>$row[id]</td>
                <td>$row[name]</td>
                <td>$row[email]</td>
                <td>$row[phone]</td>
                <td>$row[address]</td>
                <td>$row[created_at]</td>
                <td>$row[hosname]</td>
                <td>$row[hosphone]</td>
                <td>$row[hosaddress]</td>
                <td>$row[bookdate]</td>
                <td>$row[booktime]</td>
                <td>
                    <a class='btn btn-primary btn-sm' href='/website/edit.php?id=$row[id]'>Edit</a>
                    <a class='btn btn-danger btn-sm' href='/website/delete.php?id=$row[id]'>Delete</a>
                </td>
            </tr>
                ";
            }
            ?>

        </tbody>
    </table>
</body>
</html>