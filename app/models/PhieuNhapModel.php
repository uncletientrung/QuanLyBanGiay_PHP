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
        $next = ($row['max_mapn'] ?? 0) + 1;
        return 'PN' . str_pad($next, 3, '0', STR_PAD_LEFT);
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
                $upd = $this->db->prepare(
                    "UPDATE sanphamsize SET soluong = soluong + ? WHERE masp = ? AND masize = ?"
                );
                foreach ($products as $p) {
                    $upd->execute([$p['soluong'], $p['masp'], $p['masize']]);
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
                $upd = $this->db->prepare(
                    "UPDATE sanphamsize SET soluong = soluong + ? WHERE masp = ? AND masize = ?"
                );
                foreach ($products as $p) {
                    $upd->execute([$p['soluong'], $p['masp'], $p['masize']]);
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
