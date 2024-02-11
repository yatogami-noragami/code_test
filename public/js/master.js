$(document).ready(function () {

    // Image Preview
    const input = $('.imageInput');
    const previewImage = $('#photoPreview');

    input.on('change', function () {
        const reader = new FileReader();

        reader.onload = function (e) {
            previewImage.attr('src', e.target.result);
            previewImage.css('display', 'block');
        };

        reader.readAsDataURL(input[0].files[0]);
    });


    // Back To Top Button
    function handleScrollDown() {
        $('#backToTopBtn').css('animation', 'bttShow 2s ease-out forwards');
    }

    $(window).scroll(function () {
        // Check if the user has scrolled down
        if ($(this).scrollTop() > 500) {
            // Call the function when scrolled down
            handleScrollDown();
        }

    });

    $('#backToTopBtn').click(function (e) {
        $('html, body').animate({ scrollTop: 0 }, 400);
        setTimeout(() => {
            $(this).css('animation', 'bttHide 2s ease-out forwards')
        }, 3000);
        return false;
    });

    $('#backToTopBtn').hover(function () {
        $('#backToTopBtn i').css('animation-duration', '300ms');

    }, function () {
        $('#backToTopBtn i').css('animation-duration', '1s');
    }
    );

    // Live Toast
    const toastBootstrap = new bootstrap.Toast($('#liveToast'));

    toastBootstrap.show();


});
