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
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                alert(error);
            })
    }
})
// Xóa readonly trong password-desktop
const btnEditPasswordDesktop = document.getElementById("account-btn-edit-password-desktop");
let isEditingPasswordDesktop = false;
btnEditPasswordDesktop.addEventListener("click", function (e) {
    e.preventDefault();
    isEditingPasswordDesktop = !isEditingPasswordDesktop;
    const Input = document.getElementById("account-input-edit-password-desktop");
    if (isEditingPasswordDesktop) {
        Input.removeAttribute("readonly");
        btnEditPasswordDesktop.innerHTML = 'LƯU <i class="fas fa-save ms-1"></i>';
    } else {
        Input.setAttribute("readonly", "true");
        btnEditPasswordDesktop.innerHTML = 'CHỈNH SỬA <i class="fas fa-save ms-1"></i>';
    }
})
// Xóa readonly trong password-mobile
const btnEditPasswordMobile = document.getElementById("account-btn-edit-password-mobile");
let isEditingPasswordMobile = false;
btnEditPasswordMobile.addEventListener("click", function (e) {
    e.preventDefault();
    isEditingPasswordMobile = !isEditingPasswordMobile;
    const Input = document.getElementById("account-input-edit-password-mobile");
    if (isEditingPasswordMobile) {
        Input.removeAttribute("readonly");
        btnEditPasswordMobile.innerHTML = 'LƯU <i class="fas fa-save ms-1"></i>';
    } else {
        Input.setAttribute("readonly", "true");
        btnEditPasswordMobile.innerHTML = 'CHỈNH SỬA <i class="fas fa-save ms-1"></i>';
    }
})



