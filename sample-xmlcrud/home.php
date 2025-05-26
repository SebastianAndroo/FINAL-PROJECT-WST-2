<?php
$xml = new DOMDocument;
$xml->load('cict.xml');
$students = $xml->getElementsByTagName('student');
?>
<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
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
        .head {
            text-align: center;
            margin: 30px 0 10px;
            font-size: 28px;
            text-shadow: 2px 2px 2px white;
            color: black;
        }
        table {
            margin: 0 auto;
            width: 60%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        th {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
            color: white;
			background-color: #001f3f;
            text-shadow: 2px 2px 2px black;
        }
		td {
			border: 1px solid black;
            padding: 10px;
            text-align: center;
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
            color: black;
			background-color: #D9D9D9;
		}
        .user-photo img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
        button {
            background-color: #001f3f;
			border: none;
			color: white;
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

    <h2 class="head">STUDENT INFORMATION</h2>

    <table border='1' cellpadding='5' cellspacing='0'>
    <tr>
        <th>STUDENT ID</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Course</th>
        <th>Action</th> <!-- New Column -->
    </tr>

        <?php foreach ($students as $stud): 
    $id = $stud->getElementsByTagName('id')->item(0)->nodeValue;
    $photo = $stud->getElementsByTagName('photo')->item(0)->nodeValue;
    $name = $stud->getElementsByTagName('name')->item(0)->nodeValue;
    $course = $stud->getElementsByTagName('course')->item(0)->nodeValue;
?>
    <tr>
        <td><?php echo $id; ?></td>
        <td class="user-photo">
            <?php if (!empty($photo) && file_exists("uploads/$photo")): ?>
                <img src="uploads/<?php echo $photo; ?>" alt="Student Photo" width="100" height="100">
            <?php else: ?>
                No Photo
            <?php endif; ?>
        </td>
        <td><?php echo $name; ?></td>
        <td><?php echo $course; ?></td>
        <td>
            <a href="edit.php?id=<?php echo $id; ?>">
                <button class="btn-edit">Edit</button>
            </a>
        </td>
    </tr>
<?php endforeach; ?>

        <!-- Buttons Row -->
        <tr>
            <td colspan="5">
                <button onclick="location.href='add.php'">ADD NEW</button>
                <button onclick="location.href='delete.php'">DELETE</button>
                <button onclick="location.href='update.php'">SEARCH STUDENT</button>
            </td>
        </tr>
    </table>
</body>
</html>
