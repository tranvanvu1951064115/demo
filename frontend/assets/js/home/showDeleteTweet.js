import {$,$$} from '../variables.js';

export function showDeleteTweet() {
    const detailTweetBtn = $$('.content__tweet-detail');
    [...detailTweetBtn].forEach(button => {
        button.addEventListener('click', function() {
            const deleteButton = button.querySelector('.content__tweet-delete');
            if(deleteButton) {
                deleteButton.classList.toggle('active');
            }
        })
    })
}