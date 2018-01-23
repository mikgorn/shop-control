<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <?php
    require("header.php") ?>

    <div class="container-fluid">
    <?php
    include("server.php");

    $conn = new mysqli($servername,$username,$password,$database);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql="select * from items;";

    $result = $conn->query($sql);
    if(mysqli_num_rows($result)>0){
      while($row = $result->fetch_assoc()){
        $name=$row["name"];
        $price=$row["price"];
          echo"<div class=\"row item-row\">
            <div class=\"col-xs-4 col-sm-4\">
              <p>$name</p>
            </div>
            <div class=\"col-xs-4 col-sm-4\">
              <p>$price</p>
            </div>
            <div class=\"col-xs-4 col-sm-4\">
              <button class=\"btn btn-default\" >Edit</button>
              <button class=\"btn btn-default\">Sell</button>
              <button class=\"btn btn-default\">Remove</button>
            </div>
          </div>";
      }
    }

 ?>


    </div>
  </body>
</html>
