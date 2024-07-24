document.addEventListener('DOMContentLoaded', function () {
    const quantityContainers = document.querySelectorAll(".quantity");

    quantityContainers.forEach(container => {
        const minusBtn = container.querySelector(".minus");
        const plusBtn = container.querySelector(".plus");
        const inputBox = container.querySelector(".input-box");

        updateButtonStates(inputBox, minusBtn, plusBtn);

        container.addEventListener("click", function(event) {
            if (event.target.classList.contains("minus")) {
                decreaseValue(inputBox, minusBtn, plusBtn);
            } else if (event.target.classList.contains("plus")) {
                increaseValue(inputBox, minusBtn, plusBtn);
            }
        });

        inputBox.addEventListener("input", function() {
            updateButtonStates(inputBox, minusBtn, plusBtn);
        });
    });

    function updateButtonStates(inputBox, minusBtn, plusBtn) {
        const value = parseInt(inputBox.value);
        minusBtn.disabled = value <= 1;
        plusBtn.disabled = value >= parseInt(inputBox.max);
    }

    function decreaseValue(inputBox, minusBtn, plusBtn) {
        let value = parseInt(inputBox.value);
        value = isNaN(value) ? 1 : Math.max(value - 1, 1);
        inputBox.value = value;
        updateButtonStates(inputBox, minusBtn, plusBtn);
        handleQuantityChange(inputBox);
    }

    function increaseValue(inputBox, minusBtn, plusBtn) {
        let value = parseInt(inputBox.value);
        value = isNaN(value) ? 1 : Math.min(value + 1, parseInt(inputBox.max));
        inputBox.value = value;
        updateButtonStates(inputBox, minusBtn, plusBtn);
        handleQuantityChange(inputBox);
    }

    function handleQuantityChange(inputBox) {
        let value = parseInt(inputBox.value);
        value = isNaN(value) ? 1 : value;

        // Thực thi mã của bạn dựa trên giá trị số lượng đã cập nhật
        console.log("Quantity changed:", value);
    }
});
