<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h3 class="text-center my-5">Register</h3>
        <form method="post" action="/php/index.php" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="txtFirstName" name="FirstName" placeholder="First Name" required>
                        <label for="txtFirstName">First Name</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="txtLastName" name="LastName" placeholder="Last Name" required>
                        <label for="txtLastName">Last Name</label>
                    </div>
                </div>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" id="txtDOB" name="DOB" placeholder="DOB" type="date" required>
                <label for="txtDOB">DOB</label>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" id="txtContact" name="Contact" placeholder="Contact No." type="number" required>
                <label for="txtContact">Contact No.</label>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" id="txtEmail" name="Email" placeholder="Email" type="email" required>
                <label for="txtEmail">Email</label>
            </div>

            <div class="mb-3">
                <label for="txtImage" class="form-label">Image</label>
                <input class="form-control" type="file" id="txtImage" name="Image" required>
            </div>

            <div class="mb-3">
                <label for="txtResume" class="form-label">Resume</label>
                <input class="form-control" type="file" id="txtResume" name="Resume" required>
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>

        <ul class="mt-5 text-danger">
            <?php
            session_start();

            if (!empty($_SESSION["Message"]))
                echo $_SESSION["Message"]
            ?>
        </ul>
    </div>
</body>

</html>