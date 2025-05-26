<html>
<head>
    <title>SEARCH DATA</title>
<script>
function showData(str) {
  if (str=="") {
    document.getElementById("a").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("a").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getinfo.php?q="+str,true);
  xmlhttp.send();
}
</script>

<style>
    body {
          background-color: #f0f2f5;
          font-family: 'Josefin Sans', sans-serif;
        }
    table, th, td {
      border: 5px solid white;
      color:black;
      font-size:20px;
      font-family: 'impact';
      background: linear-gradient(to left, navy, white);
    }
    table {
      position:absolute;
      left: 35%;
      width:390px;
      top:30%;
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
    .home{
        color: black;
        text-shadow: 2px 2px 2px white;
        border-bottom: 2px solid black;
        font-size: 1.2em;
        float:right;
        margin-left:10px;
        margin-top:-2%;
        margin-right: 20%;
        text-decoration: none; 
    }
    .about{
        font-size: 1.2em;
        color: black;
        text-shadow: 2px 2px 2px white;
        border-bottom: 2px solid black;
        list-style: none;
        font-style: unthrough;
        float:right;
        margin-left:10px;
        margin-top:-2%;
        margin-right: 13%;
        text-decoration: none; 
    }
    .team{
        text-align: center;
    }
    .select-acc{
        color: black;
        text-shadow: 1px 2px 0px white;
        text-transform: uppercase;
        position: absolute;
        top: 20%;
        left: 36%;
    }
    #selectors{
        width:16em;
        position:absolute;
        top: 30%;
        left: 43%;
    }
    .info-detail{
        position: absolute;
        top: 43%;
        left: 37%;
        font-family: 'impact';
        color: white;
        background: radial-gradient(circle at center, #002b80, #000022);
        padding: 20px;
        border: 5px solid white;
        font-size: 20px;
        max-width: 400px;
        text-align: center;
    }
    .info-detail img {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 10px;
        border: 2px solid #fff;
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

<h3 class="select-acc">Select Student to Display Information:</h3>
<form>
<select name="cds" onchange="showData(this.value)" id="selectors">
  <option value="">--   SELECT NAME   --</option>
  <?php 
    $num=0;
    $xml = simplexml_load_file("cict.xml");
    foreach ($xml as $xml) {
      $num++;
    }
    $xmls = simplexml_load_file("cict.xml");
    for($x=0; $x<$num; $x++){
  ?>
    <option value="<?php echo $xmls->student[$x]->name; ?>">
        <?php echo $xmls->student[$x]->name; ?>
    </option>
  <?php } ?>
</select>
</form>

<div id="a" class="info-detail">Account information will be listed here...</div>

</body>
</html>
