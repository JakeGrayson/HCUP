<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "my";

// Create a database connection
$connection = new mysqli($servername, $username, $password, $database);

$name = "";
$email = "";
$phone = "";
$address = "";
$hosname = "";
$hosphone = "";
$hosaddress = "";
$bookdate = "";
$booktime = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $hosname = $_POST["hosname"];
    $hosphone = $_POST["hosphone"];
    $hosaddress = $_POST["hosaddress"];
    $bookdate = $_POST["bookdate"];
    $booktime = $_POST["booktime"];

    try {
        if (empty($name) || empty($email) || empty($phone) || empty($address) || empty($hosname) || empty($hosphone) || empty($hosaddress) || empty($bookdate) || empty($booktime)) {
            throw new Exception("All the fields are required");
        }

        // Add new client to the database
        $sql = "INSERT INTO clients (name, email, phone, address, hosname, hosphone, hosaddress, bookdate, booktime)" .
            "VALUES ('$name', '$email', '$phone', '$address', '$hosname', '$hosphone', '$hosaddress', '$bookdate', '$booktime')";
        $result = $connection->query($sql);

        if (!$result) {
            throw new Exception("You already have this data: " . $connection->error);
        }

        $name = "";
        $email = "";
        $phone = "";
        $address = "";
        $hosname = "";
        $hosphone = "";
        $hosaddress = "";
        $bookdate = "";
        $booktime = "";


        $successMessage = "Client added correctly";

        header("location: /website/index.php");
        exit;
    } catch (Exception $e) {
        $errorMessage = $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="create.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>New Client</h2>

        <?php
        if (!empty($errorMessage)){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong> 
            <button type='button' class='btn-close data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
            
        }
        ?>

        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Hospital Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="hosname" value="<?php echo $hosname; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Hospital Phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="hosphone" value="<?php echo $hosphone; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Hospital Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="hosaddress" value="<?php echo $hosaddress; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Book Date</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="bookdate" value="<?php echo $bookdate; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Book Time</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="booktime" value="<?php echo $booktime; ?>">
                </div>
            </div>

            <?php
            if (!empty($successMessage)) {
                echo"
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage<strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/website/index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>