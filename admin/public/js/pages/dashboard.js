$(document).ready(function () {
    Dashmix.helpers("jq-slick");

    let modalEl = document.getElementById("modal-onboarding");
    if (modalEl) {
        let onboardModal = new bootstrap.Modal(modalEl);
        onboardModal.show();

        modalEl.addEventListener("shown.bs.modal", function () {
            let $sliderInModal = $("#modal-onboarding .js-slider");

            if ($sliderInModal.hasClass('slick-initialized')) {
                $sliderInModal.slick('unslick');
            }

            $sliderInModal.removeClass("js-slider-enabled");
            Dashmix.helpers("jq-slick");
        });
    }
});

function goToNextStep() {
    jQuery('#modal-onboarding .js-slider').slick('slickGoTo', 1);
}