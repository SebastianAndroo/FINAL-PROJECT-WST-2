<?php
$q = $_GET["q"];

$xmlDoc = new DOMDocument();
$xmlDoc->load("cict.xml");

$x = $xmlDoc->getElementsByTagName('name');

for ($i = 0; $i <= $x->length - 1; $i++) {
    if ($x->item($i)->nodeType == 1) {
        if ($x->item($i)->childNodes->item(0)->nodeValue == $q) {
            $y = ($x->item($i)->parentNode);
        }
    }
}

$cd = ($y->childNodes);

echo "<div class='info-box'>";
for ($i = 0; $i < $cd->length; $i++) {
    if ($cd->item($i)->nodeType == 1) {
        $tag = $cd->item($i)->nodeName;
        $value = $cd->item($i)->nodeValue;

        if ($tag == "photo" && $value != "") {
            echo "<div class='photo-container'><img src='uploads/$value' alt='Student Photo' class='student-photo'></div><br>";
        } else {
            echo "<b class='root-tags'>$tag:</b> ";
            echo "<span class='detail-text'>$value</span><br>";
        }
    }
}
echo "</div>";
?>

<html>
<head>
    <style>
        .root-tags {
            color: white;
            font-family: sans-serif;
            text-transform: uppercase;
        }
        .detail-text {
            color: white;
            font-family: fantasy;
            text-shadow: 1px 1px 1px white;
        }
        .info-box {
            background: linear-gradient(to bottom, #002b80, #000022);
            border: 5px solid white;
            padding: 20px;
            width: 300px;
            font-size: 18px;
            font-family: 'Josefin Sans', sans-serif;
            box-shadow: 3px 3px 10px rgba(0,0,0,0.2);
        }
        .photo-container {
            text-align: center;
            margin-bottom: 15px;
        }
        .student-photo {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid white;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
        }
    </style>
</head>
</html>
