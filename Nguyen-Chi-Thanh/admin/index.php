<?php
include( "../inc/conn.php");

if( $_SERVER['REQUEST_METHOD'] =='GET' && !empty($_GET['idxoa'] ) ){
  


  $idxoa =$_GET['idxoa'];
  $sql = "DELETE from product WHERE id={$idxoa} limit 1";
  if(mysqli_query($conn, $sql) ) {
  	echo "xoa thanh cong san pham".$idxoa;
  } else {
  	echo "co loi xay ra:".mysqli_error($conn);
  }
}
include ("inc/header.php");
include ("listsp.php");