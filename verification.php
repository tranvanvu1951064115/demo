<?php 
    // Thiết lập tiêu đề tương ứng với từng trang
    $pageTitle = "Verify your Account / Twitter";
    // Lấy dữ liệu header từ tệp header
    include 'backend/shared/header.php';
    // Gọi tệp initialize
    include 'backend/initialize.php';
    // Khởi tạo mảng chứa lỗi
    $errors = array();

    // TẠO LIÊN KẾT 
    if(isset($_SESSION['userSubmited'])) {
        // Trang signUp đã thiết lập truyền SESSION với key là userSubmited có value là user_id đã được thêm vào csdl
        $user_id = $_SESSION['userSubmited'];
        // Lấy dữ liệu người dùng vừa đăng kí tài khoản
        $user = userData($user_id);
        // Tạo ra liên kết để xác thực người dùng
        $link = generateLink();

        // GỬI MAIL XÁC THỰC
        // Tạo ra message để gửi tới người dùng
        $message = "{$user->user_firstName}, Your account has been created, Please visit this link to verify your email <a href='http://localhost/twitter/verification/$link'>Verify link</>";
        // Tạo ra tiêu đề gửi tới người dùng xác thực
        $subject = "[TWITTER] Please verify your account";
        // Gửi tới người dùng để xác thực
        sendToMail($user->user_email, $message, $subject);

        // THÊM USER VÀO BẢNG VERIFICATION
        // Thêm thông tin người dùng đã xác thực vào bảng trong csdl
        insert("tb_verification", ['user_id' => $user_id, 'code' => $link]);
    } else {
        // Nếu không có biến userSubmited thì tức là người dùng chưa được chèn vào trong bảng USER 
        // Khi đó sẽ trực tiếp quay trở lại trang index
        redirect_to(url_for("index"));
    }

    // QUY TRÌNH THỰC THI 
    // 1: KIỂM TRA XEM CÓ PHẢI LÀ SỬ DỤNG GET HAY KHÔNG
    // 2: NẾU CÓ: LẤY ID CỦA NGƯỜI DÙNG ĐÃ SUBMIT
    // 3: LẤY MÃ CODE XÁC THỰC CỦA NGƯỜI DÙNG
    // 4: KIỂM TRA THỜI GIAN NGƯỜI DÙNG XÁC THỰC TRÊN FORM VỚI THỜI GIAN CỦA NGƯỜI DÙNG ĐÃ SUBMIT FORM, 
    // NẾU NHỎ HƠN THÌ ĐƯA RA LỖI HẾT HẠN ĐƯỜNG LINK, 
    // NGƯỢC LẠI THÌ CẬP NHẬT TRƯỜNG CODE VÀO TRONG BẢNG VERIFICATION VÀ STATUS BẰNG 1 BIỂU THỊ người dùng đã xác thực
    // 5><2: NẾU KHÔNG THÌ ĐƯỜNG DẪN SAI
    if(is_get_request()) {
        $user_id = (int)($_SESSION['userSubmited']);
        if(isset($_GET['verify'])) {
            $code = filterString(($_GET['verify']));
            $verifyCode = verifyCode(["*"], $code);
            if($verifyCode) {
                if(date("y-m-d", strtotime($verifyCode->createdAt)) < date("y-m-d")) {
                    $errors['verify'] = "Your verification link has been expired.";
                } else {
                    if(update("tb_verification", $user_id, array("user_id"=>$user_id, "code"=>$code, "status"=>1))) {
                        $_SESSION['isLogginOK'] = $user_id;
                        redirect_to(url_for("home"));
                    }
                }
            } else {
                $errors['verify'] = "Invalid verification link";
            }
        }
    }

?>
    <section class="sign form">
        <!-- FORM-NAV SECTION -->
        <?php include 'backend/shared/formNav.php';?>
        <!-- FORM SECTION -->
        <div class="form-wrapper">
            <div class="form-content">
                <?php 
                    if(isset($_GET['verify']) || !empty($_GET['verify'])) {
                        if(isset($errors['verify'])) {
                            echo "<h2 class='form-title fs-3 text-center lh-base'>{$errors['verify']}</h2>";
                        }
                    } else {
                ?>
                        <h2 class="form-title fs-3 text-center lh-base">A verification email has been sent to <?php echo "<span class='text-primary text-underline'>$user->user_email</span>"?>.<br> Please check <?php echo "<span class='text-primary text-underline'>$user->user_email</span>"?> to verify.</h2>
                    <?php
                    }
                    ?>
            </div>
        </div>
    </section>
    <script src="frontend/assets/js/showPassword.js"></script>
</body>
</html>