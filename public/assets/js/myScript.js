var openButton = document.getElementById("open");
var dialog = document.getElementById("dialog");
var closeButton = document.getElementById("close");
var overlay = document.getElementById("overlay");

// show the overlay and the dialog
openButton.addEventListener("click", function () {
    dialog.classList.remove("hidden");
    overlay.classList.remove("hidden");
});

// hide the overlay and the dialog
closeButton.addEventListener("click", function () {
    dialog.classList.add("hidden");
    overlay.classList.add("hidden");
});

// Fonction pour afficher le modal
function showModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.classList.remove("hidden");
    modal.classList.add("flex");
    document.body.style.overflow = "hidden";
}

// Fonction pour masquer le modal
function hideModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.classList.remove("flex");
    modal.classList.add("hidden");
    document.body.style.overflow = "auto";
}

// Sélectionnez tous les boutons "Toggle modal" pour l'ouverture du modal
var toggleButtons = document.querySelectorAll("[data-modal-toggle]");

// Attachez un gestionnaire d'événements pour chaque bouton "Toggle modal"
toggleButtons.forEach(function (button) {
    button.addEventListener("click", function () {
        var targetModalId = button.getAttribute("data-modal-target");
        showModal(targetModalId);
    });
});

// Sélectionnez tous les boutons "No, cancel" à l'intérieur du modal
var cancelButtons = document.querySelectorAll("[data-modal-hide]");

// Attachez un gestionnaire d'événements à tous les boutons "No, cancel"
cancelButtons.forEach(function (button) {
    button.addEventListener("click", function () {
        hideModal("popup-modal");
    });
});

// Sélectionnez le bouton de fermeture du modal
var closeModalButton = document.querySelector("[data-modal-hide=popup-modal]");

// Attachez un gestionnaire d'événements pour le bouton de fermeture du modal
closeModalButton.addEventListener("click", function () {
    hideModal("popup-modal");
});
