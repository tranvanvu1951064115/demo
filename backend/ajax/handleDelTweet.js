function handleDelTweet(event, tweetId) {
    event.preventDefault();
    event.stopPropagation();
    $.ajax({
        url: 'backend/functions/process/processDelTweet.php',
        type: 'POST',
        data: {
            tweetId: tweetId,
        },
        success: function(tweetId) {
            const tweet = $(`.content__tweet[data-id=${tweetId}]`);
            tweet.attr('style',  'display: none');
            if(location.href.indexOf('tweetWithComments')) {
                location.href = 'http://localhost/twitter/home';
            }
        }                    
    });
}