console.log("modal.js is loaded");

// JavaScript for Modal
function openModal(petName) {
    document.getElementById('petNameToDelete').innerText = petName;
    document.getElementById('deleteModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('deleteModal').style.display = 'none';
}

function deletePet(petID) {
  fetch('../views/delete_pet.php', {
    method: 'DELETE',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({ petID }),
  })
  .then(response => {
    if (!response.ok) {
      throw new Error('Failed to delete pet. Please try again.');
    }
    return response.json();
  })
  .then(data => {
    console.log('Pet deleted successfully:', data);
    // Add code here to handle the success case, such as updating the UI or reloading the page
  })
  .catch(error => {
    console.error('Error during deletePet fetch:', error.message);
    // Add code here to handle the error case, such as showing an error message to the user
  });
}





