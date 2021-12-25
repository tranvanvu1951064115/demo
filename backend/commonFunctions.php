<?php 
    // Khởi tạo hàm loại bỏ kí tự đặc biệt
    function removeSpecialCharacters($string) {
        return htmlspecialchars($string);
    }

    // Khởi tạo phương thức kiểm tra phương thức request lên server có phải là 
    // POST hay không
    // Chúng ta sẽ chỉ sử dụng POST vì tính bảo mật thay vì sử dụng phương thức GET
    function is_post_request() {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    function is_get_request() {
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }

    // Khởi tạo hàm tạo url
    function url_for($script) {
        // Nối chuỗi kết nối để dẫn tới trang đích
        return WWW_ROOT.$script;
    }

    function redirect_to($location) {
        // Nếu chuỗi $location truyền vào là verification 
        // Khi đó nó sẽ được chuyển đổi thành verification.php để truy cập trang
        // Dựa vào file .htaccess 
        header("location:".$location);
        // Exit giúp dừng chương trình không đọc những tập tin php ở bên dưới
        exit();
    }

    function resetSESSIONFor($name) {
        unset($_SESSION[$name]);
    }
?>