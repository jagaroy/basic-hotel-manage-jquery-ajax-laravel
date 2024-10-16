@extends('adminlte.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-12 pt-2">
                <div class="card">
                    <div class="card-header bg-info">
                        <h3 class="card-title d-inline-block">RoomType List</h3>
                        <a href="javascript:void(0)" class="float-right btn btn-primary btn-sm" id="create-new-roomtype"
                            onclick="addRoomType()">
                            <i class="fas fa-plus"></i> Add RoomType
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="data_table" class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th width="5%">SL.</th>
                                        <th>Room Type</th>
										<th>Image</th>
										<th>Description</th>
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
    <div class="modal fade" id="roomtype-create-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create RoomType</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add_form" role="form" class="form-inline" enctype="multipart/form-data">
                        
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="room_type" class="col-sm-4 mr-2">Room Type:</label>
                            <input type="text" class="form-control" id="room_type" name="room_type" placeholder="Room Type" required>
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="room_type_image" class="col-sm-4 mr-2">Image:</label>
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
                                        <input type="file" name="room_type_image" id="room_type_image" accept="image/*" required />
                                    </span>
                                    <a href="#" class="btn btn-sm btn-danger btn-outline- fileinput-exists"
                                        data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="room_type_desc" class="col-sm-4 mr-2">Description:</label>
                            <input type="text" class="form-control" id="room_type_desc" name="room_type_desc" placeholder="Description" required>
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="room_type_status" class="col-sm-4 mr-2">Status:</label>
                            <input type="radio" name="room_type_status" value="Active" />Active &nbsp;<input type="radio" name="room_type_status" value="Inactive" />Inactive &nbsp;
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="room_type_remarks" class="col-sm-4 mr-2">Remarks:</label>
                            <textarea class="form-control" id="room_type_remarks" name="room_type_remarks" ></textarea>
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
    <div class="modal fade" id="roomtype-edit-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit RoomType</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit_form" role="form" class="form-inline" enctype="multipart/form-data">
                        @method('PUT')

                        
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="room_type" class="col-sm-4 mr-2">Room Type:</label>
                            <input type="text" class="form-control" id="room_type" name="room_type" placeholder="Room Type" required>
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="room_type_image" class="col-sm-4 mr-2">Image:</label>
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
                                        <input type="file" name="room_type_image" id="room_type_image" accept="image/*" required />
                                    </span>
                                    <a href="#" class="btn btn-sm btn-danger btn-outline- fileinput-exists"
                                        data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="room_type_desc" class="col-sm-4 mr-2">Description:</label>
                            <input type="text" class="form-control" id="room_type_desc" name="room_type_desc" placeholder="Description" required>
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="room_type_status" class="col-sm-4 mr-2">Status:</label>
                            <input type="radio" name="room_type_status" value="Active" />Active &nbsp;<input type="radio" name="room_type_status" value="Inactive" />Inactive &nbsp;
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="room_type_remarks" class="col-sm-4 mr-2">Remarks:</label>
                            <textarea class="form-control" id="room_type_remarks" name="room_type_remarks" ></textarea>
                        </div>
                    <div class="clearfix"></div>
                
                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                    <label for="" class="col-sm-4 mr-2">&nbsp;</label>
                    <button class="btn btn-sm btn-primary w-25" type="submit"> Save </button>
                </div>

                        <input type="hidden" name="roomtype_id" id="roomtype_id">
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
                    url: "{{ route('roomtypes.index') }}",
                    async: false,
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},

                    {data: 'room_type', name: 'room_type'},
					{data: 'room_type_image', name: 'room_type_image',
						render: function(data, type, full, meta) {
							return '<img class="page_image" src="' + base_url +'/public'+ data +
                                '" height="50" alt="image" >';
						}
					},
					{data: 'room_type_desc', name: 'room_type_desc'},
					{data: 'room_type_status', name: 'room_type_status'},
					{data: 'room_type_remarks', name: 'room_type_remarks'},
					
                    
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
                            columns: [0,1,2,3,4,5],
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
                    url: "{{ route('roomtypes.store') }}",
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $.notify(data.message, data.status);
                        if (data.status == 'success') {
                            $('#add_form').trigger("reset");
                            $('#roomtype-create-modal').modal('hide');
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
                var roomtype_id = $("#roomtype_id").val();
                var form_data = new FormData(this);

                let _url = `roomtypes/` + roomtype_id;

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
                            $('#roomtype-edit-modal').modal('hide');
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

        function editRoomType(event) {
            $('#edit_form').trigger("reset");
            var id = $(event.target).data("id");
            let _url = 'roomtypes/' + id;

            $.ajax({
                url: _url,
                type: "GET",
                success: function(response) {
                    if (response) {
                        $("#roomtype_id").val(response.id);
                        
                        $('#edit_form #room_type').val(response.room_type);
						$('#edit_form #room_type_image').closest('.fileinput').find('img').prop('src', response.room_type_image);
						$('#edit_form #room_type_desc').val(response.room_type_desc);
						$('#edit_form').find('input[name=room_type_status][value='+response.room_type_status+']').attr('checked', true);
						$('#edit_form #room_type_remarks').text(response.room_type_remarks);

                        $('#roomtype-edit-modal').modal('show');
                    }
                }
            });
        }

        function addRoomType() {

            $('#roomtype-create-modal').modal('show');
            $('#add_form').trigger("reset");
        }
    </script>
@endsection
