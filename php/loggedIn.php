
          <?php
	// check if the member is sign in
	if (isset($_SESSION['memberID'])) {
    	echo "Welcome ".$_SESSION['name'];
	} // end of if	
            ?>
