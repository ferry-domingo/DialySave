document.addEventListener('DOMContentLoaded', function () {
  const contactInput = document.getElementById("contact_no");

  if (contactInput) {
    contactInput.addEventListener("input", function (e) {
      let value = e.target.value.replace(/\D/g, ""); // remove non-digits

      // limit to 11 digits
      if (value.length > 11) value = value.slice(0, 11);

      // insert dash after 4 and 7 digits: 0912-345-6789
      if (value.length > 4) {
        value = value.slice(0, 4) + '-' + value.slice(4);
      }
      if (value.length > 8) {
        value = value.slice(0, 8) + '-' + value.slice(8);
      }

      e.target.value = value;
    });

    // Format existing value on load
    let existingValue = contactInput.value.replace(/\D/g, "");
    if (existingValue.length > 4) {
      existingValue = existingValue.slice(0, 4) + '-' + existingValue.slice(4);
    }
    if (existingValue.length > 8) {
      existingValue = existingValue.slice(0, 8) + '-' + existingValue.slice(8);
    }
    contactInput.value = existingValue;
  }
});

