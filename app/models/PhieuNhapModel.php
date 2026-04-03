<?php
class PhieuNhapModel
{
    private $db;

    public function __construct($conn)
    {
        $this->db = $conn;
    }

    public function getAll()
    {
        $sql = "SELECT p.*, a.hoten as tenadmin, n.tenncc 
                FROM phieunhap p 
                LEFT JOIN admin a ON p.maadmin = a.maadmin 
                LEFT JOIN nhacungcap n ON p.mancc = n.mancc 
                ORDER BY p.mapn DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNextMaPN()
    {
        $sql  = "SELECT MAX(mapn) as max_mapn FROM phieunhap";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $row  = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int)($row['max_mapn'] ?? 0) + 1;
    }

    public function deleteById($id)
    {
        try {
            $this->db->beginTransaction();

            $stmt1 = $this->db->prepare("DELETE FROM ctphieunhap WHERE mapn = ?");
            $stmt1->execute([$id]);

            $stmt2 = $this->db->prepare("DELETE FROM phieunhap WHERE mapn = ?");
            $stmt2->execute([$id]);

            $this->db->commit();
            return true;
        } catch (Exception $e) {
            $this->db->rollBack();
            return false;
        }
    }

    public function getById($id)
    {
        $sql = "SELECT p.*, a.hoten as tenadmin, n.tenncc 
            FROM phieunhap p
            LEFT JOIN admin a ON p.maadmin = a.maadmin
            LEFT JOIN nhacungcap n ON p.mancc = n.mancc
            WHERE p.mapn = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getChiTiet($id)
    {
        $sql = "SELECT ct.*, s.tensp, sz.tensize
            FROM ctphieunhap ct
            JOIN sanpham s  ON ct.masp   = s.masp
            LEFT JOIN size sz ON ct.masize = sz.masize
            WHERE ct.mapn = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($ngaynhap, $trangthai, $products, $maadmin, $mancc)
    {
        try {
            $this->db->beginTransaction();

            $tongtien = array_sum(array_map(fn($p) => $p['soluong'] * $p['dongia'], $products));
            $stmt = $this->db->prepare(
                "INSERT INTO phieunhap (maadmin, mancc, thoigiantao, trangthai, tongtien)
             VALUES (?, ?, ?, ?, ?)"
            );
            $stmt->execute([$maadmin, $mancc, $ngaynhap, $trangthai, $tongtien]);
            $mapn = $this->db->lastInsertId();

            $ins = $this->db->prepare(
                "INSERT INTO ctphieunhap (mapn, masp, masize, soluong, dongia)
             VALUES (?, ?, ?, ?, ?)"
            );
            foreach ($products as $p) {
                $ins->execute([$mapn, $p['masp'], $p['masize'], $p['soluong'], $p['dongia']]);
            }

            if ((int)$trangthai === 1) {
                foreach ($products as $p) {
                    $masp = $p['masp'];
                    $soluongNhap = (int)$p['soluong'];
                    $giaNhapMoi = (float)$p['dongia'];

                    $sqlCurrent = "SELECT gianhap, 
                               (SELECT COALESCE(SUM(soluong), 0) FROM sanphamsize WHERE masp = s.masp) as tong_ton
                               FROM sanpham s WHERE masp = ?";
                    $stmtCurrent = $this->db->prepare($sqlCurrent);
                    $stmtCurrent->execute([$masp]);
                    $currentData = $stmtCurrent->fetch(PDO::FETCH_ASSOC);

                    $giaHienTai = (float)$currentData['gianhap'];
                    $tongTonHienTai = (int)$currentData['tong_ton'];

                    // GiaBinhQuan = (TonCu * GiaCu + SLMoi * GiaMoi) / (TonCu + SLMoi)
                    $tongSoLuongSauNhap = $tongTonHienTai + $soluongNhap;
                    if ($tongSoLuongSauNhap > 0) {
                        $giaBinhQuan = (($tongTonHienTai * $giaHienTai) + ($soluongNhap * $giaNhapMoi)) / $tongSoLuongSauNhap;
                    } else {
                        $giaBinhQuan = $giaNhapMoi;
                    }

                    // Cập nhập giá mới vo cột gianhap của sp
                    $updPrice = $this->db->prepare("UPDATE sanpham SET gianhap = ? WHERE masp = ?");
                    $updPrice->execute([$giaBinhQuan, $masp]);
                    $updStock = $this->db->prepare(
                        "UPDATE sanphamsize SET soluong = soluong + ? WHERE masp = ? AND masize = ?"
                    );
                    $updStock->execute([$soluongNhap, $masp, $p['masize']]);
                }
            }

            $this->db->commit();
            return true;
        } catch (Exception $e) {
            $this->db->rollBack();
            return false;
        }
    }

    public function update($mapn, $ngaynhap, $trangthai, $products, $mancc)
    {
        try {
            $this->db->beginTransaction();

            $tongtien = array_sum(array_map(fn($p) => $p['soluong'] * $p['dongia'], $products));

            $stmt = $this->db->prepare(
                "UPDATE phieunhap SET thoigiantao = ?, trangthai = ?, tongtien = ?, mancc = ?
             WHERE mapn = ?"
            );
            $stmt->execute([$ngaynhap, $trangthai, $tongtien, $mancc, $mapn]);
            $this->db->prepare("DELETE FROM ctphieunhap WHERE mapn = ?")->execute([$mapn]);

            $ins = $this->db->prepare(
                "INSERT INTO ctphieunhap (mapn, masp, masize, soluong, dongia)
             VALUES (?, ?, ?, ?, ?)"
            );
            foreach ($products as $p) {
                $ins->execute([$mapn, $p['masp'], $p['masize'], $p['soluong'], $p['dongia']]);
            }

            if ((int)$trangthai === 1) {
                foreach ($products as $p) {
                    $masp = $p['masp'];
                    $soluongNhap = (int)$p['soluong'];
                    $giaNhapMoi = (float)$p['dongia'];

                    $sqlCurrent = "SELECT gianhap, 
                               (SELECT COALESCE(SUM(soluong), 0) FROM sanphamsize WHERE masp = s.masp) as tong_ton
                               FROM sanpham s WHERE masp = ?";
                    $stmtCurrent = $this->db->prepare($sqlCurrent);
                    $stmtCurrent->execute([$masp]);
                    $currentData = $stmtCurrent->fetch(PDO::FETCH_ASSOC);

                    $giaHienTai = (float)$currentData['gianhap'];
                    $tongTonHienTai = (int)$currentData['tong_ton'];

                    $tongSoLuongSauNhap = $tongTonHienTai + $soluongNhap;
                    if ($tongSoLuongSauNhap > 0) {
                        $giaBinhQuan = (($tongTonHienTai * $giaHienTai) + ($soluongNhap * $giaNhapMoi)) / $tongSoLuongSauNhap;
                    } else {
                        $giaBinhQuan = $giaNhapMoi;
                    }

                    $updPrice = $this->db->prepare("UPDATE sanpham SET gianhap = ? WHERE masp = ?");
                    $updPrice->execute([$giaBinhQuan, $masp]);
                    $updStock = $this->db->prepare(
                        "UPDATE sanphamsize SET soluong = soluong + ? WHERE masp = ? AND masize = ?"
                    );
                    $updStock->execute([$soluongNhap, $masp, $p['masize']]);
                }
            }

            $this->db->commit();
            return true;
        } catch (Exception $e) {
            $this->db->rollBack();
            return false;
        }
    }
}
