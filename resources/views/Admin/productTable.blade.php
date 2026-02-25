@extends('layout.master')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.css" />

<script src="https://cdn.datatables.net/2.3.7/js/dataTables.js"></script>
@section('content')
    <div class="container mt-3 mb-5">
        <a class="btn btn-primary m-4 text-light w-50" href="/addProduct"> + add product</a>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>#id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($products as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td><img src="{{ asset($item->imagepath)}}" alt="" width="50px" height="50px"></td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->quantity}}</td>
                       
                        <td class="text-center">
                            <div class="btn-group">
                                <a  href="/editproduct/{{ $item->id }}" class="btn btn-sm btn-outline-primary"
                                    title="Mark as Read">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a href="/deleteproduct/{{ $item->id }}" class="btn btn-sm btn-outline-danger"
                                    title="Delete" onclick="return confirm('Delete this review?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="/addImages/{{ $item->id }}" class="btn btn-sm btn-outline-dark" title="Add Images"><i
                                        class="fas fa-image"></i>

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