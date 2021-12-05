<?php
    // usage
	function orderMail (
			  $toEmail,            // Email address of recipient
			  $toName,             // Name of recipient
			  $fromEmail,          // Email Address of sender
			  $fromName,           // Name of sender 
			  $emailSubject,       // Subject of email
			  $emailTemplate,      // email Templates found under WEB_ROOT/email-templates/ folder
              $address,
              $email,
              $mobile,
              $note 
    ) {
		require_once ROOT_FOLDER.'mail/php-mailer/PHPMailerAutoload.php';        
		$mail = new PHPMailer();

		// set up email recipients and sender
        $mail->CharSet = "UTF-8";
		$mail->From     = $fromEmail;
		$mail->FromName = $fromName;
		$mail->Subject  = $emailSubject;
		$mail->addAddress( $toEmail, $toName );
		$mail->AddReplyTo($fromEmail,$fromName);
		$mail->isHTML( true );
/*
	// Other SETTINGS TO SETUP IN THE FUTURE
		$mail->Host     = 'smtp1.m-powered.org;smtp2.m-powered.org';
		$mail->Mailer   = 'smtp';            
		$mail->SMTPDebug = 3;            
		$mail->isSMTP();
		$mail->Host = "smtp.gmail.com";            
		$mail->SMTPAuth = true;
		$mail->Username = "name@gmail.com";                 
		$mail->Password = "super_secret_password";            
		$mail->SMTPSecure = "tls";            
		$mail->Port = 587;
*/
/*
    $bodym = '<table class="cart-list" border="0" cellpadding="3" cellspacing="0" width="100%" style="border: solid 1px #ee2f25;border-collapse: collapse;margin-bottom: 0;">';
    $bodym .= '<tr style="display: table-row;vertical-align: inherit;">
                <th style="color: #000;background: #ee2f25;font-size: 18px;font-weight: normal;text-transform: uppercase;">Món ăn</th>
                <th style="color: #000;background: #ee2f25;font-size: 18px;font-weight: normal;text-transform: uppercase;">Số lượng</th>
                <th style="color: #000;background: #ee2f25;font-size: 18px;font-weight: normal;text-transform: uppercase;">Đơn giá</th>
                <th style="color: #000;background: #ee2f25;font-size: 18px;font-weight: normal;text-transform: uppercase;">Thành tiền</th>
               </tr>';

            $gids = array();
            $counts = array();
            $tongtien = 0;
            $thanhtien = '';
            $mp = explode("|",$_COOKIE['vuacuagh']);
            foreach($mp as $k=>$v){
                $mpp = explode("!",$v);
                array_push($gids,$mpp[0]);
                array_push($counts,$mpp[1]);
            }
            for ($i=0; $i<count($gids); $i++) {
               $q = "select id,tieude_vi,tieude_en,hinhanh,giaban from h_sanpham where id=".$gids[$i];
        	   $sql = $h->query($q);
        	   $r = $h->fetch_array($sql);
        	   $k++;
               if($i == count($gids)-1) $tdvt = $r["tieude_$lang"];
        	   $gia = number_format($r['giaban'],0,',','.');
               $gia2 = number_format($r['giaban'],0,',','.').' ₫';
        	   $gi = $r['giaban'];
        	   $thanhtien = number_format($gi*$counts[$i],0,',','.');
               $tongtien += $gi*$counts[$i];
               
               $bodym .= '<tr>';
               $bodym .= '  <td style="border: solid 1px #ee2f25;border-collapse: collapse;">'.$r["tieude_vi"].'</td>';
               $bodym .= '  <td style="border: solid 1px #ee2f25;border-collapse: collapse;text-align:center;">'.$counts[$i].'</td>';
               $bodym .= '  <td style="border: solid 1px #ee2f25;border-collapse: collapse;text-align:right;"><span style="display: inline-block;">'.$gia.'</span><span style="margin-left: 5px;display: inline-block;">VNĐ</span></td>';
               $bodym .= '  <td style="border: solid 1px #ee2f25;border-collapse: collapse;text-align:right;"><span style="display: inline-block;">'.$thanhtien.'</span><span style="margin-left: 5px;display: inline-block;">VNĐ</span></td>';
               $bodym .= '</tr>';
         } 
         $bodym .= '</table>';
         $bodym .= '<div style="text-align: right;padding: 5px 0px;line-height: 28px;position: relative;overflow: hidden;">';
         $bodym .= '    <span>Tổng số tiền (đã bao gồm 10% VAT):</span>';
         $bodym .= '    <span style="font-size: 18px;min-width: 160px;font-weight: bold;"><span style="display: inline-block;">'.number_format($tongtien,0,',','.').'</span><span style="margin-left: 5px;display: inline-block;">VNĐ</span></span>';
         $bodym .= '</div>';
*/           
		//read the email template file
		$message = '';
		$template_file = ROOT_FOLDER."mail/email/templates/" . $emailTemplate ;
		$fh = fopen($template_file, "r");	
		
		while(!feof($fh)) {
			$body = fgets($fh);
            $body = str_replace( "{hoten}", $fromName, $body);
			$body = str_replace( "{diachi}", $address, $body);
            $body = str_replace( "{email}", $email, $body);
            $body = str_replace( "{sdt}", $mobile, $body);
            $body = str_replace( "{note}", $note, $body);
            //$body = str_replace( "{noidungmonan}", $bodym, $body);	
			$message .=$body;
		}
		if ( empty($msgSuccess) ) {
			 $msgSuccess = 'Mail has been sent';
		}
		if ( empty($msgFailed) ) {
			 $msgFailed = 'There has been an error sending email';
		}
		$mail->Body = $message;    
		if(!$mail->send()){
			  echo $msgFailed;
		} else {
			  echo '';
		}
		$mail->clearAddresses();  
	}