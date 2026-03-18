function ktraTen_register() {
    var hoten = /^[\p{Lu}][\p{Ll}]+(?:\s+[\p{Lu}][\p{Ll}]+)+$/u;
    var ht = document.getElementById('fullName').value.trim();
    if (hoten.test(ht)) {
        document.getElementById('eName').innerHTML = '';
        return true;
    } else {
        document.getElementById('eName').innerHTML = 'Sai định dạng. Vui lòng nhập lại (Có dấu, ít nhất 2 từ và viết hoa chữ cái đầu tiên)';
        return false;
    }
}

function ktraSDT_register() {
    var phone = /^0[2-9][0-9]{8}$/;
    var sdt = document.getElementById('phone').value.trim();
    if (phone.test(sdt)) {
        document.getElementById('ePhone').innerHTML = '';
        return true;
    } else {
        document.getElementById('ePhone').innerHTML = 'SĐT không hợp lệ. Vui lòng nhập lại!';
        return false;
    }
}

function ktraEmail_register() {
    var email = /^[\w.]+@(gmail|yahoo|outlook|hotmail)\.com$/;
    var em = document.getElementById('email').value.trim();
    if (email.test(em)) {
        document.getElementById('eEmail').innerHTML = '';
        return true;
    } else {
        document.getElementById('eEmail').innerHTML = 'Email không hợp lệ. Vui lòng nhập lại!';
        return false;
    }
}

function ktraUser() {
    var user = /^[A-Za-z][A-Za-z0-9_]{5,19}$/;
    var us = document.getElementById('username').value.trim();
    if (user.test(us)) {
        document.getElementById('eUser').innerHTML = '';
        return true;
    } else {
        document.getElementById('eUser').innerHTML = 'Tên đăng nhập 6-20 ký tự, bắt đầu bằng chữ, gồm chữ/số/_';
        return false;
    }
}

function ktraPwd() {
    var mk = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
    var pw = document.getElementById('password').value;
    if (mk.test(pw)) {
        document.getElementById('ePwd').innerHTML = '';
        return true;
    } else {
        document.getElementById('ePwd').innerHTML = 'Mật khẩu ≥8 ký tự, có chữ hoa, chữ thường và số';
        return false;
    }
}

function ktraCPwd() {
    var pw = document.getElementById('password').value;
    var cpw = document.getElementById('confirmPassword').value;
    if (pw === cpw && pw !== '') {
        document.getElementById('eCPwd').innerHTML = '';
        return true;
    } else {
        document.getElementById('eCPwd').innerHTML = 'Mật khẩu nhập lại chưa khớp';
        return false;
    }
}

function ktraDob() {
    var dobInput = document.getElementById('dob');
    var err = document.getElementById('eDob');
    var val = dobInput.value;
    if (!val) {
        err.innerHTML = 'Vui lòng chọn ngày sinh';
        return false;
    }
    var dob = new Date(val);
    var now = new Date();
    var age = now.getFullYear() - dob.getFullYear() - ((now.getMonth() < dob.getMonth() || (now.getMonth() == dob.getMonth() && now.getDate() < dob.getDate())) ? 1 : 0);
    if (age >= 13) {
        err.innerHTML = '';
        return true;
    } else {
        err.innerHTML = 'Bạn cần đủ 13 tuổi';
        return false;
    }
}

// Xử lý khi submit form đăng ký
document.addEventListener('DOMContentLoaded', function() {
    var regForm = document.getElementById('registerForm');
    if (regForm) {
        regForm.addEventListener('submit', function(e) {
            e.preventDefault();
            var ok = ktraUser() && ktraTen_register() && ktraEmail_register() &&
                     ktraSDT_register() && ktraDob() && ktraPwd() && ktraCPwd() &&
                     document.getElementById('agree').checked;
            if (!ok) return;

            alert('Đăng ký thành công!');
            window.location.href = './home2.html';
        });
    }
});
