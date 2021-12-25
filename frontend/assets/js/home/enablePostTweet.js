import {$,$$} from '../variables.js';
export function enablePostTweet() {
    let postTweetBtn = $$('.content__tweet-btn');
    postTweetBtn = [...postTweetBtn];
    const postText = $$('.content__tweet-input');
    [...postText].forEach((input, index) => {
        input.addEventListener('input', function(e) {  
            if(this.value != '') {
                postTweetBtn[index].disabled = false;
            } else {
                postTweetBtn[index].disabled = true;
            }
        })
    })
} 