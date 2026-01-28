<?php
class ProductModel extends Database {

    public function get8ProductsHome() {
        $sql = "
            SELECT 
                sp.masp,
                sp.tensp,
                sp.motasp,
                sp.gianhap,
                sp.tyleloinhuan,
                h.tenhang,
                ha.path AS anhchinh
            FROM sanpham sp
            JOIN hang h ON sp.hang = h.mahang
            JOIN hinhanh ha ON sp.masp = ha.masp AND ha.ismain = 1
            WHERE sp.trangthai = 1
            LIMIT 8
        ";

        return $this->queryAll($sql); 
    }
}
