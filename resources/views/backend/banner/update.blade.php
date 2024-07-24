<div class="wrapper">
    <div class="title-create pr-4 pl-4 pb-4">
        <h4 class="font-weight-bold text-uppercase">Cập Nhật banner</h4>
        <p>Bạn hãy chắc chắn thông tin mà bạn đang nhập đúng với những gì đang có!</p>
    </div>
    <form action="{{ route('banner.edit', ['id' => $banner->id]) }}" method="POST" class="p-2" enctype="multipart/form-data">
        @csrf
        <div class="row p-3">
            <div class="form-group col-md-12">
                <label class="font-weight-bold">Tiêu đề:</label>
                <input type="text" name="title" class="form-control rounded-0 pt-1 pb-1" value="{{ old('title', $banner->title) }}">
                @if ($errors->has('title'))
                    <span class="text-danger fz-14">{{ $errors->first('title') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group col-12">
            <label class="font-weight-bold">Mô tả:</label>
            <textarea name="description" class="form-control rounded-0 pt-1 ps-2 pe-2 pb-1" rows="10" placeholder="Nhập mô tả">{{ old('description', $banner->description) }}</textarea>
        </div>
        <div class="row p-3">
            <div class="form-group col-md-4">
                <label class="font-weight-bold">Loại banner:</label>
                <select name="type" class="form-control rounded-0 setupSelect2">
                    <option value="">Chọn loại banner</option>
                    <option value="main" {{ $banner->type == 'main' ? 'selected' : '' }}>Chính</option>
                    <option value="sub" {{ $banner->type == 'sub' ? 'selected' : '' }}>Phụ</option>
                    <option value="product" {{ $banner->type == 'product' ? 'selected' : '' }}>Sản phẩm</option>
                    <option value="brand" {{ $banner->type == 'brand' ? 'selected' : '' }}>Thương hiệu</option>
                    <option value="event" {{ $banner->type == 'event' ? 'selected' : '' }}>Sự kiện</option>
                    <option value="orther" {{ $banner->type == 'orther' ? 'selected' : '' }}>Khác</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label class="font-weight-bold">Nổi bật:</label>
                <select class="form-control rounded-0 setupSelect2" name="hot">
                    <option value="">Chọn Nổi bật</option>
                    <option value="1" {{ old('hot', $banner->hot) == 1 ? 'selected' : '' }}>Có</option>
                    <option value="0" {{ old('hot', $banner->hot) == 0 ? 'selected' : '' }}>Không</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label class="font-weight-bold">Trạng thái:</label>
                <select class="form-control rounded-0 setupSelect2" name="publish">
                    <option value="">Chọn trạng thái</option>
                    <option value="1" {{ old('publish', $banner->publish) == 1 ? 'selected' : '' }}>Hiển thị</option>
                    <option value="0" {{ old('publish', $banner->publish) == 0 ? 'selected' : '' }}>Ẩn</option>
                </select>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label class="font-weight-bold">Albums:</label> <br>
            @php
                $albums = json_decode($banner->albums, true);
            @endphp
            <div class="d-flex mb-2">
                @if(is_array($albums))
                    @foreach ($albums as $album)
                        <div class="p-3">
                            <img src="{{ asset('upload/banner/' . $album) }}" alt="Album Image" class="img-fluid" width="200">
                        </div>
                    @endforeach
                @endif
            </div>
            <input type="file" name="albums[]" class="form-control-file rounded-0" multiple>
            <input type="hidden" name="albums[]" value="{{ $banner->albums }}">
        </div>
        @if ($errors->has('albums'))
            <span class="text-danger fz-14">{{ $errors->first('albums') }}</span>
        @endif
    
        <div class="form-group col-12 text-right ps-2 pe-2">
            <button type="submit" class="btn btn-primary rounded-0 pl-4 pr-4">Xác Nhận</button>
        </div>
    </form>
    

</div>
