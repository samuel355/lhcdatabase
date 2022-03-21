<?php

    session_start();
    ob_start();
    include_once "db.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if(empty($_POST["name"])){
            http_response_code(400);
            echo json_encode("Please enter your FULL NAME");
        }elseif(empty($_POST["email"])){
            http_response_code(400);
            echo json_encode("Your email is empty");
        }elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            echo json_encode("Please your email is invalid");
        }elseif(empty($_POST["address"])){
            http_response_code(400);
            echo json_encode("Please enter your address");
        }elseif($_POST["countryCode"] == 'Select Country') {
            http_response_code(400);
            echo json_encode('Please choose your country');
        }elseif(empty($_POST['phone'])){
            http_response_code(400);
            echo json_encode("Enter your PHONE NUMBER");
        }
        elseif(strlen($_POST["phone"]) !== 10) {
            http_response_code(400);
            echo json_encode('Your PHONE NUMBER must be 10 !');
        }elseif($_POST["status"] == 'Choose Option') {
            http_response_code(400);
            echo json_encode('Please choose if you are ready to buy or we should reserve for you');
        }elseif(empty($_POST["message"])) {
            http_response_code(400);
            echo json_encode('Please check the map and choose available plot to BUY or RESERVE');
        }else{

            $fullname = trim($_POST['name']);
            $email = trim($_POST['email']);
            $address = trim($_POST['address']);
            $countryCode = trim($_POST['countryCode']);
            $phone = trim($_POST['phone']);
            $status = $_POST['status'];
            $message = trim($_POST['message']);

            if($status === 'Ready To Buy'){
                $sendMessage = 'To Buy kindly Call Land and Homes Consult for further details. +233 (0) 20 073 7032 / 233 54 423 2686';
                $subject = 'I am Ready to Buy a Plot At ADENSE';
            }elseif($status === 'Reserve For Me'){
                $sendMessage = 'The Plot shall be reserved for you for seven (7) working days. Starting from today. Thank You. You can contact Land and Homes Consult for further details: +233 (0) 20 073 7032 / 233 54 423 2686 ';
                $subject = 'Please kindly reserve a plot for me at ADENSE';
            }else{
                $sendMessage = '';
            }

            $sent_on = date("Y-m-d") ." At ". date("h:i A");
            
            try {
                //Insert user Values and Display success Message for registration details
                $insert = "INSERT INTO messages( fullname, client_email, client_address, countryCode, phone, plot_status, sendMessage, details, message_date) 
                        VALUES (:fullname, :client_email, :client_address, :countryCode, :phone, :plot_status, :sendMessage, :details, :message_date)";
                        
                $stmt = $db->prepare($insert);
                $stmt->execute([
                    ':fullname' => $fullname,
                    ':client_email' => $email,
                    ':client_address' => $address,
                    ':countryCode' => $countryCode,
                    ':phone' => $phone,
                    ':plot_status' => $status,
                    ':sendMessage' => $sendMessage,
                    ':details' => $message,
                    ':message_date' => $sent_on
                ]);
            
                $userid = $db->lastInsertId();

                //Send email on live server
                  
                    $to = $email;
                    
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
                    $headers .= "From: Land and Homes Consult <info@landandhomesconsult.org> " . "\r\n" .
                    "Reply-To: info@landandhomesconsult.org" . "\r\n" .
                    "X-Mailer: PHP/" . phpversion();
                    
                    $subject = "Land and Homes Consult";
                    
                    
                    $messageSend = " <html>
                        <body>
                            <h4> Thank you for your message </h4>
                            ".$sendMessage." <br>
                            Account Name:  LAND AND HOMES CONSULT <br>
                            Account Number: 9040009771047 <br>
                            Bank : STANBIC BANK, KNUST BRANCH
                        </body>
                    </html> 
                    "; 
                    
                    $mailTemplate = '
                        
                        
                        <body style="margin: 0; background-color: #3476a8; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
                        <table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #3476a8;" width="100%">
                        	<tbody>
                        	<tr>
                        	<td>
                        	<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                        	<tbody>
                        	<tr>
                        	<td>
                        	<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fffaf1; color: #000000;" width="680">
                        	<tbody>
                        	<tr>
                        	<td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 20px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                        	<table border="0" cellpadding="15" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                        	<tr>
                        	<td>
                        	<div align="center" style="line-height:10px"><img alt="Logo" src="https://www.plots.landandhomesconsult.org/img/logo.png" style="display: block; height: auto; border: 0; width: 204px; max-width: 100%;" title="Land and homes Consult Logo" width="204"/></div>
                        	</td>
                        	</tr>
                        	</table>
                        	<table border="0" cellpadding="15" cellspacing="0" class="menu_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                        	<tr>
                        	<td>
                        	<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                        	<tr>
                        	<td style="text-align:center;font-size:0px;">
                        	<div class="menu-links">
                        
                        	</div>
                        	</td>
                        	</tr>
                        	</table>
                        	</td>
                        	</tr>
                        	</table>
                        	</td>
                        	</tr>
                        	</tbody>
                        	</table>
                        	</td>
                        	</tr>
                        	</tbody>
                        	</table>
                        	<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                        	<tbody>
                        	<tr>
                        	<td>
                        	<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f4e4ce; background-image: url("https://www.plots.landandhomesconsult.org/img/logo.png"); background-position: top center; background-repeat: no-repeat; color: #000000;" width="680">
                        	<tbody>
                        	<tr>
                        	<td class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                        	<table border="0" cellpadding="0" cellspacing="0" class="heading_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                        	<tr>
                        	<td style="padding-bottom:15px;padding-left:40px;padding-right:40px;padding-top:145px;text-align:center;width:100%;">
                        	<h1 style="margin: 0; color: #232323; direction: ltr; font-family: "Merriwheater", "Georgia", serif; font-size: 27px; font-weight: normal; letter-spacing: 3px; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0; text-transform: uppercase">THANK YOU FOR YOUR MESSAGE <span style="color: white"> '.$fullname.' </span> </h1>
                        	</td>
                        	</tr>
                        	</table>
                        	<table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                        	<tr>
                        	<td style="padding-bottom:20px;padding-left:60px;padding-right:60px;padding-top:20px;">
                        	<div style="font-family: sans-serif">
                        	<div style="font-size: 12px; mso-line-height-alt: 18px; color: #1d1d1b; line-height: 1.5; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
                        	    <p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 24px;"><span style="font-size:16px;"> '.$message.' </span></p>

                                <p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 24px;"><span style="font-size:16px;"> '.$sendMessage.' </span></p>
                                
                                <p style="margin: 0; color: white; font-size: 14px; text-align: center; mso-line-height-alt: 24px;"><span style="font-size:16px;"></span>
                                    <span style="font-size:16px; color: white;">
                                        
                                         Account Name:  LAND AND HOMES CONSULT <br>
                                        Account Number: 9040009771047 <br>
                                        Bank : STANBIC BANK, KNUST BRANCH
                                    </span>
                                </p>
                        	</div>
                        	</div>
                        	</td>
                        	</tr>
                        	</table>
                        	<table border="0" cellpadding="0" cellspacing="0" class="heading_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                        	<tr>
                        	<td style="padding-bottom:20px;padding-left:10px;padding-right:10px;padding-top:20px;text-align:center;width:100%;">
                        	<h2 style="margin: 0; color: #ce460e; direction: ltr; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; font-size: 18px; font-weight: normal; letter-spacing: 3px; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;"><strong>• WE HOPING TO HEAR FROM YOU SOON •</strong></h2>
                        	</td>
                        	</tr>
                        </table>
                        
                        </body>
                        </html>
                    ';

                    mail ($to, $subject, $mailTemplate, $headers);
                
                              
            }catch(PDOException $e){
                $_SESSION['error'] = $e->getMessage();
            }

            http_response_code(200);
            echo json_encode('Thank you for your message. Please check your email for a response.');

        }

    } else {
        http_response_code(400);
        echo json_encode("Ooops");
    }

    exit;

?>