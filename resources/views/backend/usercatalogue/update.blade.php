<div class="wrapper">
    <div class="title-create pr-4 pl-4 pb-4">
        <h4 class="font-weight-bold text-uppercase">Cập nhật Nhóm sản phẩm</h4>
        <p>Bạn hãy chắc chắn thông tin mà bạn đang nhập đúng với những gì đang có!</p>
    </div>
    <form action="{{ route('user.catalogue.edit', ['id' => $userCatalogue->id]) }}" method="POST" class="p-2" enctype="multipart/form-data">
        @csrf
        <div class="row p-3">
            <div class="form-group col-md-12">
                <label class="font-weight-bold">Tên Nhóm:</label>
                <input type="text" name="name" class="form-control rounded-0 pt-1 pb-1"
                    value="{{ old('name', $userCatalogue->name) }}">
                @if ($errors->has('name'))
                    <span class="text-danger fz-14">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group col-12">
            <label class="font-weight-bold">Mô tả:</label>
            <textarea type="text" name="description" class="form-control rounded-0 pt-1 ps-2 pe-2 pb-1" rows="10"
                placeholder="Nhập mô tả">{{ old('description', $userCatalogue->description) }}</textarea>
        </div>
        <div class="row pr-3 pl-3">
            <div class="form-group col-md-6">
                <label for="inputState" class="font-weight-bold">Hình ảnh:</label> <br>
                <input type="file" name="image" value="{{ old('image', $userCatalogue->image) }}">
            </div>
            <div class="form-group col-md-6">
                <label for="inputState" class="font-weight-bold">Trạng thái:</label>
                <select class="form-control rounded-0 setupSelect2" name="publish">
                    <option value="">Chọn trạng thái</option>
                    <option value="1" {{ old('publish', $userCatalogue->publish) == 1 ? 'selected' : '' }}>Hiển thị</option>
                    <option value="0" {{ old('publish', $userCatalogue->publish) == 0 ? 'selected' : '' }}>Ẩn</option>
                </select>
            </div>
        </div>
        
        <img src="/upload/user/{{ $userCatalogue->image }}" alt="" class="object-fit-cover ml-3" width="120" height="120">
        <div class="form-group col-12 text-right ps-2 pe-2">
            <button type="submit" class="btn btn-primary rounded-0 pl-4 pr-4">Xác Nhận</button>
        </div>
    </form>
</div>
