function searchPatient() {
  document.getElementById('searchInput').addEventListener('keyup', (event) => {
    let filter = event.target.value.toLowerCase();
    let rows = document.querySelectorAll('#patientTable tbody tr');

    rows.forEach(row => {
      let text = row.textContent.toLowerCase();
      row.style.display = text.includes(filter) ? "" : "none";
    });
  });
}

document.addEventListener("DOMContentLoaded", searchPatient);
