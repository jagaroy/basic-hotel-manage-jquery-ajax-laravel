@extends('adminlte.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-12 pt-2">
                <div class="card">
                    <div class="card-header bg-info">
                        <h3 class="card-title d-inline-block">Reminder List</h3>
                        <a href="javascript:void(0)" class="float-right btn btn-primary btn-sm" id="create-new-reminder"
                            onclick="addReminder()">
                            <i class="fas fa-plus"></i> Add Reminder
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="data_table" class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th width="5%">SL.</th>
                                        <th>Booking</th>
										<th>Description</th>
										<th>Reminder Time</th>
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
    <div class="modal fade" id="reminder-create-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Reminder</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add_form" role="form" class="form-inline" enctype="multipart/form-data">
                        
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="booking_id" class="col-sm-4 mr-2">Booking:</label>
                            <select class=" chosen" name="booking_id" id="booking_id"  required>
                                <option value="">Select</option>
                                @foreach ($bookings as $getValue)
                                    <option value="{{$getValue->id}}">{{$getValue->check_in_time}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="reminder_description" class="col-sm-4 mr-2">Description:</label>
                            <textarea class="form-control" id="reminder_description" name="reminder_description" required></textarea>
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="reminder_time" class="col-sm-4 mr-2">Reminder Time:</label>
                            <input type="datetime" class="form-control" id="reminder_time" name="reminder_time" placeholder="Reminder Time"  required>
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="reminder_status" class="col-sm-4 mr-2">Status:</label>
                            <input type="radio" name="reminder_status" value="Active" />Active &nbsp;<input type="radio" name="reminder_status" value="Inactive" />Inactive &nbsp;
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="remarks" class="col-sm-4 mr-2">Remarks:</label>
                            <textarea class="form-control" id="remarks" name="remarks" ></textarea>
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
    <div class="modal fade" id="reminder-edit-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Reminder</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit_form" role="form" class="form-inline" enctype="multipart/form-data">
                        @method('PUT')

                        
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="booking_id" class="col-sm-4 mr-2">Booking:</label>
                            <select class=" chosen" name="booking_id" id="booking_id"  required>
                                <option value="">Select</option>
                                @foreach ($bookings as $getValue)
                                    <option value="{{$getValue->id}}">{{$getValue->check_in_time}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="reminder_description" class="col-sm-4 mr-2">Description:</label>
                            <textarea class="form-control" id="reminder_description" name="reminder_description" required></textarea>
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="reminder_time" class="col-sm-4 mr-2">Reminder Time:</label>
                            <input type="datetime" class="form-control" id="reminder_time" name="reminder_time" placeholder="Reminder Time"  required>
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="reminder_status" class="col-sm-4 mr-2">Status:</label>
                            <input type="radio" name="reminder_status" value="Active" />Active &nbsp;<input type="radio" name="reminder_status" value="Inactive" />Inactive &nbsp;
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="remarks" class="col-sm-4 mr-2">Remarks:</label>
                            <textarea class="form-control" id="remarks" name="remarks" ></textarea>
                        </div>
                    <div class="clearfix"></div>
                
                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                    <label for="" class="col-sm-4 mr-2">&nbsp;</label>
                    <button class="btn btn-sm btn-primary w-25" type="submit"> Save </button>
                </div>

                        <input type="hidden" name="reminder_id" id="reminder_id">
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
                    url: "{{ route('reminders.index') }}",
                    async: false,
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},

                    {data: 'bookings_relation', name: 'bookings_relation.check_in_time'},
					{data: 'reminder_description', name: 'reminder_description'},
					{data: 'reminder_time', name: 'reminder_time'},
					{data: 'reminder_status', name: 'reminder_status'},
					{data: 'remarks', name: 'remarks'},
					
                    
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
                    url: "{{ route('reminders.store') }}",
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $.notify(data.message, data.status);
                        if (data.status == 'success') {
                            $('#add_form').trigger("reset");
                            $('#reminder-create-modal').modal('hide');
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
                var reminder_id = $("#reminder_id").val();
                var form_data = new FormData(this);

                let _url = `reminders/` + reminder_id;

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
                            $('#reminder-edit-modal').modal('hide');
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

        function editReminder(event) {
            $('#edit_form').trigger("reset");
            var id = $(event.target).data("id");
            let _url = 'reminders/' + id;

            $.ajax({
                url: _url,
                type: "GET",
                success: function(response) {
                    if (response) {
                        $("#reminder_id").val(response.id);
                        
                        $('#edit_form #booking_id').val(response.booking_id);
						setTimeout(function() {
                            $("#edit_form #booking_id").trigger("chosen:updated");
                        }, 200);

						$('#edit_form #reminder_description').text(response.reminder_description);
						$('#edit_form #reminder_time').val(response.reminder_time);
						$('#edit_form').find('input[name=reminder_status][value='+response.reminder_status+']').attr('checked', true);
						$('#edit_form #remarks').text(response.remarks);

                        $('#reminder-edit-modal').modal('show');
                    }
                }
            });
        }

        function addReminder() {

            $('#reminder-create-modal').modal('show');
            $('#add_form').trigger("reset");
        }
    </script>
@endsection
