<div class="wrapper">
    <div class="title-create pr-4 pl-4 pb-4">
        <h4 class="font-weight-bold text-uppercase">cập nhật bài viết</h4>
        <p>Bạn hãy chắc chắn thông tin mà bạn đang nhập đúng với những gì đang có!</p>
    </div>
    <form action="{{ route('post.edit', ['id' => $post->id]) }}" method="POST" class="p-2" enctype="multipart/form-data">
        @csrf
        <div class="row p-3">
            <div class="form-group col-md-12">
                <label class="font-weight-bold">Tiêu đề:</label>
                <input type="text" name="title" class="form-control rounded-0 pt-1 pb-1"
                    value="{{ old('title', $post->title) }}">
                @if ($errors->has('title'))
                    <span class="text-danger fz-14">{{ $errors->first('title') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group col-12">
            <label class="font-weight-bold">Mô tả:</label>
            <textarea type="text" name="description" class="ckeditor form-control rounded-0 pt-1 ps-2 pe-2 pb-1" data-height="150"
                placeholder="Nhập mô tả">{{ old('description' ,$post->description) }}</textarea>
            @if ($errors->has('description'))
                <span class="text-danger fz-14">{{ $errors->first('description') }}</span>
            @endif
        </div>
        <div class="form-group col-12">
            <label class="font-weight-bold">Nội dung:</label>
            <textarea type="text" name="content" class="ckeditor form-control rounded-0 pt-1 ps-2 pe-2 pb-1" data-height="400"
                placeholder="Nhập nội dung">{{ old('content',$post->content) }}</textarea>
            @if ($errors->has('content'))
                <span class="text-danger fz-14">{{ $errors->first('content') }}</span>
            @endif
        </div>
        <div class="row p-3">
            <div class="form-group col-md-4">
                <label class="font-weight-bold">Nguồn:</label>
                <input type="text" name="cre" class="form-control rounded-0 pt-1 pb-1"
                    value="{{ old('cre',$post->cre) }}">
                @if ($errors->has('cre'))
                    <span class="text-danger fz-14">{{ $errors->first('cre') }}</span>
                @endif
            </div>
            <div class="form-group col-md-4">
                <label for="inputState" class="font-weight-bold">Nổi Bật:</label>
                <select class="form-control rounded-0 setupSelect2" name="hot">
                    <option value="" selected>Chọn nổi bật</option>
                    <option value="0" {{ old('hot' ,$post->hot) == 0 ? 'selected' : '' }}>Không</option>
                    <option value="1" {{ old('hot' ,$post->hot) == 1 ? 'selected' : '' }}>Có</option>
                </select>
                @if ($errors->has('hot'))
                    <span class="text-danger fz-14">{{ $errors->first('hot') }}</span>
                @endif
            </div>
            <div class="form-group col-md-4">
                <label class="font-weight-bold">Ngày Đăng:</label>
                <input type="date" name="date_submit" class="form-control rounded-0 pt-1 pb-1"
                    value="{{ old('date_submit' ,$post->date_submit) }}">
                @if ($errors->has('date_submit'))
                    <span class="text-danger fz-14">{{ $errors->first('date_submit') }}</span>
                @endif
            </div>
        </div>
        <div class="row p-3">
            <div class="form-group col-md-4">
                <label for="inputState" class="font-weight-bold">Danh mục:</label>
                <select class="form-control rounded-0 setupSelect2" name="post_catalogue_id">
                    <option value="0">Chọn Danh Mục</option>
                    @foreach ($postCatalogues as $key => $item)
                    <option value="{{ $item->id }}" {{ old('post_catalogue_id', $post->post_catalogue_id) == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('post_catalogue_id'))
                    <span class="text-danger fz-14">{{ $errors->first('post_catalogue_id') }}</span>
                @endif
            </div>
            <div class="form-group col-md-4">
                <label for="inputState" class="font-weight-bold">Tác giả:</label>
                <select class="form-control rounded-0 setupSelect2" name="user_id">
                    <option value="0">Chọn tác giả</option>
                    @foreach ($users as $key => $item)
                    <option value="{{ $item->id }}" {{ old('user_id', $post->user_id) == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('user_id'))
                    <span class="text-danger fz-14">{{ $errors->first('user_id') }}</span>
                @endif
            </div>
            <div class="form-group col-md-4">
                <label for="inputState" class="font-weight-bold">Trạng thái:</label>
                <select class="form-control rounded-0 setupSelect2" name="publish">
                    <option value="">Chọn trạng thái</option>
                    <option value="1" {{ old('publish', $post->publish) == 1 ? 'selected' : '' }}>Hiển thị</option>
                    <option value="0" {{ old('publish', $post->publish) == 0 ? 'selected' : '' }}>Ẩn</option>
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
        <img src="/upload/post/{{ $post->image }}" alt="" width="120" height="120" class=" ml-3 object-fit-cover">
        <div class="form-group col-12 text-right ps-2 pe-2">
            <button type="submit" class="btn btn-primary rounded-0 pl-4 pr-4">Xác Nhận</button>
        </div>
    </form>
</div>
