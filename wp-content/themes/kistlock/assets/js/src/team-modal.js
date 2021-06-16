/**
 * Show Popups
 */
(function ($) {
    'use strict';

    // Init
    $(document).ready(function () {
        modalInit();
    });

    // Build modal event listeners
    function modalInit() {
        var modals = document.querySelectorAll('.teammember');
        $(document.body).on('click', '#close-modal', closeModals);
        $(document).on('keydown', tabCheckClosemodals);
        for (var i = 0; i < modals.length; i++) {
            modals[i].addEventListener('click', modalSelected);
        }
    }

    // Grab list item JSON array and pass
    function modalSelected(e) {
        var currentModalOpen = false;
        var teamData = mandr_team_data['team-' + e.currentTarget.id];

        // Find out if the modal is already open
        var tester = document.getElementById('modal-' + e.target.id);
        if (tester) {
            currentModalOpen = true;
        }

        // Close all active modals
        closeModals();

        // If opening a new modal, start and pass mouse position for the modal
        if (!currentModalOpen && teamData) {
            modalBuild(teamData, e.pageX, e.pageY);
        }
    }

    // Build modal HTML & append to body
    function modalBuild(teamData, posX, posY) {
        var modalID = teamData.id;
        var modalName = teamData.name;
        var modalTitle = teamData.title;
        var modalExcerpt = teamData.bio;
        var modalImage = teamData.image;
        var modalImageAlt = teamData.image_alt;

        /**
         * Build modal HTML
         * -- Edit this to include as many parameters as you need
         **/
        var modal = $(
            '<aside id="modal-' +
                modalID +
                '" class="modal show-modal">' +
                // ' style="top:' +
                // posY +
                // 'px; left:' +
                // posX +
                // 'px;">' +
                '<button id="close-modal" type="button" class="close-button" data-cid="' +
                modalID +
                '" title="Close this modal">' +
                '<span class="sr-only">Close the modal by clicking the button or pressing the ESC key.</span>' +
                '</button>' +
                '<div class="container">' +
                '<div class="inner-wrap">' +
                '<div class="left-content">' +
                '<img src="' +
                modalImage +
                '" width="' +
                '250' +
                '" height="' +
                '250' +
                '" alt="' +
                modalImageAlt +
                '">' +
                '<h2 class="teammember__title>' +
                '<span class="teammember__title__name">' +
                modalName +
                '</span>' +
                '<span class="teammember__title__title">' +
                modalTitle +
                '</span>' +
                '</h2>' +
                '</div>' +
                '<div class="right-content">' +
                modalExcerpt +
                '</div>' +
                '</div>' +
                '</div>' +
                '</aside>'
        );

        // Append modal to end of container
        modal.appendTo(document.body);

        // Add body class
        document.body.classList.add('modal-active');

        // Add modal class in order to create animation effect
        setTimeout(function () {
            var tester = document.getElementById('modal-' + modalID);
            if (tester) {
                tester.classList.add('modal-open');
            }
        }, 15);

        // Add listener to check for overlay clicks to close modal
        $('.navigation-overlay').on('click', closeModals);

        // Set focus inside modal
        modal.focus();
    }

    // Close modal
    function closeModals() {
        var modals = document.querySelectorAll('[id^="modal-"]');

        if (modals === null || modals === undefined) {
            return;
        }

        Array.prototype.forEach.call(modals, function (modal) {
            modal.classList.add('modal-close');
            // Apply animation effect on close
            setTimeout(function () {
                var tester = document.getElementById(modal.id);
                if (tester) {
                    document.body.removeChild(tester);
                }
            }, 300);
            // Rem body class
            document.body.classList.remove('modal-active');
        });
    }

    // Close modals on ESC keypress
    function tabCheckClosemodals(e) {
        if (e != null && e.keyCode === 27) {
            var boolmodal = document.querySelector('[id^="modal-"]');

            if (boolmodal !== null) {
                closeModals();
            }
        }
    }
})(jQuery);
