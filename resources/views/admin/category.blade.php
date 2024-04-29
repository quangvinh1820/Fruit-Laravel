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
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center">
                    Add a New Category
                </h2>
                <form action="{{ url('add_category') }}" method="POST" id="addProductForm">
                    @csrf
                    <div class="form-group">
                        <label for="productName">
                            Category Name:
                        </label>
                        <input class="form-control" id="productName" placeholder="Enter category name" name="category" required type="text" />
                    </div>
                    <button class="btn btn-primary w-100" type="submit">
                        Add Category
                    </button>
                </form>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <h2 class="text-center">List of Categories</h2>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Category</th>
                        <th scope="col">Count of Product</th>
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
                        <td>
                            <span id="category_{{ $item->id }}">{{ $item->cat_title }}</span>
                            <form id="updateForm_{{ $item->id }}" style="display: none;" action="{{ url('cat_update', $item->id) }}" method="POST">
                                @csrf
                                <input type="text" id="updateInput_{{ $item->id }}" name="cat_name" class="form-control">
                                <button type="submit" style="display: none;">Submit</button>
                            </form>
                        </td>
                        <td>{{ $item->product_count }}</td>
                        <td>
                            <a onclick="showUpdate(event, '{{ $item->id }}')" class="btn btn-primary">Update</a>
                            <a onclick="confirmation(event)" class="btn btn-danger" href="{{ url('cat_delete', $item->id) }}">Delete</a>
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

<!-- Update Input -->
<script type="text/javascript">
    function showUpdate(event, categoryId) {
        event.preventDefault();
        // Ẩn tên category và hiển thị input và nút submit
        $("#category_" + categoryId).hide();
        $("#updateForm_" + categoryId).show();
        $("#updateInput_" + categoryId).val($("#category_" + categoryId).text());
        $("#updateInput_" + categoryId).focus();
        $(event.target).replaceWith('<button onclick="submitUpdate(event, \'' + categoryId + '\')" class="btn btn-success">Submit</button>');
    }

    function submitUpdate(event, categoryId) {
        event.preventDefault();
        $("#updateForm_" + categoryId).submit();
    }
</script>

@include('admin.footer')