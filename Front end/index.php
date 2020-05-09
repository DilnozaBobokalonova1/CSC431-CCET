<?php
session_start();
if (empty($_SESSION['uid'])) {
  echo "
        <script>
       window.location.href='login.php';
</script>
        ";
}
$conn = new mysqli('localhost', 'root', '', 'wiki');
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Wiki</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/styles.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/actor:n4:default;alfa-slab-one:n4:default;alegreya:n4,n7:default.js" type="text/javascript"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body style="padding-top: 70px">
<?php include("header.php"); ?>
<aside class="asideLeft">
  <h1>Collaborative Online Text Editing Tool</h1>
</aside>
<section class="sectionRight">
  <h2>Here are the documents you currently possess:</h2>
<ul>
  <?php
  $sql = "select * from document ";
  $query = $conn->query($sql);
  while($array = $query->fetch_array()){
  ?>
  <li class="fileNameList"><a href="edit.php?document_id=<?php echo $array['document_id']; ?>"><?php  echo $array['doc_title'] ?></a></li>
  <?php
  }
  ?>
</ul>
</section>
<footer>Copyright 2017.</footer>
<script src="js/jquery-1.11.3.min.js"></script> 
<script src="js/bootstrap.js"></script>
</body>
</html>
