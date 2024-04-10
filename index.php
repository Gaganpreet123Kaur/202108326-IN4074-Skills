<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Events</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }

        table tr td:last-child {
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
<header>
     <!--Name- Gaganpreet Kaur  Student Id-202108326-->
      <h1>WELCOME TO JOBS CANADA FAIR</h1>

      <h2>CANADA'S MOST ESTABLISHED CAREER FAIRS SINCE 2010.</h2>
      <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li>
            <a href="ReNewCanadaCareerFair.html">ReNew Canada Career Fair</a>
          </li>
         <li>
            <a href="MississuagaCareerFair.html">Mississuaga Career Fair</a>
          </li>
          <li><a href="MrkhamCareerFair.html">Markham Career Fair</a></li>
          <li><a href="TorontoJobFair.html">Toronto Job Fair</a></li>
          <li><a href="Proporsal.html">Proporsal</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <p></p>
      <img
        class="frontImage"
        src="https://img.freepik.com/free-vector/organic-flat-design-join-us-concept_23-2148944480.jpg?size=626&ext=jpg&ga=GA1.1.345508499.1701565086&semt=ais"
        alt="Events Cover"
      />
      <hr />
      <section>
        <h2>Introduction</h2>
        <p>
          Welcome to Canada's leading destination for thousands of attendees and
          hundreds of exhibitors since 2010.With a proven record of numerous
          successful stories,Jobs Canada Fair brings together varoius
          industries,sectors and visistors across te country.We aim to inspire
          industries,provide professional support,facilitate valuable
          connections, and create opportunities that lead to fulfilling careers
          and organizational growth. With more than 75 Career fairs held each
          year, jobs canada fair support Canada's employment market since 2010.
        </p>
      </section>
      <hr />
      <section>
        
        <h2>Upcoming Events</h2>
        <table>
          <tr>
            <th>Event</th>
            <th>Date</th>
            <th>Location</th>
          </tr>
          <tr>
            <td>ReNew Canada Career Fair</td>
            <td>Tuesday, January 30, 2024</td>
            <td>789 Yonge St, Toronto</td>
          </tr>
          
           
          <tr>
            <td>Mississauga Career Fair</td>
            <td>Wednesday,  February 7, 2024 </td>
            <td>Mississauga</td>
          </tr>
          <tr>
            <td>Markham Career Fair</td>
            <td>Friday, Feb 16, 2024</td>
            <td>Markham</td>
          </tr>
          <tr>
            <td>Toronto Job Fair</td>
            <td>Thursday, March 20, 2024</td>
            <td>Toronto</td>
          </tr>
        </table>
      </section>
      
      
        
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="mt-5 mb-3 clearfix">
                   
                        <h2 class="pull-left">Events Details</h2>
                        <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Event</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";

                    // Attempt select query execution
                    $sql = "SELECT * FROM events";
                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo '<table class="table table-bordered table-striped">';
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>#</th>";
                            echo "<th>Name</th>";
                            echo "<th>Location</th>";
                            echo "<th>Ticket_price</th>";
                            echo "<th>Action</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['location'] . "</td>";
                                echo "<td>" . $row['price'] . "</td>";
                                echo "<td>";
                                echo '<a href="read.php?id=' . $row['id'] . '" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                echo '<a href="update.php?id=' . $row['id'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                echo '<a href="delete.php?id=' . $row['id'] . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else {
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Close connection
                    mysqli_close($link);
                    ?>
                
            </div>
        </div>
    </div>
    <p>
    <section>
        <h2>Contact Us</h2>
          Hi, Thanks for visiting this website.If you have any query please
          contact 64768421** or gk12781@gmail.com .
        </p>
      </section>
      <hr />
    </main>
    <footer>
      <p>&copy; 2024 My Events. All rights reserved.</p>
    </footer>
</body>

</html>