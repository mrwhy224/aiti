const findNodeById = (nodes, id) => {
	for (const node of nodes) {
		if (node.id === id) return node;
		if (node.children) {
			const found = findNodeById(node.children, id);
			if (found) return found;
		}
	}
	return null;
};

const collectAllDescendantIds = (startNode) => {
	let ids = [];

	function recurse(currentNode) {
		if (!currentNode.children || currentNode.children.length === 0) {
			return;
		}
		currentNode.children.forEach(child => {
			ids.push(child.id);
			recurse(child);
		});
	}
	recurse(startNode);
	return ids;
};

const filterAndFlattenTree = (nodes, forbiddenIds = [], flatList = []) => {
	nodes.forEach(node => {
		if (!forbiddenIds.includes(node.id)) {
			flatList.push({
				id: node.id,
				text: node.text
			});
			if (node.children && node.children.length > 0) {
				filterAndFlattenTree(node.children, forbiddenIds, flatList);
			}
		}
	});
	return flatList;
};

const initializeSelect = async (categoryToEditId = null, initialItems = []) => {
	const selectEl = $('#select2-parent');
	if (selectEl.length) {
		try {
			const response = await DataService.getData('/category/tree');
			const fullTree = response.data;
			let forbiddenIds = [];

			if (categoryToEditId !== null) {
				forbiddenIds.push(categoryToEditId);
				const nodeToEdit = findNodeById(fullTree, categoryToEditId);
				if (nodeToEdit) {
					const descendantIds = collectAllDescendantIds(nodeToEdit);
					forbiddenIds = forbiddenIds.concat(descendantIds);
				}
			}

			const select2Data = filterAndFlattenTree(fullTree, forbiddenIds, initialItems);

			if (selectEl.hasClass("select2-hidden-accessible")) {
				selectEl.select2('destroy');
			}
			selectEl.empty();

			selectEl.wrap('<div class="position-relative"></div>').select2({
				dropdownAutoWidth: true,
				dropdownParent: selectEl.parent(),
				width: '100%',
				placeholder: 'Select a category',
				data: select2Data
			});
		} catch (error) {
			console.error("Failed to initialize Select2:", error);
		}
	}
};

async function openEditModalAndSetData(rowData) {
	await initializeSelect(rowData.id, [{
		id: 0,
		text: 'Root (No parent)'
	}]);
	$('#formModalLabel').text('Edit Record');
	$('#name-input').val(rowData.name);
	$('#slug-input').val(rowData.slug);
	$('#mode-input').val(rowData.id);
	$('#select2-parent').val(rowData.parent ? rowData.parent.id : 0).trigger('change');
	$('.modal').modal('show');
}

async function saveCategory(categoryData) {
	const isUpdate = !!categoryData.id;
	const endpoint = isUpdate ? '/category/update' : '/category/add';
	const response = await AuthService.fetch(endpoint, {
		method: 'POST',
		body: JSON.stringify(categoryData)
	});
	if (!response.ok) {
		const errorResult = await response.json();
		throw new Error(errorResult.message || `Failed to ${isUpdate ? 'update' : 'create'} category.`);
	}
	return response.json();
}

$(function() {
	'use strict';
	var ajaxTree = $('#jstree-ajax');
	var dt_basic_table = $('.datatables-basic');
	var assetPath = $('body').attr('data-asset-path') || '../';

	if (ajaxTree.length) {
		ajaxTree.jstree({
			core: {
				data: async function(node, cb) {
					try {
						const json = await DataService.getData('/category/tree');
						cb(json && json.ok ? json.data : []);
					} catch (error) {
						cb([]);
						toastr['error'](error.message, 'Error!');
					}
				}
			},
			plugins: ['types', 'state'],
			types: {
				default: {
					icon: 'fas fa-layer-group'
				}
			}
		});
	}

	if (dt_basic_table.length) {
		var dt_basic = dt_basic_table.DataTable({
			ajax: function(data, callback, settings) {
				DataService.getData('/category/list')
					.then(json => callback(json))
					.catch(error => callback({
						data: []
					}));
			},
			columns: [{data: 'id' }, {data: 'name' }, {data: 'product_count' }, {data: 'inventory_count' }, {data: 'root' }, {data: 'created_at' }, {data: '' } ],
			columnDefs: [{
					targets: 1,
					render: function(data, type, full, meta) {
						const name = full['name'];
						let output, colorClass = '';
						if (full['image']) {
							output = `<img src="${assetPath}images/avatars/${full['image']}" alt="Avatar" width="32" height="32">`;
						} else {
							const states = ['success', 'danger', 'warning', 'info', 'primary'];
							const initials = (name.match(/\b\w/g) || []).slice(0, 2).join('').toUpperCase();
							output = `<span class="avatar-content">${initials}</span>`;
							colorClass = `bg-light-${states[full['root'] % states.length]}`;
						}
						return `<div class="d-flex justify-content-left align-items-center"><div class="avatar ${colorClass} me-1">${output}</div><div class="d-flex flex-column"><span class="emp_name text-truncate fw-bold">${name}</span></div></div>`;
					}
				},
				{
					targets: 4,
					render: function(data, type, full, meta) {
						const statusMap = {
							0: {
								title: 'Sub-category',
								class: 'badge-light-success'
							},
							1: {
								title: 'Root',
								class: 'badge-light-primary'
							}
						};
						return statusMap[full['root']] ? `<span class="badge rounded-pill ${statusMap[full['root']].class}">${statusMap[full['root']].title}</span>` : data;
					}
				},
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function(data, type, full, meta) {
						return `<div class="d-inline-flex"><a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">${feather.icons['more-vertical'].toSvg({ class: 'font-small-4' })}</a><div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item attributes-record">${feather.icons['external-link'].toSvg({ class: 'font-small-4 me-50' })}Get attributes</a><a href="javascript:;" class="dropdown-item products-record">${feather.icons['external-link'].toSvg({ class: 'font-small-4 me-50' })}Get products</a><a href="javascript:;" class="dropdown-item inventories-record">${feather.icons['external-link'].toSvg({ class: 'font-small-4 me-50' })}Get inventories</a><a href="javascript:;" class="dropdown-item info-record">${feather.icons['info'].toSvg({ class: 'font-small-4 me-50' })}More info</a><a href="javascript:;" class="dropdown-item delete-record">${feather.icons['trash-2'].toSvg({ class: 'font-small-4 me-50' })}Delete</a></div></div><a href="javascript:;" class="item-edit">${feather.icons['edit'].toSvg({ class: 'font-small-4' })}</a>`;
					}
				}
			],
			order: [
				[0, 'desc']
			],
			dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
			displayLength: 7,
			lengthMenu: [7, 10, 25, 50, 100],
			buttons: [{
					extend: 'collection',
					className: 'btn btn-outline-secondary dropdown-toggle me-2',
					text: feather.icons['share'].toSvg({
						class: 'font-small-4 me-50'
					}) + 'Export',
					buttons: [{
							extend: 'print',
							className: 'dropdown-item'
						},
						{
							extend: 'csv',
							className: 'dropdown-item'
						},
						{
							extend: 'excel',
							className: 'dropdown-item'
						}
					]
				},
				{
					text: feather.icons['plus'].toSvg({
						class: 'me-50 font-small-4'
					}) + 'Add New Record',
					className: 'create-new btn btn-primary',
					attr: {
						'data-bs-toggle': 'modal',
						'data-bs-target': '#modals-slide-in'
					},
					init: (api, node, config) => $(node).removeClass('btn-secondary'),
					action: (e, dt, node, config) => {
						$('#formModalLabel').text('New Record');
						$('#mode-input').val('add');
						$('#name-input').val('');
						$('#slug-input').val('');
						initializeSelect(null, [{
							id: 0,
							text: 'Root (No parent)'
						}]);
						$('#select2-parent').val(0).trigger('change');
					}
				}
			],
			language: {
				paginate: {
					previous: '&nbsp;',
					next: '&nbsp;'
				}
			}
		});
		$('div.head-label').html('<h6 class="mb-0">Category details</h6>');
	}

	$('.data-submit').on('click', async function() {
		try {
			const parentId = $('#select2-parent').val();
			const categoryData = {
				id: $('#mode-input').val() === 'add' ? null : $('#mode-input').val(),
				name: $('#name-input').val(),
				slug: $('#slug-input').val(),
				parent_id: parentId === '0' ? null : parentId
			};
			await saveCategory(categoryData);
			DataService.clearCache('/category/list');
			DataService.clearCache('/category/tree');
			ajaxTree.jstree(true).refresh();
			dt_basic_table.DataTable().ajax.reload();
			$('.modal').modal('hide');
		} catch (error) {
			console.error('Error saving category:', error);
			toastr['error'](error.message, 'Save Failed');
		}
	});

	$('.datatables-basic tbody').on('click', '.delete-record', async function() {
		var rowData = dt_basic.row($(this).closest('tr')).data();
		if (confirm('Are you sure you want to delete this record?')) {
			try {
				await AuthService.fetch('/category/delete', {
					method: 'POST',
					body: JSON.stringify({
						id: rowData.id
					})
				});
				DataService.clearCache('/category/list');
				DataService.clearCache('/category/tree');
				ajaxTree.jstree(true).refresh();
				dt_basic_table.DataTable().ajax.reload();
			} catch (error) {
				toastr['error'](error.message, 'Delete Failed');
			}
		}
	});

	$('.datatables-basic tbody').on('click', '.attributes-record', function() {
		var rowData = dt_basic.row($(this).closest('tr')).data();
		window.location.href = `/category/attributes/${rowData.id}`;
	});
	$('.datatables-basic tbody').on('click', '.item-edit', function() {
		var rowData = dt_basic.row($(this).closest('tr')).data();
		openEditModalAndSetData(rowData);
	});
});