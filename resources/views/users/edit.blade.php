@extends('adminlte.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 pt-2">
                <div class="card">
                    <div class="card-header bg-info">
                        <h3 class="card-title d-inline-block">Profile</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form id="edit_form" role="form" class="form-inline" enctype="multipart/form-data">
                            @method('PUT')
                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                                <label for="type" class="col-sm-4 mr-2">Type:</label>
                                <div class="col-sm-4 mr-2">{{ Auth::user()->type }}</div>
                                <input type="text" class="form-control" name="type" value="{{ Auth::user()->type }}"
                                    hidden>
                            </div>
                            @if (Auth::user()->type != 'superadmin')
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                                    <label for="role_id" class="col-sm-4 mr-2">Role:</label>
                                    <select class=" chosen" name="role_id" id="role_id">
                                        <option value="">Select</option>
                                        @foreach ($roles as $getValue)
                                            <option value="{{ $getValue->id }}"
                                                {{ Auth::user()->role_id == $getValue->id ? 'selected' : '' }}>
                                                {{ $getValue->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                                <label for="name" class="col-sm-4 mr-2">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="name"
                                    value="{{ Auth::user()->name }}">
                            </div>
                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                                <label for="email" class="col-sm-4 mr-2">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="email"
                                    value="{{ Auth::user()->email }}">
                            </div>
                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                                <label for="phone" class="col-sm-4 mr-2">Phone:</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="phone"
                                    value="{{ Auth::user()->phone }}">
                            </div>
                            @if (Auth::user()->type != 'superadmin')
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                                    <label for="status" class="col-sm-4 mr-2">Status:</label>
                                    <input type="radio" name="status" value="Active"
                                        {{ Auth::user()->status == 'Active' ? 'checked' : '' }} />Active &nbsp;
                                    <input type="radio" name="status" value="Inactive"
                                        {{ Auth::user()->status == 'Inactive' ? 'checked' : '' }} />Inactive &nbsp;
                                </div>
                            @endif
                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                                <label for="image" class="col-sm-4 mr-2">Image:</label>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new img-thumbnail" style="width: 120px; height: 120px;">
                                        <img src="{{ url(Auth::user()->image) }}" alt="image" />
                                    </div>
                                    <div class="fileinput-preview fileinput-exists img-thumbnail"
                                        style="max-width: 120px; max-height: 120px;">
                                    </div>
                                    <div>
                                        <span class="btn btn-sm btn-info btn-outline- btn-file">
                                            <span class="fileinput-new">Select New Image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="image" id="image" accept="image/*" />
                                        </span>
                                        <a href="#" class="btn btn-sm btn-danger btn-outline- fileinput-exists"
                                            data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">

                                <label for="password" class="col-sm-4 mr-2">Password:</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="password" autocomplete="off" value="">
                                <small class="text-right">
                                    <span class="min">Minimum 8 characters</span>, <span class="lowercase">
                                        lowercase</span>, <span class="uppercase">uppercase</span>, <span
                                        class="digit">digit</span>,
                                    <span class="special">special character</span>.
                                </small>
                                <small>Keep password blank if you don't want to update it.</small>
                            </div>
                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                                <label for="password_confirmation" class="col-sm-4 mr-2">Password Confirmation:</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="password_confirmation" autocomplete="off"
                                    value="">
                                <small id="password_confirmation_tooltip"></small>
                            </div>
                            <div class="clearfix"></div>

                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                                <label for="" class="col-sm-4 mr-2">&nbsp;</label>
                                <button class="btn btn-sm btn-primary w-25" type="submit"> Save </button>
                            </div>

                            <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Edit Data -->
    <script>
        var base_url = "{{ url('/') }}";

        // JavaScript program to count the uppercase,
        // lowercase, special characters
        // and numeric values
        // Function to count uppercase, lowercase,
        // special characters and digits
        function passValidationCount(str) {
            var uppercase = 0,
                lowercase = 0,
                digit = 0,
                special = 0,
                minimum = str.length;

            for (var i = 0; i < str.length; i++) {
                if (str[i] >= "A" && str[i] <= "Z") uppercase++;
                else if (str[i] >= "a" && str[i] <= "z") lowercase++;
                else if (str[i] >= "0" && str[i] <= "9") digit++;
                else special++;
            }
            let pass = (minimum && uppercase && lowercase && digit && special) ? true : false
            return {
                'minimum': minimum,
                'lowercase': lowercase,
                'uppercase': uppercase,
                'digit': digit,
                'special': special,
                'pass': pass,
            };
        }

        $(document).ready(function() {

            $('#password').val('');

            $('#password').on('blur keyup mousemove mouseleave', function(e) {
                let str = $(this).val();
                let validCheck = passValidationCount(str);

                let min = $('.min').text();
                min = min.replace(/✓/g, '');
                if (validCheck.minimum < 8) {
                    $('.min').text(min).css('color', 'red');
                } else {
                    $('.min').text(min).css('color', 'green');
                    $('.min').append('✓');
                }

                let lowercase = $('.lowercase').text();
                lowercase = lowercase.replace(/✓/g, '');
                if (!validCheck.lowercase) {
                    $('.lowercase').text(lowercase).css('color', 'red');
                } else {
                    $('.lowercase').text(lowercase).css('color', 'green');
                    $('.lowercase').append('✓');
                }

                let uppercase = $('.uppercase').text();
                uppercase = uppercase.replace(/✓/g, '');
                if (!validCheck.uppercase) {
                    $('.uppercase').text(uppercase).css('color', 'red');
                } else {
                    $('.uppercase').text(uppercase).css('color', 'green');
                    $('.uppercase').append('✓');
                }

                let digit = $('.digit').text();
                digit = digit.replace(/✓/g, '');
                if (!validCheck.digit) {
                    $('.digit').text(digit).css('color', 'red');
                } else {
                    $('.digit').text(digit).css('color', 'green');
                    $('.digit').append('✓');
                }

                let special = $('.special').text();
                special = special.replace(/✓/g, '');
                if (!validCheck.special) {
                    $('.special').text(special).css('color', 'red');
                } else {
                    $('.special').text(special).css('color', 'green');
                    $('.special').append('✓');
                }
            });

            $('#password_confirmation').on('blur keyup mousemove mouseleave', function(e) {
                let str = $(this).val();
                if (str == '') {
                    $('#password_confirmation_tooltip').html('');
                    return;
                }
                if ($('#password').val() != str) {
                    $('#password_confirmation_tooltip').html(
                        '<span class="text-danger">Password not match!</span>');
                } else {
                    $('#password_confirmation_tooltip').html(
                        '<span class="text-success">Password match!</span>');
                }
            });

            $('#edit_form').submit(function(e) {
                e.preventDefault();

                let validCheck = passValidationCount($('#password').val());
                if (!validCheck.pass) {
                    $.notify('Please check password format!', 'error');
                    return false;
                }

                var user_id = $("#user_id").val();
                var form_data = new FormData(this);

                let _url = `users/` + user_id;

                $.ajax({
                    data: form_data,
                    url: _url,
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {

                        $.notify(data.message, data.status);
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
    </script>
@endsection
