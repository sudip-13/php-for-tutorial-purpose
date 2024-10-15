<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tod-list";


$conn = new mysqli($servername, $username, $password, $dbname);
$insert = false;
$update = false;
$delete = false;
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_GET['delete'])) {
    $slNo = $_GET['delete'];
    $sql = "DELETE FROM  `crud` WHERE `Sl. No.`='$slNo'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // echo "Record deleted successfully";
        $delete = true;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['sNoEdit'])) {
        $sNoEdit = $_POST['sNoEdit'];
        $title = $_POST['titleEdit'];
        $description = $_POST['descEdit'];

        $sql = "UPDATE `crud` SET `Note Title` ='$title',`Note Description` = '$description' WHERE `crud`.`Sl. No.` = '$sNoEdit'  ";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            // echo "New record created successfully";
            $update = true;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

    } else {

        $title = $_POST['title'];
        $description = $_POST['desc'];

        $sql = "INSERT INTO `crud` (`Sl. No.`, `Note Title`, `Note Description`, `createdAt`) VALUES (NULL,'$title' ,'$description' , current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            // echo "New record created successfully";
            $insert = true;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php-Curd</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">


</head>

<body>
    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button> -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="edit">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/phpt/CURD/?update=true" method="post">
                        <input type="hidden" name="sNoEdit" id="sNoEdit">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Note Title</label>
                            <input type="text" class="form-control" id="titleEdit" name="titleEdit"
                                aria-describedby="emailHelp">
                            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                        </div>
                        <div class="form-floating mb-3">

                            <textarea class="form-control" placeholder="Leave a comment here" id="descEdit"
                                name="descEdit"></textarea>
                            <label for="floatingTextarea">Note Description</label>
                        </div>

                        <!-- <button type="submit" class="btn btn-primary">Update Note</button> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PHP CURD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/phpt/CURD/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/phpt/contactus.php">Contact US</a>
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
    if ($insert) {
        echo "<div class='alert alert-success' role='alert'>New Note Added Successfully.</div>";
    }
    if ($update) {
        echo "<div class='alert alert-success' role='alert'>Note updated Successfully.</div>";
    }
    if ($delete) {
        echo "<div class='alert alert-success' role='alert'>Note deleted Successfully.</div>";
    }
    ?>
    <div class="container my-4">
        <h1>Add a Note</h1>
        <form action="/phpt/CURD/" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Note Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="form-floating mb-3">


                <textarea class="form-control" placeholder="Leave a comment here" id="desc" name="desc"></textarea>
                <label for="floatingTextarea">Note Description</label>
            </div>

            <button type="submit" class="btn btn-primary">Add Note</button>
        </form>
    </div>

    <div class="container">

        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Serial No.</th>
                    <th scope="col">Note Title</th>
                    <th scope="col">Note Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- $row['Sl. No.']  -->

                <?php
                $sql = "SELECT * FROM `crud`";
                $result = mysqli_query($conn, $sql);
                $slNo = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $slNo++;
                    echo "<tr>
                    <td>" . $slNo . "</td>
                    <td>" . $row["Note Title"] . "</td>
                    <td>" . $row["Note Description"] . "</td>

                    <td > <button type='button' class='edit btn btn-primary' id=" . $row['Sl. No.'] . ">Edit</button> <button type='button' class='delete btn btn-danger'  id=" . 'd' . $row['Sl. No.'] . ">DELETE</button></td>
                </tr>";
                    // echo " Title " .. " Description " . $row["Note Description"] . " CreatedDate " .  . "<br>";
                
                }

                ?>


            </tbody>
        </table>
    </div>
    <hr>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script> let table = new DataTable('#myTable');</script>
    <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener('click', (e) => {
                // console.log("edit ",e.target.parentNode.parentNode)
                tr = e.target.parentNode.parentNode
                title = tr.getElementsByTagName('td')[1].innerText;
                desc = tr.getElementsByTagName('td')[2].innerText;
                titleEdit.value = title;
                descEdit.value = desc;
                $('#exampleModal').modal('toggle');
                // console.log(title, desc)
                sNoEdit.value = e.target.id;
                console.log("target id", e.target.id)
            })
        })

        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener('click', (e) => {
                if (confirm('Are you sure you want to delete')) {
                    // console.log("Yes ",e.target.id);
                    sNO = e.target.id.substr(1,)
                    window.location = `/phpt/CURD/?delete=${sNO}`;
                }
                else {
                    console.log("NO");
                    // console.log("No ",e.target.id);
                    //  return false; // cancel the delete action if user clicks No button.

                }

            })
        })
    </script>

</body>

</html>