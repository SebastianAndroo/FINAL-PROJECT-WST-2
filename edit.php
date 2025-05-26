<?php
$xmlFile = 'cict.xml';
$xml = new DOMDocument;
$xml->load($xmlFile);

$students = $xml->getElementsByTagName('student');
$foundStudent = null;
$id = $_GET['id'] ?? '';

foreach ($students as $student) {
    if ($student->getElementsByTagName('id')->item(0)->nodeValue == $id) {
        $foundStudent = $student;
        break;
    }
}

if (!$foundStudent) {
    echo "Student not found.";
    exit;
}

if (isset($_POST['update'])) {
    $newName = $_POST['name'];
    $newCourse = $_POST['course'];

    $foundStudent->getElementsByTagName('name')->item(0)->nodeValue = $newName;
    $foundStudent->getElementsByTagName('course')->item(0)->nodeValue = $newCourse;

    if (!empty($_FILES['photo']['name'])) {
        $targetDir = "uploads/";
        $newPhoto = basename($_FILES['photo']['name']);
        $targetFilePath = $targetDir . $newPhoto;

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFilePath)) {
            $foundStudent->getElementsByTagName('photo')->item(0)->nodeValue = $newPhoto;
        }
    }

    $xml->save($xmlFile);
    echo "<script>alert('Student updated successfully'); window.location.href='home.php';</script>";
    exit;
}

$currentName = $foundStudent->getElementsByTagName('name')->item(0)->nodeValue;
$currentCourse = $foundStudent->getElementsByTagName('course')->item(0)->nodeValue;
$currentPhoto = $foundStudent->getElementsByTagName('photo')->item(0)->nodeValue;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
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
        .edit-form {
            background-color: #001f3f;
            color: white;
            margin: 40px auto;
            width: 40%;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
        }
        .edit-form h2 {
            text-align: center;
            text-shadow: 2px 2px 2px white;
            margin-bottom: 20px;
        }
        .edit-form label {
            display: block;
            margin-top: 10px;
        }
        .edit-form input[type="text"],
        .edit-form input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: none;
        }
        .edit-form input[type="submit"] {
            background-color: white;
            border: none;
            font-weight: bold;
            font-family: Verdana, sans-serif;
            cursor: pointer;
            padding: 8px 15px;
            margin: 5px;
            border-radius: 5px;
        }
        .edit-form img {
            margin-top: 10px;
            width: 100px;
            height: 100px;
            border: 2px solid white;
            border-radius: 10px;
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

<div class="edit-form">
    <h2>EDIT STUDENT INFO</h2>
    <form method="POST" enctype="multipart/form-data">
        <label>Student ID:</label>
        <input type="text" value="<?php echo htmlspecialchars($id); ?>" disabled>

        <label>Name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($currentName); ?>" required>

        <label>Course:</label>
        <input type="text" name="course" value="<?php echo htmlspecialchars($currentCourse); ?>" required>

        <label>Current Photo:</label>
        <?php if (!empty($currentPhoto) && file_exists("uploads/$currentPhoto")): ?>
            <img src="uploads/<?php echo $currentPhoto; ?>" alt="Student Photo">
        <?php else: ?>
            <p>No Photo</p>
        <?php endif; ?>

        <label>Upload New Photo (optional):</label>
        <input type="file" name="photo">

        <input type="submit" name="update" value="UPDATE">
    </form>
</div>

</body>
</html>
