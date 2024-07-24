<div class="wrapper p-2">
    <div class="title-create pl-4 pb-4">
        <h4 class="font-weight-bold text-uppercase mb-3">xóa banner</h4>
        <div class="luuy fz-14">
            <p>Hãy xác nhận thông tin thật kỹ trước khi xóa dữ liệu từ website!</p>
        </div>
    </div>
    <div class="row pr-4 pl-4 mt-3">
        <div class="col-md-6">
            <div class="title-destroy">
                <h5 class="font-weight-bold text-uppercase">
                    Xóa dữ liệu
                </h5>
            </div>
            <div class="fz-14">
                <p class="mb-1">Bạn hãy chắc chắn muốn xóa thông tin nhóm banner <strong class="text-danger">id =
                        {{ $banner->id }}</strong>.</p>
                <p>Sau khi xóa thông tin banner sẽ không thể phục hồi!</p>
            </div>
        </div>
        <div class="col-md-6">
            <form action="{{ route('banner.destroy', ['id' => $banner->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="mb-4">
                    <label class="form-label">Tiêu đề:</label>
                    <input type="text" class="form-control rounded-0" value="{{ $banner->title }}" readonly>
                </div>
                <div class="mb-4">
                    <label class="form-label">Hình ảnh:</label>
                    @php
                        $albums = json_decode($banner->albums, true);
                    @endphp
                    <div class="d-flex mb-2">
                        @if (is_array($albums))
                            @foreach ($albums as $album)
                                <div class="p-3">
                                    <img src="{{ asset('upload/banner/' . $album) }}" alt="Album Image"
                                        class="img-fluid" width="200" height="100">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="submit w-50 d-flex ">
                        <a href="{{ route('admin.banners') }}"
                            class="rounded-1 text-end form-control btn btn-secondary text-uppercase font-weight-bold mr-2">
                            Hủy</a>
                        <button type="submit"
                            class="rounded-1 text-end form-control btn btn-danger text-uppercase font-weight-bold pr-2 pl-2 ">
                            Xóa dữ liệu
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
