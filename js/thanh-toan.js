
// ===== 1) HÀM ĐỊNH DẠNG VND =====
function dinhDangVND(n) { return n.toLocaleString('vi-VN') + 'đ'; }

// ===== 2) CẬP NHẬT TỔNG TIỀN =====
function capNhatTongTien() {
    let rows = document.querySelectorAll('#cart-body tr');
    let tamTinh = 0;
    rows.forEach(row => {
        let priceText = row.children[1].textContent.replace(/[^\d]/g, '');
        let qty = parseInt(row.querySelector('.qty').value) || 1;
        let price = parseInt(priceText);
        let line = price * qty;
        row.children[3].textContent = dinhDangVND(line);
        tamTinh += line;
    });

    let phiShip = 20000; // Phí ship cố định
    document.getElementById('subTotal').textContent = dinhDangVND(tamTinh);
    document.getElementById('shipFee').textContent = dinhDangVND(phiShip);
    document.getElementById('grandTotal').textContent = dinhDangVND(tamTinh + phiShip);
}

// ===== 3) GẮN SỰ KIỆN XOÁ VÀ THAY ĐỔI SỐ LƯỢNG =====
function ganSuKien() {
    document.querySelectorAll('.btn-xoa').forEach(btn => {
        btn.addEventListener('click', function () {
            this.closest('tr').remove();
            capNhatTongTien();
        });
    });

    document.querySelectorAll('.qty').forEach(input => {
        input.addEventListener('change', function () {
            if (this.value < 1) this.value = 1;
            capNhatTongTien();
        });
    });
}

// ===== 4) KIỂM TRA FORM =====
function ktraTen() {
    var ten = /^[A-ZÀ-Ỹ][a-zà-ỹ]+(\s[A-ZÀ-Ỹ][a-zà-ỹ]+)+$/;
    var ht = document.getElementById("fullName").value;
    if (ten.test(ht)) { document.getElementById("err1").innerHTML = ""; return true; }
    document.getElementById("err1").innerHTML = "Tên không hợp lệ!"; return false;
}

function ktraSDT() {
    var sdt = /^0[2-9]{1}[0-9]{8}$/;
    var val = document.getElementById("phone").value;
    if (sdt.test(val)) { document.getElementById("err2").innerHTML = ""; return true; }
    document.getElementById("err2").innerHTML = "SĐT không hợp lệ!"; return false;
}

function ktraEmail() {
    var email = /^[\w.]+@(gmail|yahoo|outlook|hotmail)\.com$/;
    var val = document.getElementById("email").value;
    if (email.test(val)) { document.getElementById("err4").innerHTML = ""; return true; }
    document.getElementById("err4").innerHTML = "Email không hợp lệ!"; return false;
}

function ktraDiaChi() {
    var dc = /^[A-Za-zÀ-ỹ0-9\s,./-]{10,150}$/;
    var val = document.getElementById("address").value.trim();
    if (dc.test(val)) { document.getElementById("err3").innerHTML = ""; return true; }
    document.getElementById("err3").innerHTML = "Địa chỉ không hợp lệ!"; return false;
}

// ===== 5) THANH TOÁN =====
function thanhtoan(event) {
    event.preventDefault();
    let hopLe = ktraTen() && ktraSDT() && ktraEmail() && ktraDiaChi();
    if (!hopLe) {
        alert("Vui lòng nhập đủ và đúng thông tin bắt buộc!");
        return false;
    }

    alert("Thanh toán thành công!");
    return true;
}

// ===== 6) CHẠY KHI TRANG LOAD =====
document.addEventListener('DOMContentLoaded', function () {
    capNhatTongTien();
    ganSuKien();
    document.getElementById('btn-pay').addEventListener('click', thanh-toan);
});

// ===== 7) HIỂN THỊ THÔNG TIN NGÂN HÀNG =====
document.querySelectorAll('input[name="paymentMethod"]').forEach(radio => {
    radio.addEventListener('change', function () {
        const bankInfo = document.getElementById('bankInfo');
        if (this.value === 'bank') {
            bankInfo.style.display = 'block';
        } else {
            bankInfo.style.display = 'none';
        }
    });
});
