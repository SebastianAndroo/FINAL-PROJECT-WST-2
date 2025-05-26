<?php
if (isset($_POST['submit'])) {
    $idToDelete = $_POST['name'];

    $xml = new DOMDocument;
    $xml->load('cict.xml');

    $studentsNode = $xml->getElementsByTagName('Students')->item(0);
    $students = $studentsNode->getElementsByTagName('student');

    foreach ($students as $index => $student) {
        $name = $student->getElementsByTagName('name')->item(0)->nodeValue;
        if ($name === $idToDelete) {
            $studentsNode->removeChild($student);
            $xml->save("cict.xml");
            echo "<script>alert('Student \"$name\" deleted successfully.'); window.location.href='delete.php';</script>";
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Student</title>
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

        .form-section {
            margin: 100px auto;
            width: 500px;
            background: #001f3f;
            padding: 30px;
            border-radius: 15px;
            color: white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.4);
        }

        .form-section h2 {
            text-align: center;
            text-shadow: 2px 2px 2px white;
            margin-bottom: 20px;
        }

        select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        button {
            background: white;
            border: none;
            font-weight: bold;
            font-family: Verdana, sans-serif;
            cursor: pointer;
            padding: 8px 15px;
            margin: 5px;
            border-radius: 5px;
        }
        form {
            display: flex;
            flex-direction: column;
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

    <div class="form-section">
        <h2>DELETE STUDENT</h2>
        <form method="POST">
            <label for="name">Select Student Name:</label>
            <select name="name" id="name" required>
                <option value="">-- Select a Name --</option>
                <?php 
                $xml = simplexml_load_file("cict.xml");
                foreach ($xml->student as $student): ?>
                    <option value="<?php echo $student->name; ?>">
                        <?php echo $student->name; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit" name="submit">Delete</button>
        </form>
    </div>

</body>
</html>
