var modal = document.getElementById("myModal");
var modalMessage = document.getElementById("modal-message");
var span = document.getElementsByClassName("close")[0];

// Show the modal with the message
function showModal(message) {
  modalMessage.innerHTML = message;
  modal.style.display = "block";
}

// Close the modal when 'x' is clicked
span.onclick = function () {
  modal.style.display = "none";
};

// Close the modal if clicked outside the modal
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};
