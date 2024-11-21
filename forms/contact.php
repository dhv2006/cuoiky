<?php
// Thay thế địa chỉ email thật của bạn
$receiving_email_address = 'huuvan.sbc@gmail.com';

// Kiểm tra nếu tệp thư viện PHP Email Form tồn tại
if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

// Tạo đối tượng PHP_Email_Form
$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];

// Nếu muốn sử dụng SMTP để gửi email, hãy bỏ ghi chú đoạn mã dưới và điền thông tin SMTP của bạn
/*
$contact->smtp = array(
  'host' => 'example.com',
  'username' => 'example',
  'password' => 'pass',
  'port' => '587'
);
*/

$contact->add_message($_POST['name'], 'From');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10);

// Kiểm tra và gửi email, trả về thông báo phù hợp
if ($contact->send()) {
    echo 'OK';
} else {
    echo 'Form submission failed.';
}
?>
