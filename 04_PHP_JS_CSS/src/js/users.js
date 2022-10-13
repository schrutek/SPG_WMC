function details(guid) {
    fetch("/?action=details&guid=" + guid)
    .then(result => result.json())
    .then(data => {
        console.log(data.username);
        const container = document.getElementById("userName");
        container.innerHTML = data.username + ' - ' + data.guid;
    })
    .catch(err => alert(err.message));
}

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
        toggleDetailsButton.textContent = 'Hide Details';
    } else {
        toggleDetailsButton.textContent = 'Show Details';
    }
}

function updateDetails() {
    if (showDetails) {
        detailsContainer.style.display = 'block';
    } else {
        detailsContainer.style.display = 'none';
    }
}
