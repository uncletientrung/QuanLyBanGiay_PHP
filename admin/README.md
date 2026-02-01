# I. Các chức năng cho người chủ / quản lý của hàng (admin)
#### 1. Giao diện admin: Vũ
- Trang đăng nhập bằng url không dùng chung với khách hàng
- Hiển thị thông tin đăng nhập
- Danh mục chức năng quản trị.
#### 2. Quản lý người dùng: Vũ 
- Hiển thị danh sách thông tin khách hàng
- Thêm tài khoản -> Khởi tạo mật khẩu
- Reset mật khẩu
- Khóa / mở khóa tài khoản
#### 3. Quản lý loại sản phẩm: Khôi
- Thêm loại sản phẩm
#### 4. Quản lý sản phẩm: Khôi
- Thêm sản phẩm: thông tin sản phẩm gồm loại, mã, tên, hình, đơn vị tính, số lượng ban đầu, tỉ lệ lợi nhuận mong muốn, hiện trạng(ẩn = không bán / hiển thị = đang bán), mô tả.
- Sửa sản phẩm: hiển thị đúng thông tin trước khi sửa (gồm sửa & bỏ hình). Đặc biệt chú ý: sửa hiện trạng sản phẩm.
- Xoá sản phẩm (khi chọn xoá sản phẩm: nếu sản phẩm chưa được nhập hàng thì tiến hành xoá hẳn trong csdl, ngược lại đánh dấu ẩn sản phẩm trên website.)
#### 5. Quản lý nhập hàng, lập phiếu nhập hàng: (1 phiếu nhập có thể nhập cho nhiều sản phẩm): Khôi
- Tạo phiếu nhập và lưu trữ căn cứ theo ngày nhập, lần nhập, giá nhập và số lượng nhập. (kết hợp chức năng tìm kiếm sản phẩm để thuận tiện cho người dùng tạo phiếu nhập)
- Sửa phiếu nhập kho (đi kèm với chức năng tìm kiếm phiếu nhập kho) và hoàn thành phiếu nhập kho. (lưu ý: chỉ có thể sửa phiếu nhập trước khi hoàn thành phiếu.)
- Quản lý giá bán
+ Hiển thị & nhập / sửa thông tin tỉ lệ % lợi nhuận theo sản phẩm.
+ Hiển thị & tra cứu giá vốn, % lợi nhuận, giá bán của sản phẩm theo lô hàng đã nhập.

#### 6. Quản lý đơn đặt hàng của khách hàng: Vũ
- Đánh dấu đơn đặt hàng: chưa xử lý (khách hàng mới đặt), đã xác nhận, đã giao thành công hoặc đã huỷ.
- Lọc các đơn đặt hàng trong 1 khoảng thời gian (dựa trên thời gian đơn), thiết kế đường link cho người quản trị xem chi tiết một đơn đặt hàng trong các đơn đặt hàng trên.
- Lọc các đơn đặt hàng theo tình trạng và cho người quản trị sắp xếp các đơn đặt hàng theo địa chỉ giao hàng (theo phường), thiết kế đường link cho người quản trị xem chi tiết một đơn đặt hàng trong các đơn đặt hàng trên
#### 7. Quản lý tồn kho: Khôi
- Tra cứu số lượng tồn của một sản phẩm, của sản phẩm theo loại tại một thời điểm do người dùng định
- Cảnh báo sản phẩm sắp hết hàng (Cho phép người dùng chỉ định số lượng nào được gọi là sắp hết)
- Tra cứu số lượng nhập – xuất – tồn của một sản phẩm, của sản phẩm trong một khoảng thời gian.
#### 8. Thống kê báo cáo: Vũ
- Cho phép người quản trị nhập khoảng thời gian thống kê 5 khách hàng có mức mua hàng cao nhất trong thời gian trên, liệt kê từng đơn hàng (có link cho xem chi tiết) và  tính tổng mua. Dữ liệu được sắp xếp tăng/giảm dần theo tổng tiền mua.

