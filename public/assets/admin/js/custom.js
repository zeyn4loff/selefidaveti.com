$(document).ready(function () {

    if (0 < $(".editor").length) {
        tinymce.init({
            selector: "textarea.editor",
            height: 300
        });
    }


    $('form').on('keypress', function (e) {
        const keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });

    $('.dropify').dropify({
        messages: {
            'default': 'Buraya fayl sürükləyin və ya kilikləyin',
            'replace': 'Çək və ya əvəz etmək üçün kiliklə',
            'error': 'Ups, yanlış bir şey oldu.'
        },
        tpl: {
            clearButton: '',
        }
    });

    $('.status_change').change(function () {
        const data_id = $(this).attr('data_id');
        const status = $(this).prop("checked") ? 1 : 0;
        const route = $(this).attr('route');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        const form_data = {
            id: data_id,
            status: status,
        };

        const type = "POST";

        $.ajax({
            type: type,
            url: route,
            data: form_data,
            dataType: 'json',
            success: function (data) {
                showToast('Baza sözümüzə baxdı 😎', 'Status dəyişildi 😎', '#2ecc71');
            },
            error: function (data) {
                showToast('Səhifə 5 saniyədən sonra yenilənəcək', 'Xətə baş verildi 🥺', '#e74c3c', true);
            }
        });
    });

    $('.remove').click(function () {
        const data_id = $(this).attr('data_id');
        const route = $(this).attr('route');
        const button = $(this);

        Swal.fire({
            title: 'Əminsiniz?',
            text: "Əgər silsəniz geri qaytarmaq münkün olmayacaq!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#f46a6a',
            cancelButtonColor: '#74788d',
            confirmButtonText: 'Sil',
            cancelButtonText: 'Bağla',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                const form_data = {
                    id: data_id,
                };

                const type = "POST";

                $.ajax({
                    type: type,
                    url: route,
                    data: form_data,
                    dataType: 'json',
                    success: function (data) {
                        button.closest("tr").fadeOut();
                        showToast('Baza sözümüzə baxdı 😎', 'Silindi', '#2ecc71');
                    },
                    error: function (data) {
                        console.log(data);
                        showToast('Səhifə 5 saniyədən sonra yenilənəcək', 'Xətə baş verildi 🥺', '#e74c3c', true);
                    }
                });
            }
        })
    });

    function showToast(text, heading, bgColor, reload = false) {
        $.toast({
            text: text,
            heading: heading,
            showHideTransition: 'fade',
            allowToastClose: true,
            hideAfter: reload ? 5000 : 3000,
            loader: false,
            loaderBg: '#9EC600',
            stack: 5,
            position: 'top-right',
            bgColor: bgColor,
            textColor: '#fff',
            textAlign: 'left',
            icon: false,
            afterHidden: function () {
                if (reload) {
                    location.reload();
                }
            }
        });
    }
});
