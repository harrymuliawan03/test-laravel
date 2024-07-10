<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Machine Filter</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
            background-color: #f8f9fa;
        }

        .container {
            width: 70%;
            margin: auto;
        }

        .filter-container {
            margin-bottom: 20px;
        }

        .filter-container input {
            margin-right: 10px;
        }

        .dataTable {
            background-color: #fff;
            border-radius: 5px;
            max-width: 98%;
            padding: 20px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.5em 1em;
            margin-left: 2px;
            color: #fff !important;
            background-color: #007bff !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background-color: #0056b3 !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <h1 class="mb-4">Machine Filter</h1>
        <div class="filter-container">
            <input type="text" id="mesin_id" class="form-control d-inline-block" style="width: 200px;" placeholder="MESIN ID">
            <input type="text" id="site" class="form-control d-inline-block" style="width: 200px;" placeholder="SITE">
            <input type="text" id="month" class="form-control d-inline-block" style="width: 200px;" placeholder="MONTH">
            <input type="text" id="status" class="form-control d-inline-block" style="width: 200px;" placeholder="STATUS">
            <input type="text" id="location" class="form-control d-inline-block" style="width: 200px;" placeholder="LOCATION">
            <input type="text" id="operator" class="form-control d-inline-block" style="width: 200px;" placeholder="OPERATOR">
        </div>
        <table id="machineTable" class="display dataTable table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>MESIN ID</th>
                    <th>SITE</th>
                    <th>MONTH</th>
                    <th>STATUS</th>
                    <th>LOCATION</th>
                    <th>OPERATOR</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            function loadData(filters = {}) {
                $.ajax({
                    url: '/filter',
                    data: filters,
                    success: function(data) {
                        $('#machineTable').DataTable().clear().rows.add(data).draw();
                    }
                });
            }

            $('#machineTable').DataTable({
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + 1;
                        }
                    },
                    {
                        data: 'mesin_id'
                    },
                    {
                        data: 'site'
                    },
                    {
                        data: 'month'
                    },
                    {
                        data: 'status'
                    },
                    {
                        data: 'location'
                    },
                    {
                        data: 'operator'
                    }
                ],
                pageLength: 10,
                lengthChange: true,
                searching: false,
                info: false,
                pagingType: "simple",
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
            });

            $('#mesin_id, #site, #month, #status, #location, #operator').on('keyup', function() {
                const filters = {
                    mesin_id: $('#mesin_id').val(),
                    site: $('#site').val(),
                    month: $('#month').val(),
                    status: $('#status').val(),
                    location: $('#location').val(),
                    operator: $('#operator').val()
                };
                loadData(filters);
            });

            loadData();
        });
    </script>
</body>

</html>