<?php
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $course = $_POST['course'];

    $photoName = '';
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $photoName = basename($_FILES['photo']['name']);
        $uploadFile = $uploadDir . $photoName;

        if (!move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
            echo "<script>alert('Failed to upload photo');</script>";
            $photoName = '';
        }
    }

    $xml = new DOMDocument;
    $xml->load('cict.xml');

    $newStudent = $xml->createElement('student');
    $newStudent->appendChild($xml->createElement('id', $id));
    $newStudent->appendChild($xml->createElement('photo', $photoName));
    $newStudent->appendChild($xml->createElement('name', $name));
    $newStudent->appendChild($xml->createElement('course', $course));

    $xml->getElementsByTagName('Students')->item(0)->appendChild($newStudent);
    $test = $xml->save("cict.xml");

    if ($test) {
        echo "<script>alert('Record added successfully'); window.location.href='home.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Josefin Sans', sans-serif;
        }
        .container {
            background-color: #001f3f;
            padding: 20px;
            color: white;
        }
        .container h1, .container h3 {
            margin: 0;
            text-shadow: 2px 2px 2px black;
        }
        .team {
            text-align: center;
        }
        .nav-links {
            float: right;
            margin-top: -40px;
        }
        .nav-links a {
            margin-left: 20px;
            color: white;
            text-decoration: none;
            border-bottom: 2px solid white;
            font-size: 1.2em;
        }
        .form-container {
            background-color: #001f3f;
            color: white;
            width: 50%;
            margin: 40px auto;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
        }

        .form-container h2 {
            text-align: center;
            text-shadow: 2px 2px 2px white;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group input[type="file"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
        }

        .form-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .form-buttons button {
            background: white;
            border: none;
            font-weight: bold;
            font-family: Verdana, sans-serif;
            cursor: pointer;
            padding: 8px 15px;
            margin: 5px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h3 class="bsit">BSIT 3A-G1</h3>
        <h1 class="team">JOHN ANDREW P. SEBASTIAN &nbsp;|&nbsp; MARK T. DALMACIO</h1>
        <div class="nav-links">
            <a href="home.php">HOME</a>
			<a href="index.php">LOGOUT</a>
        </div>
    </div>

    <div class="form-container">
        <h2>ADD NEW STUDENT</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>STUDENT ID:</label>
                <input type="number" name="id" required>
            </div>
            <div class="form-group">
                <label>Photo:</label>
                <input type="file" name="photo" accept="image/*" required>
            </div>
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label>Course:</label>
                <input type="text" name="course" required>
            </div>
            <div class="form-buttons">
                <button type="submit" name="submit">ADD</button>
                <button onclick="location.href='home.php'">VIEW DATA</button>
            </div>
        </form>
    </div>

</body>
</html>
