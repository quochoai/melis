<?php
  include("../require_inc.php");
  $title_form = $_POST['title_form'];
  $processm = $_POST['processm'];
  $fullname = $_POST['fullname'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $demand = $_POST['demand'];
  $booktime = $_POST['booktime'];
  $branch = $_POST['branch'];

  $titlemail = "Dat lich tu van tu website melis";
  $body = "<strong>Thông tin khách hàng:</strong><br /><br />";
  $body .= "<strong>Họ và tên:</strong> $fullname<br />";
  $body .= "<strong>Số điện thoại:</strong> $phone<br />";
  $body .= "<strong>Địa chỉ email:</strong> $email<br /><br />";
  $body .= "<strong>Thông tin khách hàng cần tư vấn</strong><br />";
  if ($title_form != '')
    $body .= "<strong>Tư vấn về:</strong><br /> $title_form<br />";  
  $body .= "<strong>Nhu cầu:</strong> $demand<br />";
  $body .= "<strong>Thời gian:</strong> $booktime<br />";
  $body .= "<strong>Chi nhánh:</strong> $branch<br />";

  include("../mail/mail.php");
  if (send_gmail("quochoai.2202@gmail.com","melisbeaute", $titlemail, $body, "melisbeaute"))
        _e('1');
    else
        _e('2');
