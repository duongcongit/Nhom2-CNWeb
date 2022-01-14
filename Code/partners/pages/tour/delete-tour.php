<?php
include "../../../config/constants.php";

if(isset($_POST['tourID'])){
    $tourID = $_POST['tourID'];

    try{
        $msg = "";
        //
        $sqlDelete1 = "DELETE from chitietgia Where maTour='$tourID'";
        if($conn->query($sqlDelete1)){
            $msg .= "success";
        }
        else{
            $msg .= "false";
        }

        //
        $sqlDelete2 = "DELETE from phieudangkytour Where maTour='$tourID'";
        if($conn->query($sqlDelete2)){
            $msg .= "success";
        }
        else{
            $msg .= "false";
        }

        //
        $sqlDelete3 = "DELETE from giatour Where maTour='$tourID'";
        if($conn->query($sqlDelete3)){
            $msg .= "success";
        }
        else{
            $msg .= "false";
        }

        //
        $sqlDelete4 = "DELETE from tour Where maTour='$tourID'";
        if($conn->query($sqlDelete4)){
            $msg .= "success";
        }
        else{
            $msg .= "false";
        }
    }
    catch(Exception){
        $msg .= "false";
    }
}

?>