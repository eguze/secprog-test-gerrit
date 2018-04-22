
<?php

function gotoInterface($to){
		//echo "Forwarding to " . $to;
/*		echo "<script language=\"JavaScript\"> 
				
				setTimeout(function() {window.location = \"".$to."\"}, 1500);
			
			</script>";
*/
		echo "<script language=\"JavaScript\"> 
				
				window.location = \"".$to."\";
			
			</script>";
}

?>