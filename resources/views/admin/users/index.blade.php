@extends('layouts.admin.master')
@section('title')
    User Management
@endsection
@section('content')
    <div class="row card card-outline card-dark">
        <div class="card-header">
            <h2 class="card-title">User List</h2>
            <div class="card-tools">
                <a class="btn btn-success" href="{{ route('admin.users.create') }}"> <i class="fa fa-plus"></i></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered " id="table">
                <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Created At</th>
                    <th width="280px">Action</th>
                </thead>
                <tbody id="tablecontents">
                    @foreach ($users as $key => $user)
                        <tr class="row1" data-id="{{ $user->id }}">
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->created_at->diffForHumans() }}</td>
                            <td>
                                <form action="{{ route('admin.users.destroy', $user->id) }}"
                                    method="POST">
                                    {{-- <a class="btn btn-sm btn-info"
                                        href="{{ route('admin.users.show', $user->id) }}">Show</a> --}}
                                    <a class="btn btn-sm btn-primary"
                                        href="{{ route('admin.users.edit', $user->id) }}"><i
                                            class="fa fa-pencil-alt"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger btn-delete"><i
                                            class="fa fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "aaSorting": []
            });
            //for delete btn
            $(document).on('click', '.btn-delete', function(e) {
                e.preventDefault();
                let form = $(this);
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you want to  delete user?",
                    icon: 'danger',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this)
                            .closest("form").submit();
                    }
                });
            });


        });

    </script>

@endsection
