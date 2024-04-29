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
                    Add a New Product
                </h2>
                <form action="{{ url('store_product') }}" method="POST" enctype="multipart/form-data" id="addProductForm">
                    @csrf
                    <div class="form-group">
                        <label for="productName">
                            Product Name:
                        </label>
                        <input class="form-control" id="productName" placeholder="Enter product name" name="pro_name" required type="text" />
                    </div>
                    <div class="form-group">
                        <label for="productPrice">
                            Product Price:
                        </label>
                        <input class="form-control" id="productPrice" placeholder="Enter product price" name="pro_price" required type="number"/>
                    </div>
                    <div class="form-group">
                        <label for="productQuanity">
                            Product Quanity:
                        </label>
                        <input class="form-control" id="productQuanity" placeholder="Enter product quanity" name="pro_quanity" required type="number"/>
                    </div>
                    <div class="form-group">
                        <label for="productDes">
                            Product Decription:
                        </label>
                        <textarea class="form-control" id="productDes" placeholder="Enter product description" name="pro_des" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="productCategory">
                            Product Category:
                        </label>
                        <select name="category" required>
                            <option>Select a category</option>
                            @foreach ($data as $data)
                            <option value="{{$data->id}}">
                                {{$data->cat_title}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="productImg">
                            Product Image:
                        </label>
                        <input id="productImg" placeholder="Enter product quanity" name="pro_img" required type="file"/>
                    </div>
                    <button class="btn btn-primary w-100" type="submit">
                        Add Product
                    </button>
                </form>
            </div>
        </div>
    </section>
</div>

@include('admin.footer')