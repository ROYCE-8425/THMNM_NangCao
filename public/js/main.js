// public/js/main.js
function validateForm() {
    let name = document.getElementById('name').value;
    let price = document.getElementById('price').value;
    let errors = [];

    if (name.length < 10 || name.length > 100) {
        errors.push('Tên sản phẩm phải có từ 10 đến 100 ký tự.');
    }
    
    if (price <= 0 || isNaN(price)) {
        errors.push('Giá phải là một số dương lớn hơn 0.');
    }
    
    if (errors.length > 0) {
        // Tương lai có thể dùng thư viện thông báo đẹp hơn như SweetAlert
        alert("Có lỗi xảy ra:\n\n" + errors.join('\n'));
        return false;
    }
    
    return true;
}

// Thêm hiệu ứng fade in khi tải trang
document.addEventListener("DOMContentLoaded", function() {
    document.body.style.opacity = 0;
    let fadeEffect = setInterval(function () {
        if (!document.body.style.opacity) {
            document.body.style.opacity = 0;
        }
        if (document.body.style.opacity < 1) {
            document.body.style.opacity = parseFloat(document.body.style.opacity) + 0.1;
        } else {
            clearInterval(fadeEffect);
        }
    }, 20);
});
