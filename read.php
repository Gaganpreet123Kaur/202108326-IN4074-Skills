<?php
// Check existence of id parameter before processing further
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Include config file
    require_once "config.php";

    // Prepare a select statement
    $sql = "SELECT * FROM events WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Set parameters
        $param_id = trim($_GET["id"]);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 1) {
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // Retrieve individual field value
                $name = $row["name"];
                $address = $row["location"];
                $salary = $row["price"];
            } else {
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($link);
} else {
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Records</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 900px;
            margin: 0 auto;
            color: darkgreen;
        }
        .form-group {
            color: black;
        }
        
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">View Records</h1><br>

                    <img src="https://images.twinkl.co.uk/tw1n/image/private/t_550/image_repo/61/77/T-M-1501-Reading-Record-Cover_ver_2.avif"><br>
                    <div class="form-group" >
                        <label><b>Name-</b></label>
                        <p><?php echo $row["name"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label><b>Location-</b></label>
                        <p><?php echo $row["location"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label><b>Ticket_price-</b></label>
                        <p><?php echo $row["price"]; ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>