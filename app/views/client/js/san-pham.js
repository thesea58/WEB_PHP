document.addEventListener("DOMContentLoaded", function() {
    // Nút tăng
    document.addEventListener("click", function(e) {
        if (e.target.classList.contains("btn-increase")) {
            const input = e.target.parentElement.querySelector(".quantity-input");
            input.value = parseInt(input.value) + 1;
        }

    // Nút giảm
        if (e.target.classList.contains("btn-decrease")) {
            const input = e.target.parentElement.querySelector(".quantity-input");
            if (parseInt(input.value) > 1) input.value = parseInt(input.value) - 1;
        }
    });

    // Khi bất kỳ modal nào đóng → reset input về 1
    document.querySelectorAll(".modal").forEach(modal => {
        modal.addEventListener("hidden.bs.modal", function() {
            const inputs = modal.querySelectorAll(".quantity-input");
            inputs.forEach(input => input.value = 1);
        });
    });
});
