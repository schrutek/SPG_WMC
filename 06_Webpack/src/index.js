import { toggleDetailsButton, detailsContainer } from './js/dom-loader';

var showDetails = false;

toggleDetailsButton.addEventListener('click', toggleState);
updateDetails();

function toggleState() {
    showDetails =! showDetails;
    updateButton();
    updateDetails();
}

function updateButton() {
    if (showDetails) {
        //toggleDetailsButton.textContent = 'Hide Details';
    } else {
        //toggleDetailsButton.textContent = 'Show Details';
    }
}

function updateDetails() {
    if (showDetails) {
        detailsContainer.style.display = 'block';
    } else {
        detailsContainer.style.display = 'none';
    }
}
