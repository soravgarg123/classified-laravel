<?php


    $directory = dirname(dirname(__FILE__));
    
    $link = mysql_pconnect('localhost', 'dovecercare', 'success2015');
  if (!$link) {
    die('Could not connect: ' . mysql_error());
  }
  
  $db_selected = mysql_select_db('dovecercare', $link);
  if (!$db_selected) {
		die ('Can\'t use db : ' . mysql_error());
  }
  
	
    
    $afterBooks = mysql_query("SELECT * FROM ds_cart WHERE UNIX_TIMESTAMP(STR_TO_DATE(book_date, '%Y/%m/%d %H:%i')) >= UNIX_TIMESTAMP(NOW()) - 54100 
			AND UNIX_TIMESTAMP(STR_TO_DATE(book_date, '%Y/%m/%d %H:%i')) <= UNIX_TIMESTAMP(NOW()) - 53900 AND status = 1" , $link);
    
	$beforeBooks = mysql_query("SELECT * FROM ds_cart WHERE UNIX_TIMESTAMP(STR_TO_DATE(book_date, '%Y/%m/%d %H:%i')) <= UNIX_TIMESTAMP(NOW()) + 118900 
			AND UNIX_TIMESTAMP(STR_TO_DATE(book_date, '%Y/%m/%d %H:%i')) >= UNIX_TIMESTAMP(NOW()) + 118600  AND ('status' = 0 OR 'status' = 3)" , $link);
	
	
    while($row = mysql_fetch_assoc($beforeBooks)){
		$user_id = $row['user_id'];
		$store_id = $row['store_id'];
		$company_id = $row['company_id'];
        $sql = mysql_query("select * from ds_user where id = $user_id", $link);
		$userInfo = mysql_fetch_assoc($sql);
		$sql = mysql_query("select * from ds_store where id = $store_id", $link);
		$storeInfo = mysql_fetch_assoc($sql);
		$sql = mysql_query("select * from ds_company where id = $company_id", $link);
		$companyInfo = mysql_fetch_assoc($sql);

		$message = '<table width="600" border="0" cellspacing="0" cellpadding="0">
						<thead>
								<tr>
									<th>
										<h2 style="color: #5A5A5A;font-weight: bold;">Your booking is coming tomorrow!</h2>
									</th>
								</tr>
							</thead>
						<tbody>
						<tr>
							<td>
								<p style="line-height:1.4em;font-size: 1.1em;color:#565656;padding:0;text-align:center;">
								  Service Name : 																						
								  <span style="color: #5A5A5A;font-weight: bold;font-size: 1.2em;">'.$storeInfo['name'].'</span>								   
								</p>
							</td>
						</tr>
						<tr>
							<td>
								<p style="line-height:1.4em;font-size: 1.1em;color:#565656;padding:0;text-align:center;">
									Booking DateTime : 
									<span style="color: #5A5A5A;font-weight: bold;font-size: 1.2em;">'.$row['book_date'].'</span>
								</p>
							</td>
						</tr>
						<tr>
							<td>
								<p style="line-height:1.4em;font-size: 1.1em;color:#565656;padding:0;text-align:center;">
									Duration : 
									<span style="color: #5A5A5A;font-weight: bold;font-size: 1.2em;">'.$row['duration'].'</span>
								</p>
							</td>
						</tr>
						<tr>
							<td>
								<p style="line-height:1.4em;font-size: 1.1em;color:#565656;padding:0;text-align:center;">
									Price : 
									<span style="color: #5A5A5A;font-weight: bold;font-size: 1.2em;"> &euro; '.$row['price'].'</span>
								</p>
							</td>
						</tr>
						</tbody>
					</table>
					
					<h3>From dovecercare.com</h3>';
					
						$to      = $userInfo['email'];
					$subject = 'Your booking is coming tomorrow!';					
					$headers = 'From: info@dovecercare.com' . "\r\n" .
						'Reply-To: info@dovecercare.com' . "\r\n" .
						'Content-type:text/html;charset=UTF-8' . '\r\n'.
						'X-Mailer: PHP/' . phpversion();
					mail($to, $subject, $message, $headers);
				
					
					
					
					// To professional
					$message = '<table width="600" border="0" cellspacing="0" cellpadding="0">
							<thead>
								<tr>
									<th>
										<h2 style="color: #5A5A5A;font-weight: bold;">You will have a booking tomorrow!</h2>
									</th>
								</tr>
							</thead>
						<tbody>
						<tr>
							<td>
								<p style="line-height:1.4em;font-size: 1.1em;color:#565656;padding:0;text-align:center;">
								  Service Name : 																						
								  <span style="color: #5A5A5A;font-weight: bold;font-size: 1.2em;">'.$storeInfo['name'].'</span>								   
								</p>
							</td>
						</tr>
						<tr>
							<td>
								<p style="line-height:1.4em;font-size: 1.1em;color:#565656;padding:0;text-align:center;">
									Booking DateTime : 
									<span style="color: #5A5A5A;font-weight: bold;font-size: 1.2em;">'.$row['book_date'].'</span>
								</p>
							</td>
						</tr>
						<tr>
							<td>
								<p style="line-height:1.4em;font-size: 1.1em;color:#565656;padding:0;text-align:center;">
									Duration : 
									<span style="color: #5A5A5A;font-weight: bold;font-size: 1.2em;">'.$row['duration'].'</span>
								</p>
							</td>
						</tr>
						<tr>
							<td>
								<p style="line-height:1.4em;font-size: 1.1em;color:#565656;padding:0;text-align:center;">
									Price : 
									<span style="color: #5A5A5A;font-weight: bold;font-size: 1.2em;"> &euro; '.$row['price'].'</span>
								</p>
							</td>
						</tr>
						</tbody>
					</table>					
					<h3>From dovecercare.com</h3>';
					$to      = $companyInfo['email'];
					$subject = 'You will have a booking tomorrow!';					
					$headers = 'From: info@dovecercare.com' . "\r\n" .
						'Reply-To: info@dovecercare.com' . "\r\n" .
						'Content-type:text/html;charset=UTF-8' . '\r\n'.
						'X-Mailer: PHP/' . phpversion();
					mail($to, $subject, $message, $headers);
					
    }

	while($row = mysql_fetch_assoc($afterBooks)){
		$user_id = $row['user_id'];
		$store_id = $row['store_id'];
		$company_id = $row['company_id'];
        $sql = mysql_query("select * from ds_user where id = $user_id", $link);
		$userInfo = mysql_fetch_assoc($sql);
		$sql = mysql_query("select * from ds_store where id = $store_id", $link);
		$storeInfo = mysql_fetch_assoc($sql);
				
		$message = '<table width="600" border="0" cellspacing="0" cellpadding="0">
						<thead>
								<tr>
									<th>
										<h2 style="color: #5A5A5A;font-weight: bold;">Please provide a feedback!</h2>
									</th>
								</tr>
							</thead>
						<tbody>
						<tr>
							<td>
								<p style="line-height:1.4em;font-size: 1.1em;color:#565656;padding:0;text-align:center;">
								  Service Name : 																						
								  <span style="color: #5A5A5A;font-weight: bold;font-size: 1.2em;">'.$storeInfo['name'].'</span>								   
								</p>
							</td>
						</tr>
						<tr>
							<td>
								<p style="line-height:1.4em;font-size: 1.1em;color:#565656;padding:0;text-align:center;">
									Booking DateTime : 
									<span style="color: #5A5A5A;font-weight: bold;font-size: 1.2em;">'.$row['book_date'].'</span>
								</p>
							</td>
						</tr>
						<tr>
							<td>
								<p style="line-height:1.4em;font-size: 1.1em;color:#565656;padding:0;text-align:center;">
									Duration : 
									<span style="color: #5A5A5A;font-weight: bold;font-size: 1.2em;">'.$row['duration'].'</span>
								</p>
							</td>
						</tr>
						<tr>
							<td>
								<p style="line-height:1.4em;font-size: 1.1em;color:#565656;padding:0;text-align:center;">
									Price : 
									<span style="color: #5A5A5A;font-weight: bold;font-size: 1.2em;"> &euro; '.$row['price'].'</span>
								</p>
							</td>
						</tr>
						</tbody>
					</table>
					
					<h3>From dovecercare.com</h3>';
					$to      = $userInfo['email'];
					$subject = '<h3 style="text-align:center;">Please provide your feedback</h3>';
					$headers = 'From: info@dovecercare.com' . "\r\n" .
						'Reply-To: info@dovecercare.com' . "\r\n" .
						'Content-type:text/html;charset=UTF-8' . '\r\n'.
						'X-Mailer: PHP/' . phpversion();
					mail($to, $subject, $message, $headers);					
					
    }
           
?>
