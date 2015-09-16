<?php 
	if(isset($_POST['PAYPAL_POST_TYPE'])){
		$post_type=$_POST['PAYPAL_POST_TYPE'];

		switch($post_type){
			case 'VERIFY_API':
				$post_data=$_POST; 
				$url=$post_data['SERVER'];
				unset($post_data['SERVER']);
				unset($post_data['PAYPAL_POST_TYPE']);
				$curl = curl_init($url); 
				curl_setopt($curl, CURLOPT_POST, true); 
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($curl, CURLOPT_HEADER, false);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
				curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post_data)); 
			#	curl_setopt($curl, CURLOPT_VERBOSE, TRUE);
				$response = curl_exec( $curl );
				if (empty($response)) {
				    // some kind of an error happened
				    $response= "Error::".curl_error($curl);
				    curl_close($curl); // close cURL handler
				    echo "FAILURE";
				} else {
				    $info = curl_getinfo($curl);
					//echo "Time took: " . $info['total_time']*1000 . "ms\n";
				    curl_close($curl); // close cURL handler
					//if($info['http_code'] != 200 && $info['http_code'] != 201 ) {
					//	echo "Received error: " . $info['http_code']. "\n";
					//	echo "Raw response:".$response."\n";
						//die();
				    
				}
				$responseArray = array();
				parse_str($response,$responseArray); // Break the NVP string to an array
				if($responseArray['ACK']=='Success'){
					echo 'SUCCESS';
				}else{
					echo 'FAILURE';
				}
				break;
			case 'store_api':
				break;	
		}		
	}				
?>