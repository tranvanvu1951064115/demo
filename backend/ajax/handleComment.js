function handleComment(event, userReply, forTweet) {
    event.preventDefault();
    event.stopPropagation();
    const buttonComment = event.target;
    if(buttonComment.classList.contains('content__tweet-btn')) {
        $.ajax({
            url: 'backend/functions/process/handleComment.php',
            type: 'POST',
            data: {
                userReply,
                forTweet,
                statusComment: $('#contentReplyText').val()
            },
            success(amountCommentForTweet) { 
                const replyButton = document.querySelector(`.content__tweet[data-id="${forTweet}"] .content__tweet-reply`);
                if(amountCommentForTweet > 0) {
                    replyButton.setAttribute('data-comments', amountCommentForTweet);
                } else {
                    replyButton.setAttribute('data-comments', '');
                }
                document.querySelector(`.content__tweet[data-id="${forTweet}"] .content__tweet-input`).value = '';
            }                  
        });
    }   


    // Ẩn box
    document.querySelector(`.content__tweet-reply-content[data-tweet="${forTweet}"]`).style.display = 'none';
}