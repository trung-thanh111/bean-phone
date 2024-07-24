<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 font-weight-bold text-uppercase">Bình luận</h1>
    <p class="mb-4">Bạn có thể quản lý danh sách các thành phần trong website của bạn tại đây!</p>
    <div class="parent-container mb-3" style="text-align: right;">
        <div class="create btn btn-success pt-2 pb-2 ps-3 pe-3 rounded-0">
            <i class="fa-solid fa-plus fz-18 font-weight-bold text-end"></i>
            <a href="{{ route('comment.create') }}" class="fz-18 text-decoration-none text-white font-weight-bold">
                Thêm mới
            </a>
        </div>
    </div>
    <div class="parent-container mb-3 d-flex justify-content-end" style="text-align: right;">
        <div style="margin-right: 15px">
            <form action="{{ route('admin.comments') }}" method="get">
                @csrf
                <div class="form-search d-flex align-items-center justify-content-end me-2" style="width: 350px">
                    <input type="text" name="keyword" class="form-control rounded-0 me-2"
                        placeholder="Bạn đang cần gì ?">
                    <input type="submit" value="Tìm kiếm" class="btn btn-primary rounded-0">
                </div>
            </form>
        </div>
        <div>
            <select name="" id="" class="form-control rounded-0 " style="width: 250px">
                <option value="0">[Chọn bộ lọc]</option>
                <option value="0">A - Z</option>
                <option value="0">Z - A</option>
            </select>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-uppercase">Danh sách bình luận</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped fz-15" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 30px" class="text-center">#</th>
                            <th style="width: 120px" class="text-center">Tác giả</th>
                            <th>Nội dung </th>
                            <th style="width: 100px" class="text-center">Sản phẩm</th>
                            <th style="width: 100px" class="text-center">Bài viết</th>
                            <th class="text-center" style="width: 120px">Trạng thái</th>
                            <th class="text-center" style="width: 120px">Tác vụ</th>
                        </tr>
                    </thead>
                    @php
                        $i = 1;
                    @endphp
                    <tbody>
                        @foreach ($comments as $key => $item)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td class="text-center">{{ $item->user->name }}</td>
                                <td>
                                    <span class="font-weight-bold">{!! $item->content !!}</span>
                                </td>
                                <td class="text-center">
                                    <span class="font-weight-bold">{{ $item->product_id }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="font-weight-bold">{{ $item->post_id }}</span>
                                </td>
                                <td
                                    class="text-center text-{{ $item->publish == 1 ? 'success' : 'danger' }} font-weight-bold">
                                    {{ $item->publish == 1 ? 'Hiển thị' : 'Ẩn' }}</td>
                                <td>
                                    <div class="d-flex justify-content-around border-0">
                                        <div class="update" style="font-size: 25px">
                                            <a href="{{ route('comment.update', ['id' => $item->id]) }}">
                                                <i class="fa-solid fa-pen-to-square text-primary"></i>
                                            </a>
                                        </div>
                                        <div class="trash" style="font-size: 25px">
                                            <a href="{{ route('comment.delete', ['id' => $item->id]) }}">
                                                <i class="fa-solid fa-trash fz-20 text-danger"></i>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end mt-5">
                    {{ $comments->onEachSide(3)->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>
@if (session('success'))
    <script>
        swal({
            title: "Thành công!",
            text: "{{ session('success') }}",
            icon: "success",
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
