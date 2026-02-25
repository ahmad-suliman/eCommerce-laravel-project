@extends('layout.master')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.css" />

<script src="https://cdn.datatables.net/2.3.7/js/dataTables.js"></script>
@section('content')
    <div class="container mt-5 mb-5">

        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>#id</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Review</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($contacts as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->subject }}</td>
                        <td>{{ $item->message}}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="/admin/markmessage/{{ $item->id }}" class="btn btn-sm btn-outline-success {{ $item->is_read  ? 'disabled' : '' }}"
                                    title="Mark as Read" >
                                    <i class="fas fa-check"></i>
                                </a>

                                <a href="/admin/deletemessage/{{ $item->id }}" class="btn btn-sm btn-outline-danger"
                                    title="Delete" onclick="return confirm('Delete this message?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>

@endsection
<script>
    $(document).ready(function () {
        let table = new DataTable('#myTable');
    });
</script>