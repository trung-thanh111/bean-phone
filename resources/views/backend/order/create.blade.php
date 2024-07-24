<div class="wrapper">
    <div class="title-create pr-4 pl-4 pb-4">
        <h4 class="font-weight-bold text-uppercase">Thêm mới sản phẩm</h4>
        <p>Bạn hãy chắc chắn thông tin mà bạn đang nhập đúng với những gì đang có!</p>
    </div>
    <form action="{{ route('product.store') }}" method="POST" class="p-2" enctype="multipart/form-data">
        @csrf
        <div class="row p-3">
            <div class="form-group col-md-12">
                <label class="font-weight-bold">Tiêu đề:</label>
                <input type="text" name="title" class="form-control rounded-0 pt-1 pb-1"
                    value="{{ old('title') }}">
                @if ($errors->has('title'))
                    <span class="text-danger fz-14">{{ $errors->first('title') }}</span>
                @endif
            </div>
        </div>
        <div class="row p-3">
            <div class="form-group col-md-4">
                <label for="inputCity" class="font-weight-bold">Đơn giá:</label>
                <input type="text" name="price" class="form-control rounded-0 pt-1 pb-1" id="inputCity"
                    value="{{ old('price') }}">
                @if ($errors->has('price'))
                    <span class="text-danger fz-14">{{ $errors->first('price') }}</span>
                @endif
            </div>
            <div class="form-group col-md-4">
                <label for="inputCity" class="font-weight-bold">Del:</label>
                <input type="text" name="del" class="form-control rounded-0 pt-1 pb-1" id="inputCity"
                    value="{{ old('del') }}">
                @if ($errors->has('del'))
                    <span class="text-danger fz-14">{{ $errors->first('del') }}</span>
                @endif
            </div>
            <div class="form-group col-md-4">
                <label for="inputZip" class="font-weight-bold">Kho:</label>
                <input type="text" name="sold" class="form-control rounded-0 pt-1 pb-1" id="inputZip"
                    value="{{ old('sold') }}">
                @if ($errors->has('sold'))
                    <span class="text-danger fz-14">{{ $errors->first('sold') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group col-12">
            <label class="font-weight-bold">Mô tả ngắn:</label>
            <textarea type="text" name="short_desc" class=" ckeditor form-control rounded-0 pt-1 ps-2 pe-2 pb-1" rows="3"
                placeholder="Nhập mô tả">{{ old('short_desc') }}</textarea>
            @if ($errors->has('short_desc'))
                <span class="text-danger fz-14">{{ $errors->first('short_desc') }}</span>
            @endif
        </div>
        <div class="form-group col-12">
            <label class="font-weight-bold">Mô tả chi tiết:</label>
            <textarea type="text" name="description" class="ckeditor form-control rounded-0 pt-1 ps-2 pe-2 pb-1" rows="10"
                placeholder="Nhập mô tả">{{ old('description') }}</textarea>
            @if ($errors->has('description'))
                <span class="text-danger fz-14">{{ $errors->first('description') }}</span>
            @endif
        </div>
        <div class="row p-3">
            <div class="form-group col-md-6">
                <label class="font-weight-bold">Gift:</label>
                <input type="text" name="gift" class="form-control rounded-0 pt-1 pb-1"
                    value="{{ old('gift') }}">
                @if ($errors->has('gift'))
                    <span class="text-danger fz-14">{{ $errors->first('gift') }}</span>
                @endif
            </div>
            <div class="form-group col-md-3">
                <label for="inputState" class="font-weight-bold">Hot:</label>
                <select class="form-control rounded-0 setupSelect2" name="hot">
                    <option value="">Chọn nổi bọt</option>
                    <option value="1" {{ old('hot') == 1 ? 'selected' : '' }}>Có</option>
                    <option value="0" {{ old('hot') == 0 ? 'selected' : '' }}>Không</option>
                </select>
                @if ($errors->has('hot'))
                    <span class="text-danger fz-14">{{ $errors->first('hot') }}</span>
                @endif
            </div>
            <div class="form-group col-md-3">
                <label class="font-weight-bold">Màu sắc:</label>
                <input type="text" name="color" class="form-control rounded-0 pt-1 pb-1"
                    value="{{ old('color') }}">
                @if ($errors->has('color'))
                    <span class="text-danger fz-14">{{ $errors->first('color') }}</span>
                @endif
            </div>
        </div>
        <div class="row p-3">
            <div class="form-group col-md-3">
                <label for="inputState" class="font-weight-bold">Thuộc tính:</label>
                <select class="form-control rounded-0 setupSelect2" name="accessory">
                    <option value="" selected>Chọn thuộc tính</option>
                    <option value="0" {{ old('accessory') == 0 ? 'selected' : '' }}>Sản phẩm đặc trưng</option>
                    <option value="1" {{ old('accessory') == 1 ? 'selected' : '' }}>Phụ kiện</option>
                </select>
                @if ($errors->has('accessory'))
                    <span class="text-danger fz-14">{{ $errors->first('accessory') }}</span>
                @endif
            </div>
            <div class="form-group col-md-3">
                <label for="inputState" class="font-weight-bold">Danh mục:</label>
                <select class="form-control rounded-0 setupSelect2" name="product_catalogue_id">
                    <option value="0">Chọn Danh Mục</option>
                    @foreach($categories as $key => $item)
                    <option value="{{ $item->id }}" {{ old('product_catalogue_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('product_catalogue_id'))
                    <span class="text-danger fz-14">{{ $errors->first('product_catalogue_id') }}</span>
                @endif
            </div>
            <div class="form-group col-md-3">
                <label for="inputState" class="font-weight-bold">Brand:</label>
                <select class="form-control rounded-0 setupSelect2" name="brand_id">
                    <option value="0">Chọn Brand</option>
                    @foreach($brands as $key => $item)
                    <option value="{{ $item->id }}" {{ old('brand_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('brand_id'))
                    <span class="text-danger fz-14">{{ $errors->first('brand_id') }}</span>
                @endif
            </div>
            <div class="form-group col-md-3">
                <label for="inputState" class="font-weight-bold">Trạng thái:</label>
                <select class="form-control rounded-0 setupSelect2" name="publish">
                    <option value="" >Chọn trạng thái</option>
                    <option value="1" {{ old('publish') == 1 ? 'selected' : '' }}>Hiển thị</option>
                    <option value="0" {{ old('publish') == 0 ? 'selected' : '' }}>Ẩn</option>
                </select>
                @if ($errors->has('publish'))
                    <span class="text-danger fz-14">{{ $errors->first('publish') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="inputState" class="font-weight-bold">Hình ảnh:</label> <br>
            <input type="file" name="image" value="{{ old('image') }}">
            @if ($errors->has('image'))
                <span class="text-danger fz-14">{{ $errors->first('image') }}</span>
            @endif
        </div>
        <div class="form-group col-12 text-right ps-2 pe-2">
            <button type="submit" class="btn btn-primary rounded-0 pl-4 pr-4">Xác Nhận</button>
        </div>
    </form>
</div>
