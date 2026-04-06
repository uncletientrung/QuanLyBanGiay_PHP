<?php
class AdminModel
{
    private $db; // Biến lưu kết nối db

    public function __construct($conn)
    {
        $this->db = $conn;
    }

    public function checkLogin($email, $password)
    {
        $sql = "SELECT * FROM admin WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':email' => $email
        ]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return json_encode(["status" => "error", "message" => "Tài khoản không tồn tại!"]);
        }

        if ($password === $user['password']) {
            $token = bin2hex(random_bytes(32));
            $this->updateToken($user['maadmin'], $token);
            setcookie("admin_token", $token, time() + (7 * 24 * 3600), "/", "", false, true);
            $_SESSION['admin_logged'] = true;
            $_SESSION['admin_user'] = $user;

            return json_encode(["status" => "success", "message" => "Đăng nhập thành công!"]);
        } else {
            return json_encode(["status" => "error", "message" => "Sai mật khẩu!"]);
        }
    }

    public function updateToken($maadmin, $token)
    {
        $sql = "UPDATE admin SET token = :token WHERE maadmin = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':token' => $token, ':id' => $maadmin]);
    }

    public function validateToken($token)
    {
        $sql = "SELECT * FROM admin WHERE token = :token";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':token' => $token]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $_SESSION['admin_logged'] = true;
            $_SESSION['admin_user'] = $user;
            return true;
        }
        return false;
    }

    public function getAdminById($id)
    {
        $sql = "SELECT * FROM admin WHERE maadmin = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProfile($maadmin, $hoten, $email, $sdt)
    {
        $sql = "UPDATE admin SET hoten = :hoten, email = :email, sdt = :sdt WHERE maadmin = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':hoten' => $hoten,
            ':email' => $email,
            ':sdt' => $sdt,
            ':id' => $maadmin
        ]);
    }

    public function updatePassword($maadmin, $newPassword)
    {
        $sql = "UPDATE admin SET password = :pass WHERE maadmin = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':pass' => $newPassword,
            ':id' => $maadmin
        ]);
    }

    public function changePassword($maadmin, $currentPassword, $newPassword)
    {
        $user = $this->getAdminById($maadmin);

        if ($currentPassword !== $user['password']) {
            return json_encode(["status" => "danger", "message" => "Mật khẩu hiện tại không đúng!"]);
        }

        if ($this->updatePassword($maadmin, $newPassword)) {
            return json_encode(["status" => "success", "message" => "Đổi mật khẩu thành công!"]);
        }

        return json_encode(["status" => "danger", "message" => "Lỗi hệ thống, không thể đổi mật khẩu!"]);
    }

    public function updateAdminProfile($maadmin, $hoten, $email, $sdt)
    {
        $sql = "UPDATE admin SET hoten = :hoten, email = :email, sdt = :sdt WHERE maadmin = :id";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([
            ':hoten' => $hoten,
            ':email' => $email,
            ':sdt' => $sdt,
            ':id' => $maadmin
        ]);

        if ($result) {
            return json_encode(["status" => "success", "message" => "Cập nhật thông tin thành công!"]);
        }
        return json_encode(["status" => "danger", "message" => "Không có thay đổi hoặc có lỗi xảy ra!"]);
    }

    public function logout()
    {
        if (isset($_SESSION['admin_user'])) {
            $id = $_SESSION['admin_user']['maadmin'];
            $this->updateToken($id, NULL);
        }
        setcookie("admin_token", "", time() - 3600, "/");
        session_destroy();
        return true;
    }
}
