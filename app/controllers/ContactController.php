<?php

class ContactController
{
    public function __construct($conn) {}
    public function sendEmail()
    {
        if (!isset($_POST['send-email'])) {
            echo json_encode(['success' => false, 'message' => 'Yêu cầu không hợp lệ']);
            exit;
        }
        $userInput = $_POST['userInput'] ?? '';
        $emailInput = $_POST['emailInput'] ?? '';
        $contentInput = $_POST['contentInput'] ?? '';
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

        echo json_encode([
            'success' => true,
            'message' => 'Đã nhận dữ liệu thành công',
            'data' => [
                'userInput' => $userInput,
                'emailInput' => $emailInput,
                'contentInput' => $contentInput
            ]
        ]);
        exit;
    }
}
