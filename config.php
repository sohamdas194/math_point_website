<?php
	ob_start();
	session_start();

	$host        = "host = 
	ec2-176-34-211-0.eu-west-1.compute.amazonaws.com";
   	$port        = "port = 5432";
   	$dbname      = "dbname = d87slconvu3ciu";
   	$credentials = "user = erhtrgmocbzftt password=651bfae17741b910c04c50754d0f9d7a8cca5aead05d9dfc65981cb1353df88d";

   	$conn = pg_connect( "$host $port $dbname $credentials"  );
   	if(!$conn) {
      	echo "Error : Unable to open database\n";
   	} 
	// else {
    //  	echo "Opened database successfully\n";
   	// }
?>