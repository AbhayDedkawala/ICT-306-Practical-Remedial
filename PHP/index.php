<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php

    session_start();

    $Message = "";
    $Folder = "Images/";

    if (empty($_POST["FirstName"]))
        header("Location: /php/Register.php");

    $ProfileImage = $Folder . basename($_FILES["Image"]["name"]);
    $Resume = $Folder . basename($_FILES["Resume"]["name"]);

    if (!preg_match("/^[a-zA-z]*$/", $_POST["FirstName"]))
        $Message = $Message . "<li>First Name must be contains only alphabets.</li>";

    if (!preg_match("/^[a-zA-z]*$/", $_POST["LastName"]))
        $Message = $Message . "<li>Last Name must be contains only alphabets.</li>";

    if (strlen($_POST["Contact"]) != 10)
        $Message = $Message . "<li>Mobile must have 10 digits.</li>";

    if (strtolower(pathinfo($ProfileImage, PATHINFO_EXTENSION)) != "jpg")
        $Message = $Message . "<li>Profile Image must be jpg formate.</li>";

    if (strtolower(pathinfo($Resume, PATHINFO_EXTENSION)) != "pdf")
        $Message = $Message . "<li>Resume must be pdf formate.</li>";

    if (strlen($Message) > 0) {
        $_SESSION["Message"] = $Message;
        header("Location: /php/Register.php");
    }

    move_uploaded_file($_FILES["Image"]["tmp_name"], $ProfileImage);
    move_uploaded_file($_FILES["Resume"]["tmp_name"], $Resume);
    ?>

    <div class="container text-center">
        <h3 class="my-5">Profile Detail</h3>

        <img src="<?php echo $ProfileImage ?>" alt="Profile Image" class="float-left img-fluid mb-3 w-50" />
        <p><b>First Name : </b> <?php echo $_POST["FirstName"] ?></p>
        <p><b>Last Name : </b> <?php echo $_POST["LastName"] ?></p>
        <p><b>Email : </b> <?php echo $_POST["Email"] ?></p>
        <p><b>Contact No : </b> <?php echo $_POST["Contact"] ?></p>
        <p><b>DOB : </b> <?php echo $_POST["DOB"] ?></p>
        <p><b>Resume : </b> <a href="<?php echo $Resume ?>" target="_blank">Resume</a></p>
    </div>
</body>

</html>