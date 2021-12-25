<?php
// Thiết lập tiêu đề tương ứng với từng trang
$pageTitle = "Home / Twitter";

$isHomepage = true;

// Kết nối cơ sở dữ liệu
include 'backend/initialize.php';

// Lấy dữ liệu header từ tệp header
include 'backend/shared/header.php';

// KIỂM TRA XEM ĐÃ ĐƯỢC CẤP QUYỀN NGƯỜI DÙNG HAY CHƯA
if (!isset($_SESSION['isLogginOK']) || !($_SESSION['isLogginOK'] > 0)) {
    redirect_to(url_for('index'));
}

if (isset($isHomepage)) {
    echo "<script src='./frontend/assets/js/leftSideBar/active.js' type='module' defer></script>";
    echo "<script src='./frontend/assets/js/leftSideBar/popUpUserLogout.js' type='module' defer></script>";
    echo "<script src='./frontend/assets/js/home/app.js' type='module' defer></script>";
    echo "<script src='./frontend/assets/js/home/handleReply.js' defer></script>";
    echo "<script src='./backend/ajax/handleTweet.js' type='module' defer></script>";
    echo "<script src='./backend/ajax/handleDelTweet.js' defer></script>";
    echo "<script src='./backend/ajax/handleLoveTweet.js' defer></script>";
    echo "<script src='./backend/ajax/handleComment.js' defer></script>";
}

$user = userData($_SESSION['isLogginOK']);

?>
<div class="wrapper">
    <div class='overlay'></div>
    <div class="container">
        <div class="row">
            <!----- LEFT SIDE BAR ----->
            <?php include 'backend/shared/leftSidebar.php'; ?>
            <!-- MAIN SECTION -->
            <div class="main col-md-9 p-0 row">
                <!-- CONTENT SECTION -->
                <div class="content col-md-7">
                    <div class="content__header">
                        <h2 class="mb-0">Home</h2>
                        <a href="$" class="content__topTweet">
                            <svg width="20px" height="20px" viewBox="0 0 24 24" aria-hidden="true" class="r-18jsvk2 r-4qtqp9 r-yyyyoo r-z80fyv r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-19wmn03">
                                <g>
                                    <path d="M22.772 10.506l-5.618-2.192-2.16-6.5c-.102-.307-.39-.514-.712-.514s-.61.207-.712.513l-2.16 6.5-5.62 2.192c-.287.112-.477.39-.477.7s.19.585.478.698l5.62 2.192 2.16 6.5c.102.306.39.513.712.513s.61-.207.712-.513l2.16-6.5 5.62-2.192c.287-.112.477-.39.477-.7s-.19-.585-.478-.697zm-6.49 2.32c-.208.08-.37.25-.44.46l-1.56 4.695-1.56-4.693c-.07-.21-.23-.38-.438-.462l-4.155-1.62 4.154-1.622c.208-.08.37-.25.44-.462l1.56-4.693 1.56 4.694c.07.212.23.382.438.463l4.155 1.62-4.155 1.622zM6.663 3.812h-1.88V2.05c0-.414-.337-.75-.75-.75s-.75.336-.75.75v1.762H1.5c-.414 0-.75.336-.75.75s.336.75.75.75h1.782v1.762c0 .414.336.75.75.75s.75-.336.75-.75V5.312h1.88c.415 0 .75-.336.75-.75s-.335-.75-.75-.75zm2.535 15.622h-1.1v-1.016c0-.414-.335-.75-.75-.75s-.75.336-.75.75v1.016H5.57c-.414 0-.75.336-.75.75s.336.75.75.75H6.6v1.016c0 .414.335.75.75.75s.75-.336.75-.75v-1.016h1.098c.414 0 .75-.336.75-.75s-.336-.75-.75-.75z"></path>
                                </g>
                            </svg>
                        </a>
                    </div>
                    <div class="content__post">
                        <form id="postTweetForm" action="" method="post" class="content__post-form">
                            <div class="content__new-tweet">
                                <div class="content__new-tweet-input">
                                    <img width="48px" height="48px" src="<?php echo $user->user_profileImage; ?>" alt="">
                                    <textarea id="contentText" class="content__tweet-input" name="contentText" maxlength="200" value="contentText" placeholder="What's happening?"></textarea>
                                </div>
                                <button id="submitBtn" class="content__tweet-btn btn btn--primary" name="tweetSubmit" value="tweetSubmit" disabled>Tweet</button>
                            </div>
                        </form>
                    </div>
                    <!-- DISPLAY FOR TWEET -->
                    <ul class="content__tweets"></ul>
                </div>
                <!-- RIGHT SIDE BAR SECTION -->
                <div class="r-sidebar col-md-5">
                    R-Sidebar
                </div>
            </div>
        </div>

    </div>
</div>
<?php
// Thực hiện gọi footer
include 'backend/shared/footer.php';
?>