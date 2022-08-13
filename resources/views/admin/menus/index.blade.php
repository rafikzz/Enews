@extends('layouts.admin.master')
@section('title')
    Menu Management
@endsection
@section('content')
    <div class="row card card-outline card-dark">
        <div class="card-header">
            <h2 class="card-title">Menu List</h2>
            <div class="card-tools">
                <a class="btn btn-success" href="{{ route('admin.menus.create') }}"> <i class="fa fa-plus"></i></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered " id="table">
                <thead>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Order</th>
                    <th>Parent</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th width="280px">Action</th>
                </thead>
                <tbody id="tablecontents">
                    @foreach ($menus as $key => $menu)
                        <tr class="row1" data-id="{{ $menu->id }}">
                            <td>{{ $menu->id }}</td>
                            <td>{{ $menu->title }}</td>
                            <td>{{ $menu->order }}</td>
                            <td>{{ isset($menu->parent)?$menu->parent->title :'No Parent' }}</td>

                            <td>
                                <button
                                    class="changeStatus btn btn-sm {{ $menu->status ? 'btn-success' : 'btn-danger' }}"
                                    data-value="{{ $menu->status }}"
                                    data-id="{{ $menu->id }}">{{ $menu->status ? 'Active' : 'Inactive' }}</button>
                            </td>
                            <td>{{ $menu->created_at->diffForHumans() }}</td>
                            <td>
                                <form action="{{ route('admin.menus.destroy', $menu->id) }}"
                                    method="POST">
                                    {{-- <a class="btn btn-sm btn-info"
                                        href="{{ route('admin.menus.show', $menu->id) }}">Show</a> --}}
                                    <a class="btn btn-sm btn-primary"
                                        href="{{ route('admin.menus.edit', $menu->id) }}"><i
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
                    text: "Do you want to  delete menu?",
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

            //for sortable table
            $("#tablecontents").sortable({
                items: "tr",
                cursor: 'move',
                opacity: 0.6,
                update: function() {
                    sendOrderToServer();
                }
            });


            //To change order while changing table
            function sendOrderToServer() {
                var order = [];
                $('tr.row1').each(function(index, element) {
                    order.push({
                        id: $(this).attr('data-id'),
                        position: index + 1
                    });
                });
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ route('admin.menu.updateOrder') }}",
                    data: {
                        order: order,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            console.log(response);
                        } else {
                            console.log(response);
                        }
                    }
                });
            }
        });
        //for changing status
        $(document).on('click', '.changeStatus', function() {
            let btn = $(this);
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to change menu status?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    let menu_id = btn.data('id');
                    let status = ($(this).data('value') == 0) ? 1 : 0;
                    let clickedBtn = btn;
                    $.ajax({
                        type: "GET",
                        url: '{{ route('menus.changeStatus') }}',
                        data: {
                            'status': status,
                            'menu_id': menu_id
                        },
                        success: function(res) {
                            if (res.success) {
                                btn.text(res.status).trigger('change');
                                (status == 0) ?
                                (btn.removeClass('btn-success').addClass('btn-danger')
                                    .text(res.status).data('value', status)) :
                                (btn.removeClass('btn-danger').addClass('btn-success')
                                    .text(res.status).data('value', status));
                            } else {
                                Swal.fire('Something went wrong!');
                            }
                        },
                        error: function() {
                            alert('Internal Server Error !');
                        }
                    });
                }
            });
        });
    </script>
@endsection
