const themeToggle = document.querySelector(".theme-toggle");
const themeToggleLabel = document.querySelector(".theme-toggle-label");

const updateThemeToggle = () => {
  if (!themeToggle || !themeToggleLabel) return;

  const isDark = document.documentElement.dataset.theme !== "light";
  themeToggleLabel.textContent = isDark ? "Light mode" : "Dark mode";
  themeToggle.setAttribute("aria-pressed", String(isDark));
};

updateThemeToggle();

if (themeToggle) {
  themeToggle.addEventListener("click", () => {
    const nextTheme = document.documentElement.dataset.theme === "light" ? "dark" : "light";
    document.documentElement.dataset.theme = nextTheme;

    try {
      localStorage.setItem("kambac-theme", nextTheme);
    } catch (error) {
      console.error("Unable to save the selected theme.", error);
    }

    updateThemeToggle();
  });
}

const equipmentPhotoInput = document.querySelector('.equipment-form input[name="photo"]');
const equipmentPhotoPreview = document.querySelector("[data-photo-preview]");
const equipmentPhotoPlaceholder = document.querySelector("[data-photo-placeholder]");

if (equipmentPhotoInput && equipmentPhotoPreview && equipmentPhotoPlaceholder) {
  let previewUrl = "";

  equipmentPhotoInput.addEventListener("change", () => {
    const [file] = equipmentPhotoInput.files || [];
    if (!file) return;

    const supportedTypes = ["image/jpeg", "image/png", "image/webp"];
    if (!supportedTypes.includes(file.type)) {
      equipmentPhotoInput.setCustomValidity("Choose a JPEG, PNG, or WebP image.");
      equipmentPhotoInput.reportValidity();
      equipmentPhotoInput.setCustomValidity("");
      equipmentPhotoInput.value = "";
      return;
    }

    equipmentPhotoInput.setCustomValidity("");
    if (previewUrl) URL.revokeObjectURL(previewUrl);
    previewUrl = URL.createObjectURL(file);
    equipmentPhotoPreview.src = previewUrl;
    equipmentPhotoPreview.hidden = false;
    equipmentPhotoPlaceholder.hidden = true;
  });

  window.addEventListener("pagehide", () => {
    if (previewUrl) URL.revokeObjectURL(previewUrl);
  }, { once: true });
}

const borrowDialog = document.querySelector("#borrow-equipment-dialog");
const openBorrowDialogButton = document.querySelector("[data-open-borrow-dialog]");

if (borrowDialog && openBorrowDialogButton) {
  const closeBorrowDialogButtons = borrowDialog.querySelectorAll("[data-close-borrow-dialog]");
  const borrowForm = borrowDialog.querySelector("[data-borrow-modal-form]");
  const equipmentSelect = borrowDialog.querySelector("[data-borrow-equipment-select]");
  const quantityInput = borrowDialog.querySelector("[data-borrow-quantity]");
  const availabilityText = borrowDialog.querySelector("[data-borrow-availability]");

  const updateBorrowEquipment = () => {
    if (!borrowForm || !equipmentSelect || !quantityInput) return;
    const option = equipmentSelect.selectedOptions[0];
    if (!option) return;

    const equipmentId = option.value;
    const availableQuantity = Number(option.dataset.available);
    borrowForm.action = `/equipment/${encodeURIComponent(equipmentId)}/borrow`;
    quantityInput.max = String(availableQuantity);
    if (Number(quantityInput.value) > availableQuantity) {
      quantityInput.value = String(availableQuantity);
    }
    if (availabilityText) {
      availabilityText.textContent = `${availableQuantity} available`;
    }
  };

  openBorrowDialogButton.addEventListener("click", () => {
    updateBorrowEquipment();
    borrowDialog.showModal();
  });

  closeBorrowDialogButtons.forEach((button) => {
    button.addEventListener("click", () => borrowDialog.close());
  });

  if (equipmentSelect) {
    equipmentSelect.addEventListener("change", updateBorrowEquipment);
    updateBorrowEquipment();
  }

  borrowDialog.addEventListener("click", (event) => {
    if (event.target === borrowDialog) borrowDialog.close();
  });
}
