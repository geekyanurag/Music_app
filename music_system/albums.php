<?php require('connect.php'); 
require('constants.php');

$artist_id = $_GET['artist_id'];
$artist_name = $_GET['artist_name'];

$sql = "SELECT a.id, a.name, a.photo FROM albums a
INNER JOIN artist_albums c ON a.id = c.album_id AND c.artist_id = $artist_id";

$res = $conn->query($sql);
?>
<!DOCTYPE html>
<html>

<head>
<title><?php echo $artist_name . '|albums' ?></title>
<link rel="stylesheet" href="main.css">
</head>

<body>
        
    <div class="container">
        <a href="<?php echo BASE_URL ?>">&#8678;Back</a>

        <h1 align = "center">Music system</h1>
        <h2><?php echo $artist_name . ' Albums:' ?></h2>
        <div class = "row">
        <?php 
          if ($res->num_rows) {
            while ($row = $res->fetch_assoc()) { ?>
              
              <div class = "column">
                <a href = "song_list.php?album_id=<?php echo $row['id'] ?>&artist_id=<?php echo $artist_id ?>&artist_name=<?php echo urlencode($artist_name) ?>&album_name=<?php echo urlencode($row['name']) ?>">
                  <div class="artist__img" style="background-image: url('<?php echo BASE_URL . 'album_art/' . $row['photo'] ?>')"></div>
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