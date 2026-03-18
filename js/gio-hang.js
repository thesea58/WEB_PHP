document.addEventListener("DOMContentLoaded", function () {
  const selectAll = document.getElementById("selectAll");
  const productChecks = document.querySelectorAll(".product-check");
  const totalPriceEl = document.getElementById("totalPrice");

  // Gán sự kiện chọn tất cả
  selectAll.addEventListener("change", () => {
    productChecks.forEach(c => (c.checked = selectAll.checked));
    updateTotal();
  });

  // Gán sự kiện từng checkbox
  productChecks.forEach(c => c.addEventListener("change", updateTotal));

  // Hàm cập nhật tổng tiền
  function updateTotal() {
    let total = 0;
    productChecks.forEach(check => {
      if (check.checked) {
        const priceText = check
          .closest(".cart-item")
          .querySelector(".col-2.text-danger")
          .innerText.replace(/[^\d]/g, "");
        total += parseInt(priceText || 0);
      }
    });
    totalPriceEl.innerText = total.toLocaleString("vi-VN") + "₫";
  }

  // Nút tăng giảm số lượng
  document.addEventListener("click", function (e) {
    if (e.target.classList.contains("btn-increase")) {
      const input = e.target.parentElement.querySelector(".quantity-input");
      input.value = parseInt(input.value) + 1;
    }

    if (e.target.classList.contains("btn-decrease")) {
      const input = e.target.parentElement.querySelector(".quantity-input");
      if (parseInt(input.value) > 1)
        input.value = parseInt(input.value) - 1;
    }
  });
});
