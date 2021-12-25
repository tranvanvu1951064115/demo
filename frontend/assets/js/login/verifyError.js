import {$, $$, loginInput} from '../variables.js';
const  formTitle = $('.login .form-title');
const errorElem = document.createElement('span');
errorElem.classList.add('errorEmail');
errorElem.innerHTML = "Please verify your information before logging in";
Object.assign(errorElem.style, {
    display: 'block',
    fontSize: '16px',
    color: 'red',
    fontWeight: '600',
    marginTop: '10px'
});
formTitle.appendChild(errorElem);

[...loginInput].forEach(input => {
    // KHI FOCUS THÌ LOẠI BỎ LỖI
    input.addEventListener('focus', () => {
        formTitle.innerHTML = "Login to Twitter";
    })
})

