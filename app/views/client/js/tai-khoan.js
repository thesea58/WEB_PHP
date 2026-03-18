const editBtn = document.getElementById('editBtn');
const saveBtn = document.getElementById('saveBtn');
const formInputs = document.querySelectorAll('#profileForm input');
const genderInputs = document.querySelectorAll('#profileForm input[name="gender"]');

// Khi bấm Sửa hồ sơ
editBtn.addEventListener('click', (e) => {
    e.preventDefault();

    // Cho phép chỉnh sửa các ô nhập (trừ radio)
    formInputs.forEach(input => {
        if (input.type !== 'radio') input.removeAttribute('readonly');
    });

    // Cho phép chọn giới tính
    genderInputs.forEach(g => g.disabled = false);

    // Ẩn nút Sửa, hiện nút Lưu
    editBtn.classList.add('d-none');
    saveBtn.classList.remove('d-none');
});

// Khi bấm Lưu thay đổi
saveBtn.addEventListener('click', (e) => {
    e.preventDefault();

    // Khóa lại tất cả các ô nhập
    formInputs.forEach(input => {
        if (input.type !== 'radio') input.setAttribute('readonly', true);
    });

    // Khóa lại giới tính
    genderInputs.forEach(g => g.disabled = true);

    // Ẩn nút Lưu, hiện nút Sửa lại
    saveBtn.classList.add('d-none');
    editBtn.classList.remove('d-none');

    // Hiển thị thông báo
    alert('Hồ sơ của bạn đã được cập nhật thành công!');
});
