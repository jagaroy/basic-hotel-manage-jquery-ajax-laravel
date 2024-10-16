@extends('adminlte.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 pt-2">
                <div class="card card-info">
                    <div class="card-header">Permission Setup <small class="text-default">(It will handle all actions
                            inside App\Http\Controllers\)</small></div>
                    <div class="card-body">
                        <form id="" method="GET" role="form" class="form-inline" enctype="multipart/form-data">
                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                                <label for="role_id" class="required col-sm-4 mr-2">Role:</label>
                                <select name="role_id" id="role_id" class="form-control chosen required">
                                    @foreach ($roles as $key => $value)
                                        <option {{ request()->role_id == $value->id ? 'selected' : '' }}
                                            value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="clearfix"></div>

                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                                {{-- <label for="" class="col-sm-4 mr-2">&nbsp;</label> --}}
                                <button class="btn btn-sm btn-success w-25" type="submit"> Search </button>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
                @if (request()->role_id)
                    <div class="card card-default">
                        <form id="" method="get" action="" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="permission" value="1" />
                            <input type="hidden" name="role_id" value="{{ request()->role_id }}" />
                            <button class="btn btn-sm btn-success" type="submit">
                                Save Permission
                            </button>
                            <div class="table-responsive">
                                <table class=" table table-bordered table-striped table-hover datatable datatable-Branch">
                                    <thead>
                                        <tr>
                                            <th width="2%">
                                                SL
                                            </th>
                                            <th width="14%">
                                                Module
                                            </th>
                                            <th width="85%">
                                                Permissions
                                            </th>
                                            <th width="5%">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($module_permissions))
                                            @php
                                                $ii = 0;
                                            @endphp
                                            @foreach ($module_permissions as $key => $module)
                                                <tr data-entry-id="">
                                                    <td>
                                                        {{ $loop->index + 1 }}
                                                    </td>
                                                    <td>
                                                        <strong>{{ $module['name_title'] }}</strong>
                                                        <input class="module" type="checkbox"
                                                            name="module[{{ $module['name'] }}]"
                                                            {{ moduleExist($role_permissions, $module['name']) ? 'checked' : '' }} />
                                                    </td>
                                                    <td>
                                                        @foreach ($module['data'] as $key_info => $key_value)
                                                            <input class="module_sub_class" type="checkbox"
                                                                name="module_sub[{{ $module['name'] }}][{{ $key_value }}]"
                                                                {{ actionExist($role_permissions, $module['name'], $key_value) ? 'checked' : '' }} />

                                                            <label
                                                                for="module_sub[{{ $module['name'] }}][{{ $key_value }}]">
                                                                {{ $key_value }} &nbsp; &nbsp; &nbsp;
                                                            </label>
                                                        @endforeach
                                                    </td>
                                                    <td>

                                                    </td>

                                                </tr>
                                                @php
                                                    $ii++;
                                                @endphp
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-sm btn-success" type="submit">
                                    Save Permission
                                </button>
                            </div>
                        </form>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function() {

            $('.module').click(function(event) {
                var that = this;
                $(this).closest('tr').find('input').each(function(index, el) {
                    if ($(that).is(':checked')) {
                        $(el).prop('checked', true);
                    } else {
                        $(el).prop('checked', false);
                    }
                });
            });
            $('.module_sub_class').on('click', function() {
                let tr = $(this).closest('tr');
                var count = 0;
                tr.find('.module_sub_class').each(function(index, el) {
                    if ($(this).is(':checked')) {
                        count += 1;
                    }
                });
                if (count > 0) {
                    tr.find('.module').prop('checked', true);
                } else {
                    tr.find('.module').prop('checked', false);
                }
            });
        });
    </script>

@endsection
