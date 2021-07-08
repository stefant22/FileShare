<?php

$target_dir ="uploads/". uniqid()."/";

 if (mkdir(getcwd()."/".$target_dir,0777)){
     $email=$_POST['mail'];
    
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;





    if (copy($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
       // echo 'Link ka fajlu:  \\\maagacin-test\\'.$target_dir ;
        
        $linkAdr= '\\\maagacin-test\\'.$target_dir ;

       echo "<a href='mailto:$email?subject=link ka deljenom fajlu&body= link ka fajlu : $linkAdr' >Posalji email</a>";

    } else {
        echo "Sorry, there was an error uploading your file.";

        
    }
}
 
?>