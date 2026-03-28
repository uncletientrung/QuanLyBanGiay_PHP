<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once __DIR__ . '/../../vendor/autoload.php';

class ContactController
{
 
    public function __construct($conn) {}

    public function sendEmail()
    {
        header('Content-Type: application/json; charset=utf-8');

        if (!isset($_POST['send-email'])) {
            echo json_encode([
                'success' => false,
                'message' => 'Yêu cầu không hợp lệ'
            ]);
            exit;
        }

        $userInput = trim($_POST['userInput'] ?? '');
        $emailInput = trim($_POST['emailInput'] ?? '');
        $contentInput = trim($_POST['contentInput'] ?? '');

        if ($userInput === '' || $emailInput === '' || $contentInput === '') {
            echo json_encode([
                'success' => false,
                'message' => 'Vui lòng nhập đầy đủ thông tin'
            ]);
            exit;
        }

        if (!filter_var($emailInput, FILTER_VALIDATE_EMAIL)) {
            echo json_encode([
                'success' => false,
                'message' => 'Email không hợp lệ'
            ]);
            exit;
        }

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'thihachcf@gmail.com'; // email người gửi
            $mail->Password = 'ejph lznl yseg rpir'; // app password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->CharSet = 'UTF-8';

            $mail->setFrom('thihachcf@gmail.com', 'Shoes Galaxy'); // set người gửi
            $mail->addAddress('dathachcf@gmail.com'); // người nhận
            $mail->addReplyTo($emailInput, $userInput); // Nhấn reply thì trả lời mail của khách hàng chứ k phải người gửi

            $mail->isHTML(true);
            $mail->Subject = 'Liên hệ mới từ website Shoes Galaxy';
            $mail->Body = "
                <h3>Thông tin liên hệ mới</h3>
                <p><strong>Họ tên:</strong> " . htmlspecialchars($userInput) . "</p>
                <p><strong>Email:</strong> " . htmlspecialchars($emailInput) . "</p>
                <p><strong>Nội dung:</strong><br>" . nl2br(htmlspecialchars($contentInput)) . "</p>
            ";

            $mail->AltBody =
                "Thong tin lien he moi\n" .
                "Ho ten: {$userInput}\n" .
                "Email: {$emailInput}\n" .
                "Noi dung: {$contentInput}";

            $mail->send();

            echo json_encode([
                'success' => true,
                'message' => 'Gửi liên hệ thành công'
            ]);
            exit;
        } catch (Exception $e) {
            echo json_encode([
                'success' => false,
                'message' => 'Gửi email thất bại chúng tôi sẽ khắc phục sau ' //. $mail->ErrorInfo
            ]);
            exit;
        }
    }
}
