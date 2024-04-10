var passwordInput = document.getElementById('password');
var toggleIcon = document.getElementById('password-show-toggle');

toggleIcon.addEventListener('click', function () {
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
    } else {
        passwordInput.type = 'password';
    }
});