@extends('layout.master')
@section('content')
    <div class="contact-from-section mt-80 mb-80">
        <div class="col-lg-8 offset-lg-2 text-center">
            <div class="section-title">
                <h3><span class="orange-text">Add</span> Image</h3>

            </div>
        </div>
        <div class="container  mb-5">
            <form action="/addmultiimage" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="product_id" value="{{ $productId }}">
                <div class="custom-file mb-3">
                    <input type="file" name="photo" class="custom-file-input" id="validatedCustomFile" required>
                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                </div>
                <button class="btn btn-dark ml-2">Save</button>
            </form>



            <div class="row">
                <div class="col-9">

                    @foreach ($imageProduct as $item)

                        <img class="m-2" src="{{asset($item->imagepath) }}" width="200px" height="200px">
                        <a href="/deleteimage/{{$item->id}}" class="btn btn-danger"><i class="fas fa-trash"></i>
                            Delete Product</a>

                    @endforeach
                     @if(session('added'))
                        <div id="success-alert-added" class="alert alert-success m-5">
                            {{ session('added') }}
                        </div>
                    @endif
                    @if(session('delete'))
                        <div id="success-alert-delete" class="alert alert-danger m-5">
                            {{ session('delete') }}
                        </div>
                    @endif
                </div>
            </div>




        </div>
<script>
    setTimeout(function () {
        let alert = document.getElementById('success-alert-delete');
        if(alert){
            let bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }
    }, 10000);

     setTimeout(function () {
        let alert = document.getElementById('success-alert-added');
        if(alert){
            let bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }
    }, 10000);
</script>
@endsection