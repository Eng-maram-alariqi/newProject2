function showOffcanvas(targetId) {
    const offcanvas = document.querySelector(targetId);
    if (offcanvas) {
        const offcanvasInstance = new bootstrap.Offcanvas(offcanvas);
        offcanvasInstance.show();
    }
}
function showModal(targetId,title, id) {
    console.log(id)
    const modal = document.querySelector(targetId);
    // Create a new Modal instance using the target modal element
    $(modal).data('product-store-id', id);
    $(modal).find('.modal-title').html(title);
    const modalInstance = new bootstrap.Modal(modal);
    // Show the modal using the modal() method provided by Bootstrap
    modalInstance.show();
}
function showSuccessToast(title, body) {
    // Update the toast elements with the provided title and body text
    $('#success-toast .success-toast-title').text(title);
    $('#success-toast .success-toast-body').text(body);

    new bootstrap.Toast(document.getElementById('success-toast')).show();
}
function showErrorToast(title, body) {
    // Update the toast elements with the provided title and body text
    $('#error-toast .error-toast-title').text(title);
    $('#error-toast .error-toast-body').text(body);

    new bootstrap.Toast(document.getElementById('error-toast')).show();
}
