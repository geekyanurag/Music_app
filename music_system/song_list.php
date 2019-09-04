<?php require('connect.php');
require('constants.php'); 

$album_id = $_GET['album_id'];
$album_name = $_GET['album_name'];
$artist_name = $_GET['artist_name'];
$artist_id = $_GET['artist_id'];

?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $album_name . '|songs' ?></title>

<link rel="stylesheet" href="main.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

    <div class="container">
        <ul>
            <li><a href="<?php echo BASE_URL ?>">Home</a></li>
            <li><a href="<?php echo BASE_URL . "albums.php?artist_id=$artist_id&artist_name=$artist_name" ?>">&#8678;Back</a></li>
        </ul>

        <h1>Songs by <?php echo $artist_name; ?></h1>
        <h2><?php echo "Album: $album_name" ?></h2>

        <?php

        $sql = "SELECT name from songs where album_id = $album_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) { ?>
                <div style="margin-top: 40px;">
                    <ul>
                        <li style="display: flex; align-items: center; justify-content: space-between;">
                            <a href="#" class="song__item"><?php echo $row['name'] ?></a>
                            <div class="song__controls" style="display: none;">
                                <audio controls>
                                    <source  src="<?php echo BASE_URL .  'songs/' . $row['name'] ?>" type="audio/mp3">
                                </audio>
                            </div>
                        </li>
                    </ul>
                </div>
            <?php }
        } else {
            echo "0 results";
        } ?>
    </div>
</body>
</html>

<script>
    $(document).ready(function() {
        $(".song__item").click(function(e) {
            e.preventDefault();
            $(".song__controls").each(function(idx, ele) {
                $(this).find('audio')[0].pause();
            });
            $(".song__controls").hide();
            $(this).next().show();
            $(this).next().find('audio')[0].play();
        });
    });
</script>
