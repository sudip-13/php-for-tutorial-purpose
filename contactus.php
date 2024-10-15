


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container-fluid">
            <a class="navbar-brand " href="#">Get/Post</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/phpt/contactus.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Link
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Link</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = htmlspecialchars($_POST['email']);
        $name = htmlspecialchars($_POST['name']);

        $description = htmlspecialchars($_POST['description']);



        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Phpt";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // echo "Connected successfully <br>";

        $sql = "INSERT INTO `employees` (`Sl. No.`, `Name`, `Email`, `Concern`, `timestamp`) VALUES (NULL, '$name', '$email', '$description', current_timestamp())";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<div class="alert alert-success" role="alert">
                <strong>Successfully submitted email address is: </strong>' . $email . '<br>
                <strong>name is: </strong>' . $name . '<br> <strong>Description is: </strong>' . $description . '
              </div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">
            <strong>Error: </strong>' ."We are facing some technical issue and your entry was not submitted successfully! we regret the inconvinience caused". '
          </div>';
        }
    }
    ?>
    <div class="container mt-3">
        <h1>Contact Us for your Concerns</h1>
        <form action="/phpt/contactus.php" method="Post">
            <div class="mb-3 ">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3 ">
                <label for="exampleInputEmail1" class="form-label">Enter your Name</label>
                <input type="name" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="name">

            </div>

            <div class="mb-3 ">
                <label for="exampleInputEmail1" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>