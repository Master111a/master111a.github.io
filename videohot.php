<?php
require "connect.php";
$queryvideo = "SELECT  * FROM video";


class Video{
    function Video($idvideo,$tenvideo,$tentacgia,$hinhvideo,$linkvideo){
        $this ->IdVideo = $idvideo;
        $this ->TenVideo = $tenvideo;
        $this ->TenTacGia = $tentacgia;
        $this ->HinhVideo = $hinhvideo;
        $this ->LinkVideo = $linkvideo;

    }
}
$arrayvideo = array();
$datavideo = mysqli_query($conn,$queryvideo);
while($row = mysqli_fetch_assoc($datavideo)){
    array_push($arrayvideo, new Video($row['IdVideo'],
        $row['TenVideo'],
        $row['TenTacGia'],
        $row['HinhVideo'],
        $row['LinkVideo']));
}

echo json_encode($arrayvideo);
?>