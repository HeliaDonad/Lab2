function togglePasswordVisibility() {
    var passwordField = document.getElementById('password');
    var eyeIcon = document.getElementById('eye-icon');

    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        eyeIcon.src = '../images/iconen/eye-open.svg';
    } else {
        passwordField.type = 'password';
        eyeIcon.src = '../images/iconen/eye-closed.svg';
    }
}