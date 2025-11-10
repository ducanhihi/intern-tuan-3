function toggleTheme(e) {
    e.preventDefault()
    document.body.classList.toggle("light-mode")

    const isDarkMode = !document.body.classList.contains("light-mode")
    localStorage.setItem("theme", isDarkMode ? "dark" : "light")
}
document.addEventListener("DOMContentLoaded", () => {
    const savedTheme = localStorage.getItem("theme")

    if (savedTheme === "light") {
        document.body.classList.add("light-mode")
    } else if (savedTheme === null) {

        if (window.matchMedia && window.matchMedia("(prefers-color-scheme: light)").matches) {
            document.body.classList.add("light-mode")
        }
    }
})


document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('.form');

    form.addEventListener('submit', function (e) {
        let isValid = true;

        // Xóa thông báo lỗi cũ
        document.querySelectorAll('.error-message').forEach(el => el.remove());

        function showError(input, message) {
            const error = document.createElement('div');
            error.className = 'error-message';
            error.style.color = 'red';
            error.textContent = message;
            input.parentNode.appendChild(error);
            isValid = false;
        }

        const name = document.getElementById('name');
        if (name.value.trim() === '') {
            showError(name, 'Tên sản phẩm không được để trống.');
        }

        // Kiểm tra danh mục
        const category = document.getElementById('category_id');
        if (category.value === '') {
            showError(category, 'Vui lòng chọn danh mục.');
        }

        const price = document.getElementById('price');
        if (price.value === '') {
            showError(price, 'Giá không được để trống.');
        } else {
            const priceValue = Number(price.value);
            if (priceValue <= 0) {
                showError(price, 'Giá phải lớn hơn 0.');
            } else if (priceValue % 1000 !== 0) {
                showError(price, 'Giá phải là bội số của 1000.');
            }
        }

        const stock = document.getElementById('stock');
        if (stock.value === '') {
            showError(stock, 'Số lượng không được để trống.');
        } else if (Number(stock.value) < 0) {
            showError(stock, 'Số lượng không được âm.');
        }

        const image = document.getElementById('image');
        if (image.files.length > 0) {
            const file = image.files[0];
            const validTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (!validTypes.includes(file.type)) {
                showError(image, 'Chỉ chấp nhận JPG, PNG, GIF.');
            }
            if (file.size > 5 * 1024 * 1024) {
                showError(image, 'Dung lượng ảnh tối đa 5MB.');
            }
        }

        if (!isValid) {
            e.preventDefault(); // Ngăn submit nếu có lỗi
        }
    });
});
