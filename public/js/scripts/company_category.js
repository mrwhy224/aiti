$(function () {
    'use strict';
    var dt_basic_table = $('.datatables-basic');
    var dt_basic;

    if (dt_basic_table.length) {
        dt_basic = dt_basic_table.DataTable({
            processing: true, // Show processing indicator
            serverSide: true, // Enable server-side processing
            ajax: function(data, callback, settings) {
				DataService.getData('/company/pending')
					.then(json => callback(json))
					.catch(error => callback({
						data: []
					}));
			},
            columns: [
                // Columns according to your Company model and controller response
                { data: 'id' },
                { data: 'name' },
                { data: 'phone' },
                { data: 'categories' }, // Will be rendered by columnDefs
                { data: 'created_at' },
                { data: 'action' } // Actions column
            ],
            columnDefs: [
                {
                    // For the 'categories' column
                    targets: 3,
                    orderable: false,
                    render: function (data, type, full, meta) {
                        if (!data || data.length === 0) {
                            return '<span class="badge rounded-pill bg-light-secondary">بدون دسته</span>';
                        }
                        // Map each category to a badge
                        return data.map(category => `<span class="badge rounded-pill bg-light-info me-25">${category.name}</span>`).join(' ');
                    }
                },
                {
                    // Actions
                    targets: -1,
                    title: 'عملیات',
                    orderable: false,
                    searchable: false,
                    render: function (data, type, full, meta) {
                        // Using classes for easy event delegation
                        return `
                            <div class="d-inline-flex">
                                <a href="javascript:;" class="item-edit me-1" data-id="${full.id}">
                                    ${feather.icons['edit'].toSvg({ class: 'font-small-4' })}
                                </a>
                                <a href="javascript:;" class="delete-record" data-id="${full.id}">
                                    ${feather.icons['trash-2'].toSvg({ class: 'font-small-4' })}
                                </a>
                            </div>
                        `;
                    }
                }
            ],
            order: [[0, 'desc']], // Default sort by the first column (ID)
            dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.11.5/i18n/fa.json",
                paginate: {
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            }
        });
    }

    // ==========================================================================================
    // Event Handlers for Add, Edit, Delete
    // ==========================================================================================

    const companyForm = $('#company-form'); // Your form ID
    const companyModal = $('#addEditCompanyModal'); // Your modal ID
    const modalTitle = $('.modal-title'); // Your modal title class/id

    // --- Handle Add Button Click ---
    $('#add-company-btn').on('click', function () {
        companyForm.trigger('reset'); // Reset form fields
        $('#company-id').val(''); // Clear hidden ID field
        modalTitle.text('افزودن شرکت جدید');
        // Make sure to fetch categories and populate the select dropdown if it's not already on the page
        companyModal.modal('show');
    });

    // --- Handle Form Submission (Add & Edit) ---
    companyForm.on('submit', function (e) {
        e.preventDefault();
        const companyId = $('#company-id').val();
        const url = companyId ? `/admin/companies/${companyId}` : '/admin/companies';
        const method = companyId ? 'putData' : 'postData';
        const formData = $(this).serialize();

        DataService[method](url, formData)
            .then(response => {
                companyModal.modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: 'موفق!',
                    text: response.success,
                    showConfirmButton: false,
                    timer: 1500
                });
                dt_basic.ajax.reload(); // Reload DataTable to show new/updated data
            })
            .catch(error => {
                // Error is handled globally in DataService, but you can add specific logic here if needed
            });
    });

    // --- Handle Edit Button Click ---
    $(document).on('click', '.item-edit', function () {
        const companyId = $(this).data('id');

        DataService.getData(`/admin/companies/${companyId}/edit`)
            .then(response => {
                const company = response.company;
                modalTitle.text('ویرایش شرکت: ' + company.name);
                
                // Populate form fields
                $('#company-id').val(company.id);
                $('#name').val(company.name);
                $('#phone').val(company.phone);
                // ... populate other fields ...

                // Handle categories (assuming you use a multi-select library like Select2)
                const selectedCategoryIds = company.categories.map(cat => cat.id);
                $('#categories').val(selectedCategoryIds).trigger('change'); // For Select2

                companyModal.modal('show');
            });
    });

    // --- Handle Delete Button Click ---
    $(document).on('click', '.delete-record', function () {
        const companyId = $(this).data('id');

        Swal.fire({
            title: 'آیا مطمئن هستید؟',
            text: "این شرکت و اطلاعات مرتبط با آن حذف خواهد شد!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'بله، حذف کن!',
            cancelButtonText: 'خیر، لغو',
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-outline-danger ms-1'
            },
            buttonsStyling: false
        }).then(result => {
            if (result.value) {
                DataService.deleteData(`/admin/companies/${companyId}`)
                    .then(response => {
                        Swal.fire({
                            icon: 'success',
                            title: 'حذف شد!',
                            text: response.success,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        dt_basic.ajax.reload();
                    });
            }
        });
    });
});