function handleDelTweet(tweetId) {
    $.ajax({
        url: 'backend/functions/process/processDelTweet.php',
        type: 'POST',
        data: {
            tweetId: tweetId,
        },
        success: function(tweetId) {
            const tweet = $(`.content__tweet[data-id=${tweetId}]`);
            tweet.attr('style',  'display: none');
        }                    
    });
}