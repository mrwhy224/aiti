$(function() {
    'use strict';
    const pathSegments = window.location.pathname.split('/');
    const categoryId = pathSegments.pop();
    if (!categoryId) return console.error('Category ID not found in URL.');

    loadAndBlockSection('.content-header-title', `/category/show/${categoryId}`, function(json) {
        $('.content-header-title').html(`Category attributes - ${json.data.name}`);
    }, {}, '#f3f3f3');
    
    const repeaterContainer = $('.invoice-repeater');
    let deletedAttributeIds = []; // Array to track IDs of deleted rows

    // This function runs when the page loads
    initializeAttributeRepeater();
    let repeaterInit = false;

    /**
     * Fetches data, manually builds the HTML for all rows, injects it,
     * and then initializes the repeater plugin. This is a more stable approach.
     */
    async function initializeAttributeRepeater() {
        if (!repeaterContainer.length) return;
        repeaterContainer.block({
            message: '<div class="spinner-border text-primary" role="status"></div>',
            css: { backgroundColor: 'transparent', border: '0' },
            overlayCSS: { backgroundColor: '#fff', opacity: 1 }
        });

        try {
            // 1. Fetch all necessary data first
            const [attributeResponse, unitResponse] = await Promise.all([
                DataService.getData(`/category/${categoryId}/attribute`),
                DataService.getData('/unit/list')
            ]);

            if (!attributeResponse.ok || !unitResponse.ok) {
                throw new Error('Failed to load initial data.');
            }

            const attributes = attributeResponse.data;
            const units = unitResponse.data;

            repeaterContainer.data('units', units); // Store units for later use
            deletedAttributeIds = []; // Reset delete list

            // 2. If repeater is already initialized, destroy it to start fresh
            if (repeaterContainer.data('repeater')) {
                repeaterContainer.repeater('destroy');
            }

            const repeaterList = repeaterContainer.find('[data-repeater-list]');
            if (!repeaterInit){
                repeaterInit = true;
                initializeRepeaterPlugin();
            }
            repeaterList.empty(); // Clear out any old rows

            // 3. Manually build the HTML for each existing attribute
            attributes.forEach(attribute => {
                const $newRow = createAttributeRow(attribute, units);
                repeaterList.append($newRow);
            });

            // 4. NOW, initialize the repeater plugin on the pre-built content

        } catch (error) {
            console.error('Error initializing attributes:', error);
            toastr['error'](error.message, 'Load Failed');
        } finally {
            repeaterContainer.unblock();
        }
    }

    /**
     * Creates the complete HTML for a single attribute row, including populated selects.
     */
    function createAttributeRow(attribute, allUnits) {
        const isUnitDisabled = !(attribute.type === 'int' || attribute.type === 'float');
        const disabledAttr = isUnitDisabled ? 'disabled' : '';

        // Create the options for the unit select box
        let unitOptions = allUnits.map(unit =>
            `<option value="${unit.id}" ${attribute.unit_id == unit.id ? 'selected' : ''}>${unit.name}</option>`
        ).join('');

        const rowHtml = `
            <div data-repeater-item>
                <input type="hidden" class="item-id" name="id" value="${attribute.id || ''}" />
                <div class="row d-flex align-items-end">
                    <div class="col-md-2 col-12"><div class="mb-1"><label class="form-label">Item Name</label><input type="text" class="form-control item-name" name="item-name" value="${attribute.name || ''}"></div></div>
                    <div class="col-md-2 col-12"><div class="mb-1"><label class="form-label">Type</label><select class="form-select type-select" name="type-select"><option value="string" ${attribute.type === 'string' ? 'selected' : ''}>Text</option><option value="int" ${attribute.type === 'int' ? 'selected' : ''}>Number (integer)</option><option value="float" ${attribute.type === 'float' ? 'selected' : ''}>Number (Float)</option><option value="bool" ${attribute.type === 'bool' ? 'selected' : ''}>Boolean</option></select></div></div>
                    <div class="col-md-2 col-12"><div class="mb-1"><label class="form-label">Unit</label><select class="form-select unit-select" name="unit-select" autocomplete="off" ${disabledAttr}>${unitOptions}</select></div></div>
                    <div class="col-md-2 col-12"><div class="form-check form-check-inline mb-2"><input class="form-check-input is-required" name="is-required" type="checkbox" ${attribute.is_required ? 'checked' : ''}><label class="form-check-label">Required</label></div></div>
                    <div class="col-md-2 col-12"><div class="mb-1"><button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">${feather.icons['x'].toSvg({ class: 'me-25' })}<span>Delete</span></button></div></div>
                </div><hr>
            </div>`;
        return $(rowHtml);
    }

    /**
     * Centralized function to initialize the repeater plugin.
     */
    function initializeRepeaterPlugin() {
        repeaterContainer.repeater({
            show: function() {
                $(this).slideDown();
                const $row = $(this);
                const $unitSelect = $row.find('.unit-select');
                const $typeSelect = $row.find('.type-select');
                const units = repeaterContainer.data('units');

                // When a new row is added, populate its unit select and disable it
                if ($unitSelect.is(':empty') && units) {
                    units.forEach(unit => {
                        $unitSelect.append(`<option value="${unit.id}">${unit.name}</option>`);
                    });
                }
                $typeSelect.val('string');
                $unitSelect.val(1)
                $unitSelect.prop('disabled', true); // New rows default to 'text' type
            },
            hide: function(deleteElement) {
                if (confirm('Are you sure you want to delete this element?')) {
                    const attributeId = $(this).find('input.item-id').val();
                    if (attributeId) {
                        deletedAttributeIds.push(attributeId);
                    }
                    $(this).slideUp(deleteElement);
                }
            }
        });
    }

    // Delegated event listener for the 'Type' select
    repeaterContainer.on('change', '.type-select', function() {
        const $unitSelect = $(this).closest('[data-repeater-item]').find('.unit-select');
        const selectedType = $(this).val();
        $unitSelect.prop('disabled', !(selectedType === 'int' || selectedType === 'float'));
        if (!(selectedType === 'int' || selectedType === 'float')) {$unitSelect.val(1)}
    });

    // Event listener for the "Discard Changes" button
    $('#discard-changes-button').on('click', function() {
        if (confirm('Are you sure you want to discard all changes?')) {
            initializeAttributeRepeater();
        }
    });

    // Event listener for the main "Save Changes" button
    $('#save-changes-button').on('click', async function() {
        const categoryId = window.location.pathname.split('/').pop();
        const repeaterData = repeaterContainer.repeaterVal().attributes;
        const attributesToSave = repeaterData.filter(attr => attr['item-name'] && attr['item-name'].trim() !== '');

        const payload = {
            updates: attributesToSave.map(attr => ({
                id: attr.id || null,
                name: attr['item-name'],
                type: attr['type-select'],
                unit_id: attr['unit-select']==1?null:attr['unit-select'],
                is_required: attr['is-required'][0] === 'on'
            })),
            deletes: deletedAttributeIds
        };

        repeaterContainer.block({
            message: '<div class="spinner-border text-primary" role="status"></div>',
            css: { backgroundColor: 'transparent', border: '0' },
            overlayCSS: { backgroundColor: '#fff', opacity: 1 }
        });

        try {
            DataService.clearCache(`/category/${categoryId}/attribute`);
            DataService.clearCache('/unit/list');
            await AuthService.fetch(`/category/${categoryId}/attribute/sync`, {
                method: 'POST',
                body: JSON.stringify(payload)
            });
            toastr['success']('Attributes saved successfully!');
            await initializeAttributeRepeater();
        } catch (error) {
            toastr['error'](error.message, 'Save Failed');
        } finally {
            repeaterContainer.unblock();
        }
    });
});