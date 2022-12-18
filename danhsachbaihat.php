<?php
require "connect.php";

class Baihat{
	function Baihat($idbaihat,$tenbaihat,$hinhbaihat,$casi,$linkbaihat,$luotthich){
		$this ->IdBaiHat = $idbaihat;
		$this ->TenBaiHat = $tenbaihat;
		$this ->HinhBaiHat = $hinhbaihat;
		$this ->CaSi = $casi;
		$this ->LinkBaiHat = $linkbaihat;
		$this ->LuotThich = $luotthich;
	}
}
$arraydanhsachbaihat = array();
if(isset($_POST['idtheloai'])){
	$idtheloai= $_POST['idtheloai'];
	$query= "SELECT * FROM baihat WHERE FIND_IN_SET('$idtheloai',IdTheLoai) ";
}
if(isset($_POST['idplaylist'])){
	$idplaylist= $_POST['idplaylist'];
	$query= "SELECT * FROM baihat WHERE FIND_IN_SET('$idplaylist',IdPlayList) ";
}

if(isset($_POST['idquangcao']) >0 ){
$idquangcao = $_POST['idquangcao'];
$queryquangcao = "SELECT  * FROM quangcao WHERE ID ='$idquangcao'" ;
$dataquangcao=mysqli_query($conn,$queryquangcao);
$rowquangcao = mysqli_fetch_assoc($dataquangcao);
$id=$rowquangcao['IdBaiHat'];
$query= "SELECT * FROM baihat WHERE IdBaiHat = '$id' ";
}

$data = mysqli_query($conn,$query);
while($row = mysqli_fetch_assoc($data)){
	array_push($arraydanhsachbaihat, new Baihat($row['IdBaiHat'],
		$row['TenBaiHat'],
		$row['HinhBaiHat'],
		$row['CaSi'],
		$row['LinkBaiHat'],
		$row['LuotThich']));
}

echo json_encode($arraydanhsachbaihat);
?>