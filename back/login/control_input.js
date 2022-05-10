const email2 = document.getElementById('email2');
const password2 = document.getElementById('password2');
const form = document.getElementById('form');
const errorElement = document.getElementById('error');
form.addEventListener('submit', (e) => {
    let messages = []
    if (email2.value === '' || email2.value == null) {
        messages.push('Email is required');
    }
    if (messages.length > 0) {
        e.preventDefault();
        errorElement.innerText = messages.join(', ')
    }
})