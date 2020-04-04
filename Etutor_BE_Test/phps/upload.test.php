<?php
//limit user upload image's format
$allowedExts = array("bmp","jpg","png","gif","jpeg");
$temp = explode(".",$_FILES["file"]["name"]);
$extension = end($temp);
if((($_FILES["file"]["type"]=="image/bmp")
        ||($_FILES["file"]["type"]=="image/jpg")
        ||($_FILES["file"]["type"]=="image/png")
        ||($_FILES["file"]["type"]=="image/gif")
        ||($_FILES["file"]["type"]=="image/jpeg"))
    &&($_FILES["file"]["size"]<204800) //upload image size less than 200kb
    && in_array($extension,$allowedExts))
{
    if($_FILES["file"]["error"]>0)
    {
        echo "ERROR::".$_FILES["file"]["error"]."<br>";
    }
    else
    {
        echo "Thank you, your uploading is successful";

        // check upload file existence
        if(file_exists("Upload/".$_FILES["file"]["name"]))
        {
            echo$_FILES["file"]["name"]."is exist.";
        }
        else
        {
            move_uploaded_file($_FILES["file"]["tmp_name"],"Upload/".$_FILES["file"]["name"]);
        }
    }
}
else
{
    echo "Please check your image format.";
}

