@extends('layouts.admin.master')
@section('title')
    Page Management
@endsection
@section('content')
    <div class="row card card-outline card-dark">
        <div class="card-header">
            <h2 class="card-title">Page List</h2>
            <div class="card-tools">
                <a class="btn btn-success" href="{{ route('admin.pages.create') }}"> <i class="fa fa-plus"></i></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered " id="table">
                <thead>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Order</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th width="280px">Action</th>
                </thead>
                <tbody id="tablecontents">
                    @foreach ($pages as $key => $page)
                        <tr class="row1" data-id="{{ $page->id }}">
                            <td>{{ $page->id }}</td>
                            <td>{{ $page->title }}</td>
                            <td>{{ $page->order }}</td>
                            <td>{{ $page->category->title }}</td>
                            <td><img src="{{ $page->image() }}" width="100" height="100"> </td>
                            <td>
                                <button
                                    class="changeStatus btn btn-sm {{ $page->status ? 'btn-success' : 'btn-danger' }}"
                                    data-value="{{ $page->status }}"
                                    data-id="{{ $page->id }}">{{ $page->status ? 'Active' : 'Inactive' }}</button>
                            </td>
                            <td>{{ $page->created_at->diffForHumans() }}</td>
                            <td>
                                <form action="{{ route('admin.pages.destroy',$page->slug) }}"
                                    method="POST">
                                    {{-- <a class="btn btn-sm btn-info"
                                        href="{{ route('admin.pages.show', $page->slug) }}">Show</a> --}}
                                    <a class="btn btn-sm btn-primary"
                                        href="{{ route('admin.pages.edit', $page->slug) }}"><i
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
                    text: "Do you want to  delete page?",
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
                    url: "{{ route('admin.page.updateOrder') }}",
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
                text: "Do you want to change page status?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    let page_id = btn.data('id');
                    let status = ($(this).data('value') == 0) ? 1 : 0;
                    let clickedBtn = btn;
                    $.ajax({
                        type: "GET",
                        url: '{{ route('pages.changeStatus') }}',
                        data: {
                            'status': status,
                            'page_id': page_id
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
