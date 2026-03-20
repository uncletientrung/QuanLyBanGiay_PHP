//Tắt animation khi load page trong trạng thái sidebar thu nhỏ
Dashmix.onLoad(() => {
    localStorage.getItem("sidebarToggle") ? Dashmix.layout('sidebar_mini_on') : Dashmix.layout('sidebar_mini_off');
    $("#sidebar").addClass("no-transition");
    $("#sidebar *").addClass("no-transition");

    $(document).on("click", "#sidebar-mini-toggle", function () {
        localStorage.getItem("sidebarToggle") ? localStorage.removeItem("sidebarToggle") : localStorage.setItem("sidebarToggle", true);
    });
});

//Thêm vào lại animation sau khi tải xong trang
$(window).on("load", () => {
    $("#sidebar").removeClass("no-transition");
    $("#sidebar *").removeClass("no-transition");
});