<?php 
    // == KHỞI TẠO CÁC BIẾN Ở TRANG NÀY ==
    // Tạo cache để tối ưu hóa hiệu năng ki gửi request lên server
    ob_start();

    // Thiết lập thời gian timezone mặc định cho việc đẩy dữ liệu kiểu thời gian chính xác theo khu vực lên server
    date_default_timezone_set("Asia/Ho_Chi_Minh");

    // Thiết lập phiên người dùng
    session_start();

    //=========================================================== FILE CONFIG CHỨA NHỮNG THIẾT LẬP ==========================================================
    include "config.php";
    //========================================================================================================================================================


    // =======================================================================================================================================================
    // ===========================================================CLASSES=====================================================================================
    // =======================================================================================================================================================

    //=========================================================== PHPMAILER  =================================================================================
    include "classes/PHPMailer.php";
    //========================================================================================================================================================

    //=========================================================== SMTP: GIAO THỨC GỬI MAIL TẦNG ỨNG DỤNG =====================================================
    include "classes/SMTP.php";
    //========================================================================================================================================================

    //=========================================================== EXCEPTION: BẮT LỖI TRONG QUÁ TRÌNH GỬI MAIL XÁC THỰC =======================================
    include "classes/Exception.php";
    //========================================================================================================================================================
    
    // *******************************************************************************************************************************************************
    // *******************************************************************************************************************************************************
    // *******************************************************************************************************************************************************


    // =======================================================================================================================================================
    // ===========================================================FUNCTION====================================================================================
    // =======================================================================================================================================================

    //=========================================================== CONSTANTS: CHỨA NHỮNG BIẾN THƯỜNG DÙNG =====================================================
    include "functions/constants.php";
    //========================================================================================================================================================

    //=========================================================== COMMON FUNCTIONS: CHỨA NHỮNG HÀM DÙNG CHUNG ================================================
    include "commonFunctions.php";
    //========================================================================================================================================================

    //=========================================================== CONNECT TO DATABASE: KẾT NỐI CƠ SỞ DỮ LIỆU =================================================
    include "functions/connectToDatabase.php";
    //========================================================================================================================================================

    //=========================================================== CONNECT TO DATABASE: KẾT NỐI CƠ SỞ DỮ LIỆU =================================================
    include "functions/filterInput.php";
    //========================================================================================================================================================
    
    //=========================================================== VALIDATE AND INSERT TO CSDL: VALIDATE FORM VÀ TRẢ VỀ THÔNG TIN ID ==========================
    include "functions/validateAndInsertUser.php";
    //========================================================================================================================================================

    //=========================================================== CRUDUSER: GIAO TIẾP VỚI BẢNG USER TRONG CƠ SỞ DỮ LIỆU ==========================================
    include "functions/CRUDDatabase.php";
    //========================================================================================================================================================

    //=========================================================== VERIFY: XỬ LÝ XÁC MINH NGƯỜI DÙNG ======================================================
    include "functions/verify.php";
    //========================================================================================================================================================

    // *******************************************************************************************************************************************************
    // *******************************************************************************************************************************************************
    // *******************************************************************************************************************************************************

    // *******************************************************************************************************************************************************
    // *******************************************************************************************************************************************************
    // *******************************************************************************************************************************************************
?>