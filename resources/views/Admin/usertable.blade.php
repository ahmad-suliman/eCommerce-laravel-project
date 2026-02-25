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
                    <th>Email</th>
                    <th>Role</th>
                    <th>Avatar</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->role?'Admin':'User' }}</td>
                        <td>{{ $item->message}}</td>
                        <td class="text-center">
                            <div class="btn-group">

                                <a href="/admin/deleteuser/{{ $item->id }}" class="btn btn-sm btn-outline-danger {{ $item->id == auth()->id() ? 'disabled' :'' }}"
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