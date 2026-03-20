<?php
// Core JS
$dm->get_js('js/lib/jquery.min.js');
$dm->get_js('js/dashmix.app.min.js');
$dm->get_js('/js/lib/sidebar.mini.js');

// Plugin: DataTables
if (isset($Plugin["datatables"]) && $Plugin["datatables"] == 1) {
    $dm->get_js('js/plugins/datatables/jquery.dataTables.min.js');
    $dm->get_js('js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js');
    $dm->get_js('js/plugins/datatables-responsive/js/dataTables.responsive.min.js');
    $dm->get_js('js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js');
    $dm->get_js('js/plugins/datatables-buttons/dataTables.buttons.min.js');
    $dm->get_js('js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js');
    $dm->get_js('js/plugins/datatables-buttons/buttons.print.min.js');
    $dm->get_js('js/plugins/datatables-buttons/buttons.html5.min.js');
}

// Plugin: jQuery Validation
if (isset($Plugin["jquery-validate"]) && $Plugin["jquery-validate"] == 1) {
    $dm->get_js('js/plugins/jquery-validation/jquery.validate.min.js');
}

// Plugin: Bootstrap Notify
if (isset($Plugin["notify"]) && $Plugin["notify"] == 1) {
    $dm->get_js('js/plugins/bootstrap-notify/bootstrap-notify.min.js');
}

// Plugin: SweetAlert2
if (isset($Plugin["sweetalert2"]) && $Plugin["sweetalert2"] == 1) {
    $dm->get_js('js/plugins/sweetalert2/sweetalert2.min.js');
}

// Plugin: Slick-carousel (slider)
if (isset($Plugin["slick"]) && $Plugin["slick"] == 1) {
    $dm->get_js('js/plugins/slick-carousel/slick.min.js');
}

// Plugin: Flatpickr
if (isset($Plugin["flatpickr"]) && $Plugin["flatpickr"] == 1) {
    $dm->get_js('js/plugins/flatpickr/flatpickr.min.js');
}

// Plugin: Chart.js
if (isset($Plugin["chartjs"]) && $Plugin["chartjs"] == 1) {
    $dm->get_js('js/plugins/chart.js/chart.min.js');
}

//Plugin: Select2
if (isset($Plugin['select2']) && $Plugin['select2'] == 1) {
    $dm->get_js('js\plugins\select2\js\select2.full.min.js');
    $dm->get_css('js\plugins\select2\css\select2.min.css');
}

//Plugin: Ion-rangeslider
if (isset($Plugin['ionrangeslider']) && $Plugin['ionrangeslider'] == 1) {
    $dm->get_js('js\plugins\ion-rangeslider\js\ion.rangeSlider.min.js');
    $dm->get_css('js\plugins\ion-rangeslider\css\ion.rangeSlider.min.css');
}

// Page JS Code
if (isset($Script) && $Script) {
    $dm->get_js('js/pages/' . $Script . '.js');
}