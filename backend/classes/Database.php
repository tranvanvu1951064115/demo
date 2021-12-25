<?php
    // TẠO CLASS ĐỂ KẾT NỐI CƠ SỞ DỮ LIỆU
    // VÀ SỬ DỤNG PREPARE STATEMENT 
    class Database{
        // Tạo thuộc tính để liên kết với database
        protected $pdo;
        protected static $instance;

        // Tạo hàm khởi tạo
        protected function __construct() {
            // Khởi tạo giá trị mặc định khi class Database được tạo.
            $this->pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASS);
        }

        // Tự tạo chính đối tượng này khi thực thi phương thức này.
        public static function instance() {
            if(self::$instance === null) {
                self::$instance = new self;
            }
            return self::$instance;
        }

        // Phương thức call được gọi khi bạn gọi đến phương thức không được gọi trong đối tượng
        // Có hai tham số truyền vào $method là phương thức bạn gọi đang chưa có trong đối tượng
        // Tham số thứ hai $args là một mảng chứa những tham số bạn truyền vào hàm chưa có trong đối tượng
        public function __call($method, $args) {
            // Đoạn return bên dưới tương tự câu lệnh $this->pdo->$method($args);
            // Nếu đoạn mã được thực thi nó sẽ thực hiện câu lệnh sql sau đó trả về sql result
            return call_user_func_array(array($this->pdo, $method), $args);
        }
    }
?>  