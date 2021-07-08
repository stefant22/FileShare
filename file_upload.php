<?php 


if(isset($_POST['submit'])) { 

    // upload destinacija i ogranicenja ekstenzija
    $email=$_POST['mail'];
	$upload_dir = "uploads/". uniqid()."/";
	$allowed_types = array('jpg', 'png', 'jpeg', 'gif', 'pdf','docx','doc','exe','ico'); 
	
	// Definisanje velicine fajla
	$maxsize = 50 * 1024 * 1024; 

    
    if (mkdir(getcwd()."/".$upload_dir,0777)){
	if(!empty(array_filter($_FILES['files']['name']))) { 

		
		foreach ($_FILES['files']['tmp_name'] as $key => $value) { 
			
			$file_tmpname = $_FILES['files']['tmp_name'][$key]; 
			$file_name = $_FILES['files']['name'][$key]; 
			$file_size = $_FILES['files']['size'][$key]; 
			$file_ext = pathinfo($file_name, PATHINFO_EXTENSION); 

			
			$filepath = $upload_dir.$file_name; 

			if(in_array(strtolower($file_ext), $allowed_types)) { 

				if ($file_size > $maxsize)		 
					echo "Error: File size is larger than the allowed limit."; 

				if(file_exists($filepath)) { 
					$filepath = $upload_dir.time().$file_name; 
					
					if( move_uploaded_file($file_tmpname, $filepath)) { 
						echo "{$file_name} successfully uploaded <br />"; 
					} 
					else {					 
						echo "Error uploading {$file_name} <br />"; 
					} 
				} 
				else { 
				
					if( move_uploaded_file($file_tmpname, $filepath)) { 
                       // echo "{$file_name} successfully uploaded <br />"; 
                        $upTrue=true;
                        $linkAdr= '\\\maagacin-test\\'.$upload_dir ;

                        
					} 
					else {					 
						echo "Error uploading {$file_name} <br />"; 
					} 
				} 
			} 
			else { 
				
				echo "Error uploading {$file_name} "; 
				echo "({$file_ext} file type is not allowed)<br / >"; 
			} 
        } 
        

        if($upTrue){

       
        echo "<a href='mailto:$email?subject=link ka deljenom fajlu&body= link ka fajlu : $linkAdr' >Posalji email</a>";
    }
    } 
}
	else { 
		
		// If no files selected 
		echo "No files selected."; 
	} 
} 

?> 
