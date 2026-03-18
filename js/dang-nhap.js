function ktraUser_login() {
    var user = /^[A-Za-z][A-Za-z0-9_]{5,19}$/;
    var email = /^[\w.]+@(gmail|yahoo|outlook|hotmail)\.com$/;
    var us = document.getElementById('loginUsername').value.trim();
    var err = document.getElementById('eLoginUser');

    if (!us) {
        err.innerHTML = 'Vui lòng nhập tên đăng nhập hoặc email';
        return false;
    } else if (!user.test(us) && !email.test(us)) {
        err.innerHTML = 'Tên đăng nhập hoặc email không hợp lệ!';
        return false;
    } else {
        err.innerHTML = '';
        return true;
    }
}

function ktraPwd_login() {
    var mk = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
    var pw = document.getElementById('loginPassword').value;
    var err = document.getElementById('eLoginPwd');

    if (!pw) {
        err.innerHTML = 'Vui lòng nhập mật khẩu';
        return false;
    } else if (!mk.test(pw)) {
        err.innerHTML = 'Mật khẩu không hợp lệ (≥8 ký tự, có hoa, thường, số)';
        return false;
    } else {
        err.innerHTML = '';
        return true;
    }
}

document.addEventListener('DOMContentLoaded', function() {
    var loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            var ok = ktraUser_login() && ktraPwd_login();
            if (!ok) return;

            alert('Đăng nhập thành công!');
            window.location.href = './home2.html';
        });
    }
});
