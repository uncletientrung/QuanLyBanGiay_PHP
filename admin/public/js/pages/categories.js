Dashmix.onLoad(() =>
    class {
        static initDataTables() {
            // Override a few default classes
            jQuery.extend(jQuery.fn.dataTable.ext.classes, {
            sWrapper: "dataTables_wrapper dt-bootstrap5",
            sFilterInput: "form-control",
            sLengthSelect: "form-select"
            });

            // Override a few defaults
            jQuery.extend(true, jQuery.fn.dataTable.defaults, {
            language: {
                lengthMenu: "_MENU_",
                search: "_INPUT_",
                searchPlaceholder: "Search..",
                info: "Page <strong>_PAGE_</strong> of <strong>_PAGES_</strong>",
                paginate: {
                first: '<i class="fa fa-angle-double-left"></i>',
                previous: '<i class="fa fa-angle-left"></i>',
                next: '<i class="fa fa-angle-right"></i>',
                last: '<i class="fa fa-angle-double-right"></i>'
                }
            }
            });

            // Override buttons default classes
            jQuery.extend(true, jQuery.fn.DataTable.Buttons.defaults, {
            dom: {
                button: {
                className: 'btn btn-sm btn-primary'
                },
            }
            });

            
            // Init full extra DataTable
            jQuery('.js-dataTable-full-pagination').DataTable({
                pagingType: "full_numbers",
                pageLength: 10,
                dom: '<ftip>',
                autoWidth: false,
                ajax: {
                    url: './categories/getData',
                    dataSrc: ''
                },
                columns: [
                    {
                        data:'maloai',
                        className: 'text-center',
                        type:'num'
                    },
                    {
                        data:'tenloai'
                    }
                ]
            });
        }

        static init() {
            this.initDataTables();
        }
    }.init()
);