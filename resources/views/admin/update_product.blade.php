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
                        Update Product
                    </h2>
                    <form action="{{ url('update_product', $data->id) }}" method="POST" enctype="multipart/form-data" id="addProductForm">
                        @csrf
                        <div class="form-group">
                            <label for="productName">
                                Product Name:
                            </label>
                            <input class="form-control" id="productName" value="{{$data->name}}" name="pro_name" required type="text" />
                        </div>
                        <div class="form-group">
                            <label for="productPrice">
                                Product Price:
                            </label>
                            <input class="form-control" id="productPrice" value="{{$data->price}}" name="pro_price" required type="number"/>
                        </div>
                        <div class="form-group">
                            <label for="productQuanity">
                                Product Quanity:
                            </label>
                            <input class="form-control" id="productQuanity" value="{{$data->quanity}}" name="pro_quanity" required type="number"/>
                        </div>
                        <div class="form-group">
                            <label for="productDes">
                                Product Decription:
                            </label>
                            <textarea class="form-control" id="productDes" name="pro_des" required>{{$data->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="productCategory">
                                Product Category:
                            </label>
                            <select name="category" required>
                                <option value="{{$data->category_id}}">{{$data->category->cat_title}}</option>
                                @foreach ($category as $category)
                                <option value="{{$category->id}}">
                                    {{$category->cat_title}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="productImg">
                                Product Image:
                            </label>
                            <img src="/product/{{$data->image}}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                        </div>
                        <div class="form-group">
                            <label for="productImg">
                                Change Product Image:
                            </label>
                            <input id="productImg" placeholder="Enter product quanity" name="pro_img" type="file"/>
                        </div>
                        <button class="btn btn-primary w-100" type="submit">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </div>

@include('admin.footer')