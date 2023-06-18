function btnDelete() {

    const csrfToken = $('meta[name="csrf-token"]').attr('content')
    let lang = $('meta[name="lang"]').attr('content')

    let title = {
        'en': 'Are you sure you want to delete this record?',
        'ar': "هل أنت متأكد أنك تريد حذف هذا السجل؟",
    }

    let text = {
        'en': 'If you delete this, it will be gone forever',
        'ar': "إذا حذفت هذا ، فسيختفي إلى الأبد",
    }

    let CancelBtn = {
        'en': 'Cancel',
        'ar': "الغاء",
    }

    let confirmBtn = {
        'en': 'Yes !',
        'ar': 'تاكيد',
    }

    let destroyError = {
        'en': 'Deleted Error',
        'ar': 'خطأ في عملية الحذف',
    }

    let destroyAction = {
        'en': 'Deleted !',
        'ar': 'حذف !',
    }


    $('.btn_delete').click(function () {
        let url = $(this).data('url')

        Swal.fire({
            icon: 'warning',
            showCloseButton: true,
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'

        }).then((result) => {
            console.log(result)
            if (result.value) {
                $.ajax({
                    url: url,
                    serverSide: true,
                    type: 'POST',
                    data: {
                        _token: csrfToken,
                    },
                    success: function (response) {
                        $('#DataTable').DataTable().ajax.reload();
                        Swal.fire(
                            'Deleted!',
                            'Your Model has been deleted.',
                            'success'
                        )

                    }, error: function () {

                        Swal.fire(
                            `${destroyAction[lang]}`,
                            `${destroyError[lang]}`,
                            `error`,
                        )
                    }
                })
            }
        })
    })
}

