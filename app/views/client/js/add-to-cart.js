document.addEventListener('click', function (e) {
    if (!e.target.classList.contains('add-to-cart-btn')) return;
    e.preventDefault();
    const btn = e.target;
    const ma_sp = btn.dataset.maSp;
    const so_luong = btn.dataset.qty || 1;

    if (!ma_sp) {
        alert('Mã sản phẩm không hợp lệ.');
        return;
    }

    const form = new FormData();
    form.append('ma_sp', ma_sp);
    form.append('so_luong', so_luong);

    fetch('index.php?controller=GioHang&action=themVaoGio', {
        method: 'POST',
        body: form,
        credentials: 'same-origin'
    })
    .then(res => res.json())
    .then(data => {
        if (data && data.success) {
            const badge = document.getElementById('cartCountBadge');
            if (badge) badge.innerText = data.cartCount || 0;
            alert(data.message || 'Đã thêm vào giỏ hàng');
        } else {
            alert((data && data.message) || 'Không thể thêm vào giỏ hàng');
        }
    })
    .catch(() => {
        alert('Lỗi kết nối, vui lòng thử lại.');
    });
});
