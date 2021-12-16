<!DOCTYPE html>
<html>
<head>
    <title> Youtube data API V3 integration in PHP and MySql</title>
    <link> rel="stylesheet" href="../library/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center">Youtube data API V3 integration in PHP and MySql</h2>
    </div>
    <?php
        include "dbconnect.php";
        $db = new dbConnect();
        $conn = $db->connect();

        $key = "AIzaSyCnavHwyyNTPInBXCN8z1igwA1Lh9nYVfg";
        $base_url = "https://www.googleapis.com/youtube/v3";
        $channelId = "";
        $maxResult = 10;
        $video_type = isset($_GET['vtype']) ? 1 : 2;

        if($video_type == 1){
            $API_URL = $base_url . "playlists?order=date&part=snippet&channelID=".$channelId. "&maxResult=".$maxResult.".&key=".$key;
            getVideos($API_URL);
        } else {
            $API_URL = $base_url . "playlists?order=date&part=snippet&channelID=".$channelId. "&maxResult=".$maxResult.".&key=".$key;
            getPlaylists($API_URL);
        }
        
        
        function getPlaylists($API_URL){
            global $conn;
            $playlists = json_decode( file_get_contents( $API_URL ) );

            foreach($playlists->items as $video){
        
                $sql = "INSERT INTO 'videos' ('id', 'video_type', 'video_id', 'title', 
                'thumbnail_url', 'published_at') 
                VALUES (NULL, 2, :vid, :title, :turl, :pdate)";
    
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":vid", $video->id);
                $stmt->bindParam(":vtype", $video->snippet->title);
                $stmt->bindParam(":vtype", $video->snippet->thumbnails->high->url);
                $stmt->bindParam(":pdate", $video->snippet->publishedAt);
    
                $stmt->execute();
            }
        }
        function getVideos($API_URL){
            global $conn;
            $videos = json_decode( file_get_contents( $API_URL) );

            foreach($videos->items as $video){
        
                $sql = "INSERT INTO 'videos' ('id', 'video_type', 'video_id', 'title', 
                'thumbnail_url', 'published_at') 
                VALUES (NULL, 1, :vid, :title, :turl, :pdate)";
    
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":vid", $video->id->videoId);
                $stmt->bindParam(":vtype", $video->snippet->title);
                $stmt->bindParam(":vtype", $video->snippet->thumbnails->high->url);
                $stmt->bindParam(":pdate", $video->snippet->publishedAt);
    
                $stmt->execute();
            }
        }
        
        //echo "<pre>";
            //print_r($videos);
        //echo $API_URL;
    ?>
    <div style="position: fixed; bottom: 10px; right: 10px; color: green;">
    </div>
</body>
</html>

