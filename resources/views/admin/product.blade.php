@include('admin.header')
<div class="container-fluid">
    @if(session()->has('message'))
        <div class="alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                x
            </button>
            {{session()->get('message')}}
        </div>
    @endif
    <section class="container mt-5 mb-5" id="product-form">
        <div class="row justify-content-center mt-5">
            <h2 class="text-center">List of Products</h2>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Description</th>
                        <th scope="col">Quanity</th>
                        <th scope="col">Category</th>
                        <th scope="col">Image</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $count = 1;
                    @endphp
                    @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{ $count }}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->quanity}}</td>
                        <td>{{$item->category->cat_title}}</td>
                        <th scope="row">
                            <div class="d-flex align-items-center">
                                <img src="product/{{$item->image}}" class="img-fluid me-5" style="width: 30px; height: 30px;" alt="">
                            </div>
                        </th>
                        <td>
                            <a class="btn btn-primary" href="{{ url('product_update', $item->id) }}">Update</a>
                            <a onclick="confirmation(event)" class="btn btn-danger" href="{{ url('product_delete', $item->id) }}">Delete</a>
                        </td>
                    </tr>
                    @php
                    $count++;
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>

<!-- Confirm Delete -->
<script type="text/javascript">
    function confirmation(e) {
        e.preventDefault();
        var urlToRedirect = e.currentTarget.getAttribute('href');
        console.log(urlToRedirect);

        swal({
                title: "Are you sure to DELETE this?",
                text: "You will not be able to revert this!",
                icon: "warning",
                buttons: true,
                dangerMode: true
            })
            .then((willCancel) => {
                if (willCancel) {
                    window.location.href = urlToRedirect;
                }
            })
    }
</script>

@include('admin.footer')