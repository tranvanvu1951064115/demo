import {enablePostTweet} from '../../frontend/assets/js/home/enablePostTweet.js';
import {getTimePostTweetAgo} from '../../frontend/assets/js/home/getTimePostTweetAgo.js';
import {showDeleteTweet} from '../../frontend/assets/js/home/showDeleteTweet.js';
import {callAjax} from './ajax.js';

function setAndGetPostTweet() {
    // GỌI AJAX
    callAjax('backend/functions/process/handleTweet.php', 'POST', {
        tweetSubmit: 1,
        status: $('#contentText').val(),
    }, function success(data) {
        // LẤY DỮ LIỆU VỀ VÀ RENDER RA GIAO DIỆN
        document.querySelector('.content__tweets').innerHTML = data;
        // THIẾT LẬP ENABLE BUTTON SUBMIT
        enablePostTweet();
        // THIẾT LẬP LẠI THỜI GIAN ĐĂNG BÀI CỦA NGƯỜI DÙNG
        getTimePostTweetAgo();
        // THIẾT LẬP HIỂN THỊ NÚT SUBMIT
        showDeleteTweet();
        // THIẾT LẬP LẠI STATUS CỦA NGƯỜI DÙNG
        $('#contentText').value = '';
        // THIẾT LẬP LẠI FORM
        document.getElementById('postTweetForm').reset();
    });    
}
// XỬ LÝ KHI NGUOIWEF DÙNG THÊM TWEET
if($('#submitBtn')) {
    $('#submitBtn').click(() => {
        event.preventDefault();
        setAndGetPostTweet();
    });
}
// XỬ LÝ KHI LOAD LẠI TRANG
$(document).ready(setAndGetPostTweet);



