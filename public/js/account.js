const btnLogout = document.getElementById("account-btn-logout");
btnLogout.addEventListener("click", function(){
    window.location.href = ROOT_URL+"account/logout";
})