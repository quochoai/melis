<?php
  include("../mail/mail.php");
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $facebook = $_POST['facebook'];
  $question = $_POST['question'];
  $body = "<strong>Thông tin khách hàng đăng ký tư vấn chuyên sâu:</strong><br />";
  $body .= "<strong>Họ tên: </strong> $fullname<br />";
  $body .= "<strong>Email: </strong> $email<br />";
  $body .= "<strong>Điện thoại: </strong>$phone<br />";
  $body .= "<strong>Facebook: </strong>$facebook<br /><br />";
  $body .= "<strong>Câu hỏi gửi bác sĩ: </strong><br />";
  $body .= $question;
  send_gmail("quochoai.2202@gmail.com","Melis Beauté","Đăng ký tư vấn chuyên sâu",$body,$fullname);
  echo '1';