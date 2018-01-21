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
    require("header.php"); ?>
    <?php
    include("server.php");
    $name=$_POST["name"];
    $price=$_POST["price"];
  if($name!=""){
    $conn = new mysqli($servername,$username,$password,$database);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql="insert into items(name,price) values('$name',$price);";

    $conn->query($sql);
    echo"<div class='alert alert-success'>Item added</div>";
  }
 ?>
    <form method="post">
      <div class="form-group">
        <label>Name of product</label>
        <input type="text" name="name"/>
      </div>
      <div class="form-group">
        <label>Price of product</label>
        <input type="number" name="price"/>
      </div>
      <button class="btn btn-default" type="submit">Add Item</button>
    </form>
  </body>
</html>
