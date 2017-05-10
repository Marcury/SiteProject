<?php 

require_once("config.php");
 

$strUrl = 'index-5.php';
$strError = '';
 

if(isset($_POST["wyslij"])) {
 

    $name = trim($mySqli->real_escape_string($_POST["imie"]));
    $comment = trim($mySqli->real_escape_string($_POST["wiadomosc"]));
    $datetime = strtotime("now");
     $ip = ip2long($_SERVER['REMOTE_ADDR']);
     echo $ip;
    $datetime = strtotime("now");
    // if the validate false, it will concatinate the error message
    if($name=='') { $strError = '<br />Nie wpisano imienia';}
    if($comment=='') { $strError .= '<br />Nie wpisano wiadomości';}
     
    if($strError!='') { 
        echo $strError.'<br /><a href="javascript:history.back();">Back</a>';die;
    }
     
  
    if($strError=='') { 
        $strInsert = "INSERT INTO `wiadomosci` (`id`,`imie`, `wiadomosc`, `data`, `ipAdress`) VALUES (NULL,'".$name."','".$comment."','$datetime','$ip')";
        $mySqli->query($strInsert);
         
      
     //   $strContent = "name : $name,email : $email,url : $url,comment : $comment, ip : $ip, datetime : $datetime";
      //  mail("admin@yourdomain.com","New entry",$strContent,"From:".$email);
    }
     

    $strUrl = 'index-5.php';
} 

header("Location: ../index-5.php");
