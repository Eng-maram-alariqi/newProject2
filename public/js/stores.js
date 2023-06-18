$(document).ready(function () {
    getStoreProducts();
    addProductToStore();
    editStoreProduct();
});

async function showOffcanvasToAddProduct() {
    await getProductsToStore("#product", "#add-product-parent");
    showOffcanvas("#offcanvasAddStoreProduct");
}

function showOffcanvasToEditProduct(id) {
    // Make an AJAX request to get the product data by ID
    fetch(`/api/stores/${id}`)
        .then((response) => response.json())
        .then(async (response) => {
            store = response.data;
            product = store.product;
            await getProductsToStore(
                "#product-edit",
                "#edit-product-parent",
                product.id
            );
            const unitSelect = document.getElementById("unit_edit");
            const optionToSelect = Array.from(unitSelect.options).find(
                (option) => option.value === store.unit
            );
            console.log(optionToSelect);
            if (optionToSelect) {
                optionToSelect.selected = true;
            }
            // Set the purchasing price
            const idInput = document.getElementById("id_store");
            idInput.value = store.id;
            // Set the batch_number
            const batchNumberInput =
                document.getElementById("batch_number_edit");
            batchNumberInput.value = store.batch_number;
            // Set the purchasing price
            const purchasingPriceInput = document.getElementById(
                "purchasing_price_edit"
            );
            purchasingPriceInput.value = store.purchasing_price;

            // Set the unit price
            const unitPriceInput = document.getElementById("unit_price_edit");
            unitPriceInput.value = store.unit_price;

            // Set the production date
            const productionDateInput = document.getElementById(
                "production_date_edit"
            );
            productionDateInput.value = store.production_date;

            // Set the expiry date
            const expiryDateInput = document.getElementById("expiry_date_edit");
            expiryDateInput.value = store.expiry_date;

            // Set the quantity
            const quantityInput = document.getElementById("quantity_edit");
            quantityInput.value = store.quantity;

            await getProductsToStore(
                "#product-edit",
                "#edit-product-parent",
                product.id
            );

            showOffcanvas("#offcanvasEditStoreProduct");
        })
        .catch((error) => console.error(error));
}

async function getProductsToStore(select2ID, parentID, selectedItem) {
    // get the select element
    var $productSelect = $(select2ID);
    // clear previous options
    $productSelect.empty();

    // make the API request using $.ajax()
    $.fn.select2.defaults.set("dropdownParent", $(parentID));
    const response = await fetch("/api/products");
    const data = await response.json();
    data.data.forEach((category) => {
        const option = new Option(category.name, category.id);
        $productSelect.append(option);
    });
    if (selectedItem !== null) {
        $productSelect.val(selectedItem).trigger("change");
    }
    $productSelect.select2();
}

function getStoreProducts() {
    if ($.fn.DataTable.isDataTable("#storeDatatable")) {
        $("#storeDatatable").DataTable().ajax.reload();
    } else {
        $("#storeDatatable").DataTable({
            processing: true,
            serverSide: true,
            paging: true,
            searching: true,
            scrollX: true,
            lengthMenu: [7, 10, 25, 50, 75, 100],
            responsive: false,
            dom:
                '<"row"<"col-sm-12"<"col-sm-12"B>>>' +
                '<"row"<"col-sm-12 col-md-6"l>' +
                '<"col-sm-12 col-md-6"f>>' +
                '<"row"<"col-sm-12"tr>><"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
            buttons: [
                {
                    text: '<i class="bx bx-plus me-sm-2"></i><span class="d-none d-sm-inline-block">إضافة منتج</span>',
                    className: "dt-button create-new btn btn-primary m-2",
                    action: function (e, dt, node, config) {
                        showOffcanvasToAddProduct();
                    },
                },
                {
                    extend: "collection",
                    className:
                        'class="dt-button buttons-collection btn btn-label-primary dropdown-toggle me-2"',
                    text: "تصدير",
                    buttons: [
                        {
                            extend: "copy",
                            className: "dt-button buttons-print dropdown-item",
                            text: "Copy",
                            exportOptions: {
                                columns: ":visible",
                            },
                        },
                        {
                            extend: "pdf",
                            className: "dt-button buttons-print dropdown-item",
                            text: "PDF",
                            exportOptions: {
                                columns: ":visible",
                            },
                        },
                        {
                            extend: "excel",
                            className: "dt-button buttons-print dropdown-item",
                            text: "Excel",
                            exportOptions: {
                                columns: ":visible",
                            },
                        },
                        {
                            extend: "csv",
                            className: "dt-button buttons-print dropdown-item",
                            text: "CSV",
                            exportOptions: {
                                columns: ":visible",
                            },
                        },
                        {
                            extend: "print",
                            className: "dt-button buttons-print dropdown-item",
                            text: "Print",
                            exportOptions: {
                                columns: ":visible",
                            },
                        },
                    ],
                },
            ],
            ajax: "/api/stores",
            columns: [
                { data: "id" },
                { data: "batch_number", searchable: true, orderable: true },
                {
                    data: "product.product_category.name",
                    searchable: false,
                    orderable: false,
                },
                { data: "product.name", searchable: false, orderable: false },
                { data: "unit" },
                { data: "unit_price" },
                { data: "purchasing_price" },
                { data: "production_date", autoWidth: true },
                { data: "expiry_date" },
                { data: "quantity" },
                { data: "remaining_quantity" },
                {
                    render: function (data, type, row) {
                        return (
                            `<button onClick="showOffcanvasToEditProduct(${row.id})" class="btn btn-primary btn-sm">تعديل</button>` +
                            `<span><br><br></span>` +
                            `<button onClick="deleteStoreProduct('${
                                row.is_active ? "تفعيل" : "ايقاف"
                            }','${row.id}')" class="btn btn-secondary btn-sm">${
                                row.is_active ? "ايقاف" : "تفعيل"
                            }</button>`
                        );
                    },
                    name: "action",
                    autoWidth: true,
                    searchable: false,
                    orderable: false,
                },
            ],
        });
    }
}

function addProductToStore() {
    $("#addStoreProductForm").validate({
        rules: {
            product_id: {
                required: true,
            },
            batch_number: {
                required: true,
            },
            unit: {
                required: true,
            },
            unit_price: {
                required: true,
            },
            production_date: {
                required: true,
            },
            expiry_date: {
                required: true,
            },
            quantity: {
                required: true,
            },
            remaining_quantity: {
                required: true,
            },
        },
        messages: {
            batch_number: {
                required: "Please enter a batch number.",
            },
            name: {
                required: "Please enter a product name.",
            },
            product_category_id: {
                required: "Please enter a product category.",
            },
            product_image: {
                required: "Please select a product image.",
            },
        },
        submitHandler: function (form) {
            console.log("form:"+form);

            var formData = new FormData(form);
            formData.append("id", $("#id_store").val());
            formData.append("batch_number", $("#batch_number").val());
            formData.append("unit", $("#unit").val());
            formData.append("unit_price", $("#unit_price").val());
            formData.append("purchasing_price",$("#purchasing_price").val());
            formData.append("production_date",$("#production_date").val());
            formData.append("expiry_date", $("#expiry_date").val());
            formData.append("quantity", $("#quantity").val());

            console.log(JSON.stringify(Object.fromEntries(formData)));

            $.ajax({
                url: "/api/stores",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    // handle the successful response
                    getStoreProducts();
                    showSuccessToast(
                        "Success",
                        "The operation completed successfully."
                    );
                },
                error: function (xhr, status, error) {
                    // handle the error response
                    showErrorToast("Error", error);
                    console.log(xhr.responseText);
                },
            });
        },
    });
}


function editStoreProduct() {
    $("#editStoreProductForm").validate({
        rules: {
            batch_number: {
                required: true,
            },
            unit_price: {
                required: true,
            },
            purchasing_price: {
                required: true,
            },
            production_date: {
                required: true,
            },
            expiry_date: {
                required: true,
            },
            quantity: {
                required: true,
            },
        },
        messages: {
            batch_number: {
                required: "Please enter a batch number.",
            },
            unit_price: {
                required: "Please enter the unit price.",
            },
            purchasing_price: {
                required: "Please enter the purchasing price.",
            },
            production_date: {
                required: "Please enter the production date.",
            },
            expiry_date: {
                required: "Please select an expiry date.",
            },
            quantity: {
                required: "Please enter the quantity.",
            },
        },
        submitHandler: function (form) {
            var formData = new FormData(form);

            // Append additional form data to the formData object
            formData.append("id", $("#id_store").val());
            formData.append("batch_number", $("#batch_number_edit").val());
            formData.append("unit", $("#unit_edit").val());
            formData.append("unit_price", $("#unit_price_edit").val());
            formData.append("purchasing_price",$("#purchasing_price_edit").val());
            formData.append("production_date",$("#production_date_edit").val());
            formData.append("expiry_date", $("#expiry_date_edit").val());
            formData.append("quantity", $("#quantity_edit").val());

            console.log(JSON.stringify(Object.fromEntries(formData)));

            $.ajax({
                url: "/api/stores/" + formData.get("id"),
                method: "PUT",
                contentType: "application/json",
                data: JSON.stringify(Object.fromEntries(formData.entries())),
                processData: false,
                success: function (updatedData) {
                    getStoreProducts();
                    showSuccessToast(
                        "Success",
                        "The operation completed successfully."
                    );
                },
                error: function (error) {
                    console.error("error: " + error);
                    showErrorToast("Error", error);
                },
            });
        },
    });
}

function deleteStoreProduct(title, id) {
    showModal("#delete-product-store-modal", title, id);

    // Detach the event listener before attaching it again
    $(document)
        .off("click", "#delete-product-store-modal #product-store-delete")
        .on(
            "click",
            "#delete-product-store-modal #product-store-delete",
            function () {
                // Make the API request to stop the product
                var id = $("#delete-product-store-modal").data(
                    "product-store-id"
                );
                console.log("id: " + id);
                $.ajax({
                    url: "api/stores/" + id,
                    type: "DELETE",
                    success: function (data) {
                        $("#stop-product-modal").modal("hide");
                        getStoreProducts();
                        showSuccessToast(
                            "Success",
                            "The operation completed successfully."
                        );
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        $("#stop-product-modal").modal("hide");
                        getStoreProducts();
                        showErrorToast("Error", error);
                    },
                });
            }
        );
}

function showSuccessToast(title, body) {
    // Update the toast elements with the provided title and body text
    $("#success-toast .success-toast-title").text(title);
    $("#success-toast .success-toast-body").text(body);

    new bootstrap.Toast(document.getElementById("success-toast")).show();
}

function showErrorToast(title, body) {
    // Update the toast elements with the provided title and body text
    $("#error-toast .error-toast-title").text(title);
    $("#error-toast .error-toast-body").text(body);

    new bootstrap.Toast(document.getElementById("error-toast")).show();
}