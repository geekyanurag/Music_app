<?php require('connect.php'); 
require('constants.php');
?>
<!DOCTYPE html>
<html>
<head>
<style>
.header{
  height : 20px;
  background-color : white;
  color : black;
}
</style>
<title>My First page</title>
<link rel="stylesheet" href="main.css">
</head>
<body>
  
  <div class="container">
    <div class="header"> <h1 align = "center">Music system</h1> </div>
    <h2>Top Artists</h2>
    <div class = "row">
    <?php 
      $sql = "SELECT * FROM artists";
      $res = $conn->query($sql);

      if ($res->num_rows) {
        while ($row = $res->fetch_assoc()) { ?>
          
          <div class = "column">
            <a href = "albums.php?artist_id=<?php echo $row['id'] ?>&artist_name=<?php echo urlencode($row['name']) ?>">
              <div class="artist__img" style="background-image: url('<?php echo BASE_URL . 'artists/' . $row['photo'] ?>')"></div>
              <p class="artist__name"><?php echo $row['name'] ?></p>
          </a>
          </div>
      <?php }
      }
    ?>
    </div>
  </div>

</body>
</head>