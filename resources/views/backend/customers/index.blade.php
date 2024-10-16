@extends('adminlte.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-12 pt-2">
                <div class="card">
                    <div class="card-header bg-info">
                        <h3 class="card-title d-inline-block">Customer List</h3>
                        <a href="javascript:void(0)" class="float-right btn btn-primary btn-sm" id="create-new-customer"
                            onclick="addCustomer()">
                            <i class="fas fa-plus"></i> Add Customer
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="data_table" class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th width="5%">SL.</th>
                                        <th>Name</th>
										<th>Phone</th>
										<th>Email</th>
										<th>Address</th>
										<th>Gender</th>
										<th>Photo</th>
										<th>Status</th>
										<th>Remarks</th>

                                        <th width="13%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Add data -->
    <div class="modal fade" id="customer-create-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Customer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add_form" role="form" class="form-inline" enctype="multipart/form-data">
                        
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="customer_name" class="col-sm-4 mr-2">Name:</label>
                            <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Name" required>
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="customer_phone" class="col-sm-4 mr-2">Phone:</label>
                            <input type="text" class="form-control" id="customer_phone" name="customer_phone" placeholder="Phone" required>
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="customer_email" class="col-sm-4 mr-2">Email:</label>
                            <input type="email" class="form-control" id="customer_email" name="customer_email" placeholder="Email" required>
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="customer_address" class="col-sm-4 mr-2">Address:</label>
                            <textarea class="form-control" id="customer_address" name="customer_address" required></textarea>
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="customer_gender" class="col-sm-4 mr-2">Gender:</label>
                            <input type="radio" name="customer_gender" value="Male" />Male &nbsp;<input type="radio" name="customer_gender" value="Female" />Female &nbsp;<input type="radio" name="customer_gender" value="Other" />Other &nbsp;
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="customer_photo" class="col-sm-4 mr-2">Image:</label>
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new img-thumbnail" style="width: 120px; height: 120px;">
                                    <img src="" alt="image" />
                                </div>
                                <div class="fileinput-preview fileinput-exists img-thumbnail"
                                    style="max-width: 120px; max-height: 120px;">
                                </div>
                                <div>
                                    <span class="btn btn-sm btn-info btn-outline- btn-file">
                                        <span class="fileinput-new">Select New Image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="customer_photo" id="customer_photo" accept="image/*"  />
                                    </span>
                                    <a href="#" class="btn btn-sm btn-danger btn-outline- fileinput-exists"
                                        data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="customer_status" class="col-sm-4 mr-2">Status:</label>
                            <input type="radio" name="customer_status" value="Active" />Active &nbsp;<input type="radio" name="customer_status" value="Inactive" />Inactive &nbsp;
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="customer_remarks" class="col-sm-4 mr-2">Remarks:</label>
                            <textarea class="form-control" id="customer_remarks" name="customer_remarks" ></textarea>
                        </div>
                    <div class="clearfix"></div>
                
                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                    <label for="" class="col-sm-4 mr-2">&nbsp;</label>
                    <button class="btn btn-sm btn-primary w-25" type="submit"> Save </button>
                </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit data -->
    <div class="modal fade" id="customer-edit-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Customer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit_form" role="form" class="form-inline" enctype="multipart/form-data">
                        @method('PUT')

                        
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="customer_name" class="col-sm-4 mr-2">Name:</label>
                            <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Name" required>
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="customer_phone" class="col-sm-4 mr-2">Phone:</label>
                            <input type="text" class="form-control" id="customer_phone" name="customer_phone" placeholder="Phone" required>
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="customer_email" class="col-sm-4 mr-2">Email:</label>
                            <input type="email" class="form-control" id="customer_email" name="customer_email" placeholder="Email" required>
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="customer_address" class="col-sm-4 mr-2">Address:</label>
                            <textarea class="form-control" id="customer_address" name="customer_address" required></textarea>
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="customer_gender" class="col-sm-4 mr-2">Gender:</label>
                            <input type="radio" name="customer_gender" value="Male" />Male &nbsp;<input type="radio" name="customer_gender" value="Female" />Female &nbsp;<input type="radio" name="customer_gender" value="Other" />Other &nbsp;
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="customer_photo" class="col-sm-4 mr-2">Image:</label>
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new img-thumbnail" style="width: 120px; height: 120px;">
                                    <img src="" alt="image" />
                                </div>
                                <div class="fileinput-preview fileinput-exists img-thumbnail"
                                    style="max-width: 120px; max-height: 120px;">
                                </div>
                                <div>
                                    <span class="btn btn-sm btn-info btn-outline- btn-file">
                                        <span class="fileinput-new">Select New Image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="customer_photo" id="customer_photo" accept="image/*"  />
                                    </span>
                                    <a href="#" class="btn btn-sm btn-danger btn-outline- fileinput-exists"
                                        data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="customer_status" class="col-sm-4 mr-2">Status:</label>
                            <input type="radio" name="customer_status" value="Active" />Active &nbsp;<input type="radio" name="customer_status" value="Inactive" />Inactive &nbsp;
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="customer_remarks" class="col-sm-4 mr-2">Remarks:</label>
                            <textarea class="form-control" id="customer_remarks" name="customer_remarks" ></textarea>
                        </div>
                    <div class="clearfix"></div>
                
                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                    <label for="" class="col-sm-4 mr-2">&nbsp;</label>
                    <button class="btn btn-sm btn-primary w-25" type="submit"> Save </button>
                </div>

                        <input type="hidden" name="customer_id" id="customer_id">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Data -->
    <script>
        var base_url = "{{ url('/') }}";
        var table = "";

        $(document).ready(function() {
            let ttitle = document.title;
            let messageTop = '';
            let messageBottom = '';

            table = $('#data_table').on( 'error.dt', function ( e, settings, techNote, message ) {
                if(confirm('Please reload this page and check.')){
                    location.reload();
                }
            }).DataTable({
                pageLength: 5,
                lengthMenu: [5, 10, 20, 50, 100, 200, 500, 1000, 100000],
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('customers.index') }}",
                    async: false,
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},

                    {data: 'customer_name', name: 'customer_name'},
					{data: 'customer_phone', name: 'customer_phone'},
					{data: 'customer_email', name: 'customer_email'},
					{data: 'customer_address', name: 'customer_address'},
					{data: 'customer_gender', name: 'customer_gender'},
					{data: 'customer_photo', name: 'customer_photo',
						render: function(data, type, full, meta) {
							return '<img class="page_image" src="' + base_url +'/public'+ data +
                                '" height="50" alt="image" >';
						}
					},
					{data: 'customer_status', name: 'customer_status'},
					{data: 'customer_remarks', name: 'customer_remarks'},
					
                    
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                fixedHeader: {
                    //for export in general
                    header: true,
                    headerOffset: $('#fixed').height()
                },
                searching: true,
                mark: true,
                dom: 'Blfrtip',
                buttons: [{
                        extend: 'print',
                        text: '<i class="fas fa-file-pdf"></i> Print/Save to PDF',
                        exportOptions: {
                            stripHtml: false, //for image show
                            columns: [0,1,2,3,4,5,6,7,8],
                        },
                        title: ttitle,
                        messageTop: function() {
                            return messageTop;
                        },
                        messageBottom: function() {
                            return '<h3 style="text-align:center">' + messageBottom + '</h3>';
                        },
                        customize: function(win) {

                            // this line is for centering messageTop
                            $(win.document.messageTop).css('text-align', 'center')

                            // for landscape print
                            var css =
                                '@page  { size: landscape; margin-top:30px; margin-botton:30px; }',
                                head = win.document.head || win.document.getElementsByTagName(
                                    'head')[0],
                                style = win.document.createElement('style');
                            style.type = 'text/css';
                            style.media = 'print';
                            if (style.styleSheet) {
                                style.styleSheet.cssText = css;
                            } else {
                                style.appendChild(win.document.createTextNode(css));
                            }
                            head.appendChild(style);
                            // for landscape end

                        },
                    },
                    {
                        text: '<div class="bg-info"><i class="fas fa-file-pdf"></i> Print/Save to PDF All.</div>',
                        action: function(e, dt, node, config) {
                            dt.page.len(-1).draw();
                            dt.button('.buttons-print').trigger();
                        }
                    }, 
                ],

                drawCallback: function( settings ) {
                    // any js/jquery action after table draw
                    $(document).find('#data_table tr').each(function(index, el) {
                        let idd = $(el).closest('tr').find('.edit_btn').data('id');
                        $(el).addClass('row_' + idd);
                    });
                },
            });
            $('#add_form').submit(function(e) {
                e.preventDefault();
                var form_data = new FormData(this);

                $.ajax({
                    data: form_data,
                    url: "{{ route('customers.store') }}",
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $.notify(data.message, data.status);
                        if (data.status == 'success') {
                            $('#add_form').trigger("reset");
                            $('#customer-create-modal').modal('hide');
                            table.draw();
                        }
                    },
                    error: function(data) {
                        console.log('Error:', data);
                        if (data.status === 422) {
                            var response = JSON.parse(data.responseText);
                            var errors = response['errors'];
                            $.each(errors, function(key, val) {
                                $.notify(val[0], 'error');
                            });
                        }
                    }
                });
            });

            $('#edit_form').submit(function(e) {
                e.preventDefault();
                var customer_id = $("#customer_id").val();
                var form_data = new FormData(this);

                let _url = `customers/` + customer_id;

                $.ajax({
                    data: form_data,
                    url: _url,
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $.notify(data.message, data.status);
                        if (data.status == 'success') {

                            $('#edit_form').trigger("reset");
                            $('#customer-edit-modal').modal('hide');
                            table.draw();
                        }
                    },
                    error: function(data) {
                        console.log('Error:', data);
                        if (data.status === 422) {
                            var response = JSON.parse(data.responseText);
                            var errors = response['errors'];
                            $.each(errors, function(key, val) {
                                $.notify(val[0], 'error');
                            });
                        }
                    }
                });
            });
        });

        function editCustomer(event) {
            $('#edit_form').trigger("reset");
            var id = $(event.target).data("id");
            let _url = 'customers/' + id;

            $.ajax({
                url: _url,
                type: "GET",
                success: function(response) {
                    if (response) {
                        $("#customer_id").val(response.id);
                        
                        $('#edit_form #customer_name').val(response.customer_name);
						$('#edit_form #customer_phone').val(response.customer_phone);
						$('#edit_form #customer_email').val(response.customer_email);
						$('#edit_form #customer_address').text(response.customer_address);
						$('#edit_form').find('input[name=customer_gender][value='+response.customer_gender+']').attr('checked', true);
						$('#edit_form #customer_photo').closest('.fileinput').find('img').prop('src', response.customer_photo);
						$('#edit_form').find('input[name=customer_status][value='+response.customer_status+']').attr('checked', true);
						$('#edit_form #customer_remarks').text(response.customer_remarks);

                        $('#customer-edit-modal').modal('show');
                    }
                }
            });
        }

        function addCustomer() {

            $('#customer-create-modal').modal('show');
            $('#add_form').trigger("reset");
        }
    </script>
@endsection
