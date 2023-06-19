$(document).ready(function () {
    addUser();
    editProduct();
    getUsers();
});

async function showOffcanvasToAddUser() {
   
    showOffcanvas('#offcanvasAddUser');
}

function showOffcanvasToEditProduct(id) {
    // Make an AJAX request to get the product data by ID
    fetch(`/api/users/${id}`)
        .then(response => response.json())
        .then(async product => {
            product = product.data;
            // Get the offcanvas element by selector
            const offcanvas = document.querySelector('#offcanvasEditProduct');
            // Populate form fields with the product data
            offcanvas.querySelector('#productId').value = product.id;
            offcanvas.querySelector('#productName').value = product.name;
            // Populate the category select element with options
            await getCategories('#productCategory', '#edit-product-category-parent', product.product_category.id);
            // var $categorySelect = $('#productCategory');
            // $categorySelect.val(product.product_category.id).trigger('change');

            // Show the offcanvas
            showOffcanvas('#offcanvasEditProduct');
        })
        .catch(error => console.error(error));
}
// async function getCategories(select2ID, parentID, selectedItem) {
//     // get the select element
//     var $categorySelect = $(select2ID);
//     // make the API request using $.ajax()
//     $.fn.select2.defaults.set("dropdownParent", $(parentID));
//     const response = await fetch('/api/categories');
//     const data = await response.json();
//     data.data.forEach(category => {
//         const option = new Option(category.name, category.id);
//         $categorySelect.append(option);
//     });
//     if (selectedItem !== null) {
//         $categorySelect.val(selectedItem).trigger('change');
//     }
//     $categorySelect.select2();
// }



function getUsers() {
    if ($.fn.DataTable.isDataTable('#usersDatatable')) {
        $('#usersDatatable').DataTable().ajax.reload();
    } else {
        $("#usersDatatable").DataTable({
            processing: true,
            serverSide: true,
            paging: true,
            searching: true,
            scrollX: true,
            lengthMenu: [7, 10, 25, 50, 75, 100],
            responsive: false,
            ordering: true,
            order: [[0, 'desc']],
            dom:
                '<"row"<"col-sm-12"<"col-sm-12"B>>>' + '<"row"<"col-sm-12 col-md-6"l>' + '<"col-sm-12 col-md-6"f>>' +
                '<"row"<"col-sm-12"tr>><"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
            buttons: [
                {
                    text: '<i class="bx bx-plus me-sm-2"></i><span class="d-none d-sm-inline-block">إضافة منتج</span>',
                    className: 'dt-button create-new btn btn-primary m-2',
                    action: function (e, dt, node, config) {
                        showOffcanvasToAddUser();
                    }

                },
                {
                    extend: 'collection',
                    className: 'class="dt-button buttons-collection btn btn-label-primary dropdown-toggle me-2"',
                    text: 'تصدير',
                    buttons: [
                        {
                            extend: 'copy',
                            className: 'dt-button buttons-print dropdown-item',
                            text: 'Copy',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'pdf',
                            className: 'dt-button buttons-print dropdown-item',
                            text: 'PDF',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'excel',
                            className: 'dt-button buttons-print dropdown-item',
                            text: 'Excel',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'csv',
                            className: 'dt-button buttons-print dropdown-item',
                            text: 'CSV',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'print',
                            className: 'dt-button buttons-print dropdown-item',
                            text: 'Print',
                            exportOptions: {
                                columns: ':visible'
                            }
                        }
                    ]
                }
            ],
            ajax: '/api/users',
            
            columns: [
                
                {data: 'id'},
                {data: 'username',searchable: false, orderable: false},
                {data: 'email'},
                {data: 'phone_number'},
                {data: 'status'},
                {data: 'roles'},

                
               
              
                {
                    "render": function (data, type, row) {
                        return `<button onClick="showOffcanvasToEditProduct(${row.id})" class="btn btn-primary btn-sm">تعديل</button>` +
                            `<span>&nbsp;</span>` +
                            `<button onClick="stopProduct('${row.is_active?'تفعيل':'ايقاف'}','${row.id}')" class="btn btn-secondary btn-sm">${row.is_active?'ايقاف':'تفعيل'}</button>`;
                    },
                    "name": "action",
                    "autoWidth": true,
                    "searchable": false,
                    "orderable": false
                },
            ],
            
            
        });
    }
}
function addUser() {
    $('#addNewUserForm').validate({
        rules: {
          
            username: {
                required: true,
            },
            email: {
                required: true,
            },
            password: {
                required: true,
            },
            phone_number: {
                required: true,
            },
            status: {
                required: true,
            },
            roles: {
                required: true,
            }
        },
        messages: {
            username: {
                required: 'Please enter a product name.',
            },
            email: {
                required: 'Please enter a product category.',
            },
            password: {
                required: 'Please select a product image.',
            },
            phone_number: {
                required: 'Please select a product image.',
            },
            status: {
                required: 'Please select a product image.',
            },
            roles: {
                required: 'Please select a product image.',
            }
        },
        submitHandler: function (form) {
            var formData = new FormData(form);
          
           
            reader.onload = function () {
        
                // make the API request using $.ajax()
                $.ajax({
                    url: '/users',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        // handle the successful response
                        getUsers();
                        showSuccessToast('Success', 'The operation completed successfully.');
                    },
                    error: function (xhr, status, error) {
                        // handle the error response
                        showErrorToast('Error',error);
                        console.log(xhr.responseText);
                    }
                });
         
        }
    }
    });
    
}

function editProduct() {
    $('#editProductForm').validate({
        rules: {
            name: {
                required: false,
                minlength: 3
            },
            product_category_id: {
                required: false,
                number: true,
            },
            product_image: {
                required: false,
            }
        },
        messages: {
            name: {
                minlength: 'Product name must be at least 3 characters long.'
            },
        },
        submitHandler: function (form) {
            var formData = new FormData(form);
            var data = {};
            for (var pair of formData.entries()) {
                if (pair[1] !== '') {
                    data[pair[0]] = pair[1];
                }
            }
            var fileInput = $('#productImage')[0];
            var file = fileInput.files[0];
            console.log('file: '+file);

            if (file) {
                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function () {
                    var base64Image = reader.result;
                    var cleanedBase64Image = base64Image.split(',')[1];
                    data['image'] = cleanedBase64Image;
                    console.log(cleanedBase64Image);
                    $.ajax({
                        url: `/api/users/` + formData.get('id'),
                        method: 'PUT',
                        contentType: 'application/json',
                        data: JSON.stringify(data),
                        success: function (updatedData) {
                            getUsers();
                            showSuccessToast('Success', 'The operation completed successfully.');
                        },
                        error: function (error) {
                            console.error('error: ' + error);
                            showErrorToast('Error',error);
                        }
                    });
                }
            } else {
                $.ajax({
                    url: `/api/users/` + formData.get('id'),
                    method: 'PUT',
                    contentType: 'application/json',
                    data: JSON.stringify(data),
                    success: function (updatedData) {
                        getUsers();
                        showSuccessToast('Success', 'The operation completed successfully.');
                    },
                    error: function (error) {
                        console.error('error: ' + error);
                        showErrorToast('Error',error);
                    }
                });
            }

        }
    });
}
function stopProduct(title, id) {
     showModal('#stop-product-modal', title, id);

    // Detach the event listener before attaching it again
    $(document).off('click', '#stop-product-modal #product-stop').on('click', '#stop-product-modal #product-stop', function() {
        // Make the API request to stop the product
        var id = $("#stop-product-modal").data('product-id');
        console.log('id: ' + id)
        $.ajax({
            url: 'api/users/' + id,
            type: 'DELETE',
            success: function(data) {
                $('#stop-product-modal').modal('hide');
                getUsers();
                showSuccessToast('Success', 'The operation completed successfully.');


            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('#stop-product-modal').modal('hide');
                getUsers();
                showErrorToast('Error', error);
            }
        });
    });
}
