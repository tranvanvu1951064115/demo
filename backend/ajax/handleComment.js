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
                statusComment: buttonComment.parentElement.querySelector('textarea.content__tweet-input').value
            },
            success() { 
                location.reload();
            }                  
        });
    }   

    // Ẩn box
    document.querySelector(`.content__tweet-reply-content[data-tweet="${forTweet}"]`).style.display = 'none';
}