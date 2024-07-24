<div class="wrapper">
    <div class="title-create pr-4 pl-4 pb-4">
        <h4 class="font-weight-bold text-uppercase">Thêm mới album</h4>
        <p>Bạn hãy chắc chắn thông tin mà bạn đang nhập đúng với những gì đang có!</p>
    </div>
    <form action="{{ route('album.store') }}" method="POST" class="p-2" enctype="multipart/form-data">
        @csrf
        <div class="form-group col-12">
            <label class="font-weight-bold">Mô tả:</label>
            <textarea type="text" name="description" class="form-control rounded-0 pt-1 ps-2 pe-2 pb-1" rows="10"
                placeholder="Nhập mô tả">{{ old('description') }}</textarea>
        </div>
        <div class="form-group col-md-12">
            <label class="font-weight-bold">Albums:</label> <br>
            <input type="file" name="albums[]" class="form-control-file rounded-0" value="{{ old('albums') }}"
                multiple>
            @if ($errors->has('albums'))
                <span class="text-danger fz-14">{{ $errors->first('albums') }}</span>
            @endif
        </div>
        <div class="row p-3">
            <div class="form-group col-md-6">
                <label class="font-weight-bold">Sản phẩm:</label>
                <select name="product_id" class="form-control rounded-0 setupSelect2">
                    <option value="0">Chọn Sản phẩm</option>
                    @foreach ($products as $key => $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>
                @if ($errors->has('product_id'))
                    <span class="text-danger fz-14">{{ $errors->first('product_id') }}</span>
                @endif
            </div>
            <div class="form-group col-md-6">
                <label class="font-weight-bold">Trạng thái:</label>
                <select class="form-control rounded-0 setupSelect2" name="publish">
                    <option value="">Chọn trạng thái</option>
                    <option value="1" {{ old('publish') == 1 ? 'selected' : '' }}>Hiển thị</option>
                    <option value="0" {{ old('publish') == 0 ? 'selected' : '' }}>Ẩn</option>
                </select>
            </div>
        </div>

        <div class="form-group col-12 text-right ps-2 pe-2">
            <button type="submit" class="btn btn-primary rounded-0 pl-4 pr-4">Xác Nhận</button>
        </div>
    </form>

</div>
@if (session('error'))
    <script>
        swal({
            title: "Thất bại!",
            text: "{{ session('error') }}",
            icon: "error",
            buttons: {
                ok: "OK",
            },
        }).then((value) => {
            switch (value) {
                case "ok":
                    break;
                default:
                    break;
            }
        });
    </script>
@endif