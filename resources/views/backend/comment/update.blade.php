<div class="wrapper">
    <div class="title-create pr-4 pl-4 pb-4">
        <h4 class="font-weight-bold text-uppercase">Cập nhật bình luận </h4>
        <p>Bạn hãy chắc chắn thông tin mà bạn đang nhập đúng với những gì đang có!</p>
    </div>
    <form action="{{ route('comment.edit',['id' => $comment->id]) }}" method="POST" class="p-2" enctype="multipart/form-data">
        @csrf
        <div class="row p-3">
            <div class="form-group col-md-12">
                <label class="font-weight-bold">Nội dung:</label>
                <textarea type="text" name="content" class="ckeditor form-control rounded-0 pt-1 ps-2 pe-2 pb-1" data-height="400"
                    placeholder="Nhập nội dung">{{ old('content', $comment->content) }}</textarea>
                @if ($errors->has('content'))
                    <span class="text-danger fz-14">{{ $errors->first('content') }}</span>
                @endif
            </div>
        </div>
        <div class="row p-3">
            <div class="form-group col-md-4">
                <label class="font-weight-bold">Tác giả:</label>
                <select class="form-control rounded-0 setupSelect2" name="user_id">
                    <option value="0">Chọn tác giả</option>
                    @foreach ($users as $key => $item)
                        <option value="{{ $item->id }}" {{ old('user_id',$comment->user_id) == $item->id ? 'selected' : '' }}>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label class="font-weight-bold">Sản phẩm:</label>
                <select id="productSelect" class="form-control rounded-0 setupSelect2" name="product_id">
                    <option value="0">Chọn Sản phẩm</option>
                    @foreach ($products as $key => $item)
                        <option value="{{ $item->id }}" {{ old('product_id',$comment->product_id) == $item->id ? 'selected' : '' }}>
                            {{ $item->title }}</option>
                    @endforeach
                </select>
                <span class="text-danger fz-14">Vui lòng chọn một trong hai mã sản phẩm hoặc bài viết.</span>
            </div>
            <div class="form-group col-md-4">
                <label class="font-weight-bold">Bài viết:</label>
                <select id="postSelect" class="form-control rounded-0 setupSelect2" name="post_id">
                    <option value="0">Chọn Bài viết</option>
                    @foreach ($posts as $key => $item)
                        <option value="{{ $item->id }}" {{ old('post_id',$comment->post_id) == $item->id ? 'selected' : '' }}>
                            {!! $item->title !!}</option>
                    @endforeach
                </select>
                <span class="text-danger fz-14">Vui lòng chọn một trong hai mã sản phẩm hoặc bài viết.</span>
            </div>
        </div>
        <div class="row p-3">
            <div class="form-group col-md-4">
                <label class="font-weight-bold">Rating: </label>
                <input type="text" name="rating" class="form-control rounded-0" value="{{ old('rating',$comment->rating) }}">
                <span class="text-danger fz-14">Sử dụng (.) để làm phần dư  </span>

            </div>
            <div class="form-group col-md-4">
                <label class="font-weight-bold">Nổi bật:</label>
                <select class="form-control rounded-0 setupSelect2" name="hot">
                    <option value="">Chọn nổi bật</option>
                    <option value="1" {{ old('hot', $comment->hot) == 1 ? 'selected' : '' }}>Có</option>
                    <option value="0" {{ old('hot', $comment->hot) == 0 ? 'selected' : '' }}>Không</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label class="font-weight-bold">Trạng thái:</label>
                <select class="form-control rounded-0 setupSelect2" name="publish">
                    <option value="">Chọn trạng thái</option>
                    <option value="1" {{ old('publish', $comment->publish) == 1 ? 'selected' : '' }}>Hiển thị</option>
                    <option value="0" {{ old('publish', $comment->publish) == 0 ? 'selected' : '' }}>Ẩn</option>
                </select>
            </div>
        </div>
        <div class="form-group col-12 text-right ps-2 pe-2">
            <button type="submit" class="btn btn-primary rounded-0 pl-4 pr-4">Xác Nhận</button>
        </div>
    </form>
</div>
