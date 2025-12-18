let currentDeleteForm = null;
let patientData = null;

// Function to open delete modal
function openDeleteModal(form, patient = null) {
  currentDeleteForm = form;
  patientData = patient;

  // Show patient info if available
  const patientInfo = document.getElementById('patientInfo');
  const patientDetails = document.getElementById('patientDetails');

  if (patient) {
    patientInfo.classList.remove('hidden');
    patientDetails.textContent = `${patient.name} (ID: ${patient.id})`;
  } else {
    patientInfo.classList.add('hidden');
  }

  // Show modal with animation
  const modal = document.getElementById('deleteModal');
  const modalContent = document.getElementById('modalContent');

  modal.classList.remove('hidden');

  // Trigger animation
  setTimeout(() => {
    modalContent.classList.remove('scale-95', 'opacity-0');
    modalContent.classList.add('scale-100', 'opacity-100');
  }, 10);

  // Prevent form submission
  return false;
}

// Function to close delete modal
function closeDeleteModal() {
  const modal = document.getElementById('deleteModal');
  const modalContent = document.getElementById('modalContent');

  // Start closing animation
  modalContent.classList.remove('scale-100', 'opacity-100');
  modalContent.classList.add('scale-95', 'opacity-0');

  // Hide modal after animation
  setTimeout(() => {
    modal.classList.add('hidden');
    currentDeleteForm = null;
    patientData = null;
  }, 300);
}

// Function to confirm deletion
function confirmDelete() {
  if (currentDeleteForm) {
    currentDeleteForm.submit();
  }
}

// Close modal when clicking outside
document.getElementById('deleteModal').addEventListener('click', function (e) {
  if (e.target === this) {
    closeDeleteModal();
  }
});

// Close modal with Escape key
document.addEventListener('keydown', function (e) {
  if (e.key === 'Escape' && !document.getElementById('deleteModal').classList.contains('hidden')) {
    closeDeleteModal();
  }
});

window.openDeleteModal = openDeleteModal;
window.closeDeleteModal = closeDeleteModal;
window.confirmDelete = confirmDelete;
