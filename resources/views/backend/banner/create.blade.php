<div class="wrapper">
    <div class="title-create pr-4 pl-4 pb-4">
        <h4 class="font-weight-bold text-uppercase">Thêm mới banner</h4>
        <p>Bạn hãy chắc chắn thông tin mà bạn đang nhập đúng với những gì đang có!</p>
    </div>
    <form action="{{ route('banner.store') }}" method="POST" class="p-2" enctype="multipart/form-data">
        @csrf
        <div class="row p-3">
            <div class="form-group col-md-12">
                <label class="font-weight-bold">Tiêu đề:</label>
                <input type="text" name="title" class="form-control rounded-0 pt-1 pb-1" value="{{ old('title') }}">
                @if ($errors->has('title'))
                    <span class="text-danger fz-14">{{ $errors->first('title') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group col-12">
            <label class="font-weight-bold">Mô tả:</label>
            <textarea type="text" name="description" class="form-control rounded-0 pt-1 ps-2 pe-2 pb-1" rows="10"
                placeholder="Nhập mô tả">{{ old('description') }}</textarea>
        </div>
        <div class="row p-3">
            <div class="form-group col-md-4">
                <label class="font-weight-bold">Loại banner:</label>
                <select name="type" class="form-control rounded-0 setupSelect2">
                    <option value="">Chọn loại banner</option>
                    <option value="main">Chính</option>
                    <option value="sub">Phụ</option>
                    <option value="event">Sự Kiện</option>
                    <option value="orther">Khác</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label class="font-weight-bold">Nổi bật:</label>
                <select class="form-control rounded-0 setupSelect2" name="hot">
                    <option value="">Chọn Nổi bật</option>
                    <option value="1" {{ old('hot') == 1 ? 'selected' : '' }}>Có</option>
                    <option value="0" {{ old('hot') == 0 ? 'selected' : '' }}>Không</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label class="font-weight-bold">Trạng thái:</label>
                <select class="form-control rounded-0 setupSelect2" name="publish">
                    <option value="">Chọn trạng thái</option>
                    <option value="1" {{ old('publish') == 1 ? 'selected' : '' }}>Hiển thị</option>
                    <option value="0" {{ old('publish') == 0 ? 'selected' : '' }}>Ẩn</option>
                </select>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label class="font-weight-bold">Albums:</label> <br>
            <input type="file" name="albums[]" class="form-control-file rounded-0" value="{{ old('albums') }}" multiple>
        </div>
        @if ($errors->has('albums'))
                    <span class="text-danger fz-14">{{ $errors->first('albums') }}</span>
                @endif
        <div class="form-group col-12 text-right ps-2 pe-2">
            <button type="submit" class="btn btn-primary rounded-0 pl-4 pr-4">Xác Nhận</button>
        </div>
    </form>
    
</div>
