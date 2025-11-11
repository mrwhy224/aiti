$(function() {
	'use strict';

	var dt_basic_table = $('.datatables-basic');
	var assetPath = $('body').attr('data-asset-path') || '../';

	// DataTable initialization
	if (dt_basic_table.length) {
		var dt_basic = dt_basic_table.DataTable({
			ajax: function(data, callback, settings) {
				// This function fetches the data for the table.
				// You would replace this with your actual API endpoint.
				DataService.getData('/company/pending')
					.then(json => callback(json))
					.catch(error => callback({
						data: []
					}));
			},
			columns: [
				// columns according to your data
				{ data: 'id' },
				{ data: 'name' },
				{ data: 'national_id' },
				{ data: 'company_manager.name' },
				{ data: 'add_at' },
				{ data: '' }
			],
			columnDefs: [
				// {
				// 	// For the 'name' column
				// 	targets: 1,
				// 	render: function(data, type, full, meta) {
				// 		const name = full['title'];
				// 		// let output, colorClass = '';
				// 		// if (full['image']) {
				// 		// 	output = `<img src="${assetPath}images/avatars/${full['image']}" alt="Avatar" width="32" height="32">`;
				// 		// } else {
				// 		// 	const states = ['success', 'danger', 'warning', 'info', 'primary'];
				// 		// 	const initials = (name.match(/\b\w/g) || []).slice(0, 2).join('').toUpperCase();
				// 		// 	output = `<span class="avatar-content">${initials}</span>`;
				// 		// 	colorClass = `bg-light-${states[full['root'] % states.length]}`;
				// 		// }
				// 		// return `<div class="d-flex justify-content-left align-items-center"><div class="avatar ${colorClass} me-1">${output}</div><div class="d-flex flex-column"><span class="emp_name text-truncate fw-bold">${name}</span></div></div>`;
				// 	}
				// },
                {
                    // For the status column
                    targets: 3,
                    render: function(data, type, full, meta) {
                        return full['company_manager'] ? data:'(یافت نشد)';
                    }
                },
				{
					// Actions
					targets: -1,
					title: '',
					orderable: false,
					render: function(data, type, full, meta) {
						return `<div class="d-inline-flex"><a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">${feather.icons['more-vertical'].toSvg({ class: 'font-small-4' })}</a><div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item attributes-record">${feather.icons['external-link'].toSvg({ class: 'font-small-4 me-50' })}Get attributes</a><a href="javascript:;" class="dropdown-item products-record">${feather.icons['external-link'].toSvg({ class: 'font-small-4 me-50' })}Get products</a><a href="javascript:;" class="dropdown-item inventories-record">${feather.icons['external-link'].toSvg({ class: 'font-small-4 me-50' })}Get inventories</a><a href="javascript:;" class="dropdown-item info-record">${feather.icons['info'].toSvg({ class: 'font-small-4 me-50' })}More info</a><a href="javascript:;" class="dropdown-item delete-record">${feather.icons['trash-2'].toSvg({ class: 'font-small-4 me-50' })}Delete</a></div></div><a href="javascript:;" class="item-edit">${feather.icons['edit'].toSvg({ class: 'font-small-4' })}</a>`;
					}
				}
			],
			order: [
				[0, 'desc'] // Default sort by the first column in descending order
			],
			// The 'dom' option now excludes the buttons ('B') and the header label.
			dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
			displayLength: 7,
			lengthMenu: [7, 10, 25, 50, 100],
			// The buttons array is now empty.
			buttons: [],
			language: {
				search: "جستجو:",
				lengthMenu: "نمایش _MENU_ رکورد",
				emptyTable: "هیچ داده‌ای در جدول وجود ندارد",
				zeroRecords: "هیچ رکوردی با این مشخصات یافت نشد",
				info: "نمایش _START_ تا _END_ از _TOTAL_ رکورد",
				infoEmpty: "نمایش 0 تا 0 از 0 رکورد",
				infoFiltered: "(فیلتر شده از _MAX_ رکورد کل)",
				loadingRecords: "در حال بارگذاری...",
				processing: "در حال پردازش...",
				paginate: {
					previous: '&nbsp;',
					next: '&nbsp;'
				}
			}
		});
	}
});
