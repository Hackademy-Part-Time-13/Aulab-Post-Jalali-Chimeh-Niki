/* eye 1 */
var passwordInput = document.getElementById('password');
var toggleIcon = document.getElementById('password-show-toggle');

toggleIcon.addEventListener('click', function () {
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
    } else {
        passwordInput.type = 'password';
    }
});

/* eye 2 */
var confirmPasswordInput = document.getElementById('password_confirmation');
var toggleIcon2 = document.getElementById('password-confirmation-show-toggle');

toggleIcon2.addEventListener('click', function () {
    if (confirmPasswordInput.type === 'password') {
        confirmPasswordInput.type = 'text';
    } else {
        confirmPasswordInput.type = 'password';
    }
});

