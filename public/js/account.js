// Đăng xuất
const btnLogout = document.getElementById("account-btn-logout");
btnLogout.addEventListener("click", function () {
    window.location.href = ROOT_URL + "account/logout";
})

// Chỉnh sửa profile
const btnEditProfile = document.getElementById("account-btn-edit-profile");
let isEditing = false;
const formProfile = document.getElementById("profile-form");
const success_alert = document.getElementById("success-message");
const error_alert = document.getElementById("error-message");

btnEditProfile.addEventListener("click", function (e) {
    e.preventDefault();
    isEditing = !isEditing;
    const ListInput = document.querySelectorAll("#profile-form input");
    if (isEditing) {
        ListInput.forEach(input => {
            input.removeAttribute("readonly");
        });
        btnEditProfile.innerHTML = 'LƯU <i class="fas fa-save ms-1"></i>';
        success_alert.style.display = "none";
    } else {
        const formData = new FormData(formProfile); // Trả về name -> value
        fetch(ROOT_URL + "account/update", {
            method: "POST",
            body: formData
        })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    ListInput.forEach(input => {
                        input.setAttribute("readonly", "true");
                    });
                    btnEditProfile.innerHTML = 'CHỈNH SỬA <i class="fas fa-save ms-1"></i>';
                    success_alert.style.display = "flex";
                    error_alert.style.display = "none";
                } else {
                    success_alert.style.display = "none";
                    error_alert.style.display = "flex";
                    error_alert.innerText = data.message;
                    isEditing = true;
                }
            })
            .catch(error => {
                alert(error);
            })
    }
})

// Ẩn/hiện password trên desktop
// let ListInputPassword = document.querySelectorAll("#password-form-desktop input");
// const togglePasswordDesktop = document.getElementById("account-toggle-password-desktop");
// const InputPasswordDesktop = document.getElementById("account-input-edit-password-desktop");
// ListInputPassword.forEach(input => {
//     togglePasswordDesktop.addEventListener("click", function () {
//         const type = input.getAttribute("type");
//         if (type === "password") {
//             input.setAttribute("type", "text");
//             togglePasswordDesktop.innerHTML = '<i class="fas fa-eye-slash"></i>';
//         } else {
//             input.setAttribute("type", "password");
//             this.innerHTML = '<i class="fas fa-eye"></i>';
//         }
//     })
// })

const toggleIcons = document.querySelectorAll(".toggle-password");
toggleIcons.forEach(icon => {
    icon.addEventListener("click", function () {
        // Tìm input nằm trong cùng input-group
        const input = this.parentElement.querySelector("input");
        const type = input.getAttribute("type");
        if (type === "password") {
            input.setAttribute("type", "text");
            this.innerHTML = '<i class="fas fa-eye-slash"></i>';
        } else {
            input.setAttribute("type", "password");
            this.innerHTML = '<i class="fas fa-eye"></i>';
        }
    });
});

// Sửa password trong password-desktop
const btnEditPasswordDesktop = document.getElementById("account-btn-edit-password-desktop");
let isEditingPasswordDesktop = false;
const formPasswordNew = document.getElementById("form-password-new");
const formPasswordConfirm = document.getElementById("form-password-confirm");
const formPasswordChange = document.getElementById("password-form-desktop");
const inputPasswordNew = document.getElementById("account-input-edit-passwordNew-desktop");
const inputPasswordConfirm = document.getElementById("account-input-edit-passwordConfirm-desktop");
btnEditPasswordDesktop.addEventListener("click", function (e) {
    e.preventDefault();
    isEditingPasswordDesktop = !isEditingPasswordDesktop;
    const Input = document.getElementById("account-input-edit-password-desktop");
    if (isEditingPasswordDesktop) {
        Input.removeAttribute("readonly"); // Xóa readonly
        btnEditPasswordDesktop.innerHTML = 'LƯU <i class="fas fa-save ms-1"></i>'; // Đổi chữ
        formPasswordNew.style.display = "flex" // Cho cái phần mật khẩu mới hiện thị
        formPasswordConfirm.style.display = "flex" // Cho cái phần xác nhận mật khẩu  hiện thị
        Input.value = '';
        inputPasswordNew.value = '';
        inputPasswordConfirm.value = '';

    } else {
        //  Xử lý chuyển sang php để lưu vào db
        const formPasswordChangeData = new FormData(formPasswordChange);
        fetch(ROOT_URL + "account/update/password", {
            method: "POST",
            body: formPasswordChangeData
        })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    formPasswordNew.style.display = "none" // Cho cái phần mật khẩu mới ẩn
                    formPasswordConfirm.style.display = "none" // Cho cái phần xác nhận mật khẩu ẩn
                    Input.setAttribute("readonly", "true"); // Đặt ô input mật khẩu không cho sửa
                    Input.value = data['current-password'];
                    btnEditPasswordDesktop.innerHTML = 'CHỈNH SỬA <i class="fas fa-save ms-1"></i>';
                    // Các thông báo
                    success_alert.style.display = "flex";
                    success_alert.innerText = "Chỉnh sửa mật khẩu thành công!";
                    error_alert.style.display = "none";
                } else {
                    error_alert.innerText = data.message;
                    error_alert.style.display = "flex";
                    success_alert.style.display = "none";
                    isEditingPasswordDesktop = true;
                }
            }).catch(error => {
                alert(error);
            })
    }
})




// ====================== MOBILE ==================
const btnEditPasswordMobile = document.getElementById("account-btn-edit-password-mobile");
let isEditingPasswordMobile = false;
const formPasswordMobile = document.getElementById("password-form-mobile");
const mobilePasswordNew = document.getElementById("mobile-form-password-new");
const mobilePasswordConfirm = document.getElementById("mobile-form-password-confirm");
const inputPasswordMobile = document.getElementById("account-input-password-mobile");
const inputPasswordNewMobile = document.getElementById("account-input-passwordNew-mobile");
const inputPasswordConfirmMobile = document.getElementById("account-input-passwordConfirm-mobile");

btnEditPasswordMobile.addEventListener("click", function (e) {
    e.preventDefault();
    isEditingPasswordMobile = !isEditingPasswordMobile;
    if (isEditingPasswordMobile) {
        inputPasswordMobile.removeAttribute("readonly");
        mobilePasswordNew.style.display = "flex";
        mobilePasswordConfirm.style.display = "flex";
        btnEditPasswordMobile.innerHTML = 'LƯU <i class="fas fa-save ms-1"></i>';
        inputPasswordMobile.value = '';
        inputPasswordNewMobile.value = '';
        inputPasswordConfirmMobile.value = '';
    } else {
        const formData = new FormData(formPasswordMobile);
        fetch(ROOT_URL + "account/update/password", {
            method: "POST",
            body: formData
        })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    mobilePasswordNew.style.display = "none";
                    mobilePasswordConfirm.style.display = "none";
                    inputPasswordMobile.setAttribute("readonly", "true");
                    inputPasswordMobile.value = data['current-password'];
                    btnEditPasswordMobile.innerHTML = 'CHỈNH SỬA <i class="fas fa-edit ms-1"></i>';
                    success_alert.style.display = "flex";
                    success_alert.innerText = "Chỉnh sửa mật khẩu thành công!";
                    error_alert.style.display = "none";
                } else {
                    error_alert.style.display = "flex";
                    error_alert.innerText = data.message;
                    success_alert.style.display = "none";
                    isEditingPasswordMobile = true;
                }
            })
            .catch(error => {
                alert(error);
            });
    }
});



