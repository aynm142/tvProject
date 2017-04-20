@extends('app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
                <i class="fa fa-users"></i> Users
                <a href="{{ url('dashboard/user/create') }}" class="btn btn-success btn-sm m-l-20"><i class="fa fa-plus"></i> Add new user</a>
            </h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    @include('layouts.errors')

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tbody>
                        <tr class="table-header">
                            <th>Email</th>
                            <th>Username</th>
                            <th>User Type</th>
                            <th>Active</th>
                            <th>Actions</th>
                        </tr>

                        @foreach($users as $user)
                            <tr>
                                <td>
                                    <a href="{{ url('dashboard/user/' . $user->id . '/edit') }}">{{ $user->email }}</a>
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    @if ( $user->is_admin )
                                        <div class="label label-primary"><i class="fa fa-star"></i> Admin User</div>
                                    @else
                                        <div class="label label-success"><i class="fa fa-user"></i> Subscribed User</div>
                                    @endif
                                </td>
                                <td>1</td>
                                <td>
                                    <a href="{{ url('dashboard/user/' . $user->id . '/edit') }}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>

                                    {!! Form::Open(['method' => 'DELETE', 'url' => 'dashboard/user/' . $user->id, 'class' => 'display-in-b delete-user']) !!}
                                        <button type="submit" class="btn btn-xs btn-danger delete"><i class="fa fa-trash"></i> Delete</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        ;(function($) {
            $(document).on('submit', 'td .delete-user', function(e) {
                e.preventDefault();

                var $form = $(e.target);

                bootbox.confirm("Are you sure want to delete this user?", function(result) {
                    if (result) {
                        $.ajax({
                            url: $form.attr('action'),
                            method: $form.attr('method'),
                            dataType: 'json',
                            data: $form.serializeArray()
                        }).then(function(data) {
                            if (data && data.error) {
                                bootbox.alert(data.error);
                                return;
                            }

                            $form.parents('tr').remove();
                        }).catch(function() {
                            bootbox.confirm("Some error occurred.. Reload page?", function() {
                                window.location.reload();
                            });
                        });
                        
                    }
                }); 
            });
        })(jQuery);
    </script>
@endpush