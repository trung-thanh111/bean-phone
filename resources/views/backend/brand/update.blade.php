<div class="wrapper">
    <div class="title-create pr-4 pl-4 pb-4">
        <h4 class="font-weight-bold text-uppercase">Cập nhật Nhóm sản phẩm</h4>
        <p>Bạn hãy chắc chắn thông tin mà bạn đang nhập đúng với những gì đang có!</p>
    </div>
    <form action="{{ route('brand.edit', ['id' => $brand->id]) }}" method="POST" class="p-2" enctype="multipart/form-data">
        @csrf
        <div class="row p-3">
            <div class="form-group col-md-12">
                <label class="font-weight-bold">Tên Nhóm:</label>
                <input type="text" name="name" class="form-control rounded-0 pt-1 pb-1"
                    value="{{ old('name', $brand->name) }}">
                @if ($errors->has('name'))
                    <span class="text-danger fz-14">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group col-12">
            <label class="font-weight-bold">Mô tả:</label>
            <textarea type="text" name="description" class="form-control rounded-0 pt-1 ps-2 pe-2 pb-1" rows="10"
                placeholder="Nhập mô tả">{{ old('description', $brand->description) }}</textarea>
        </div>
        <div class="row p-3">
            <div class="form-group col-md-6">
                <label for="inputState" class="font-weight-bold">Danh mục sản phẩm:</label>
                <select class="form-control rounded-0 setupSelect2" name="product_catalogue_id">
                    <option value="0">Chọn danh mục sản phẩm</option>
                    @foreach ($productCatalogue as $key => $item)
                        <option value="{{ $item->id }}" {{ old('product_catalogue_id', $brand->product_catalogue_id) == $item->id ? 'selected' : '' }}>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="inputState" class="font-weight-bold">Trạng thái:</label>
                <select class="form-control rounded-0 setupSelect2" name="publish">
                    <option value="">Chọn trạng thái</option>
                    <option value="1" {{ old('publish', $brand->publish) == 1 ? 'selected' : '' }}>Hiển thị</option>
                    <option value="0" {{ old('publish', $brand->publish) == 0 ? 'selected' : '' }}>Ẩn</option>
                </select>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="inputState" class="font-weight-bold">Hình ảnh:</label> <br>
            <input type="file" name="image" value="{{ old('image', $brand->image) }}">
        </div>
        <img src="/upload/product/{{ $brand->image }}" alt="" class="object-fit-cover ml-3" width="120" height="120">
        <div class="form-group col-12 text-right ps-2 pe-2">
            <button type="submit" class="btn btn-primary rounded-0 pl-4 pr-4">Xác Nhận</button>
        </div>
    </form>
</div>
