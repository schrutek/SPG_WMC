import './../css/styles.css';
import { toggleDetailsButton, detailsContainer } from './dom-loader';

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
        toggleDetailsButton.textContent = 'Hide Details (app.js)';
    } else {
        toggleDetailsButton.textContent = 'Show Details (app.js)';
    }
}

function updateDetails() {
    if (showDetails) {
        detailsContainer.style.display = 'block';
    } else {
        detailsContainer.style.display = 'none';
    }
}
