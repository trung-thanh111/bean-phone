<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 font-weight-bold text-uppercase">Thành viên</h1>
    <p class="mb-4">Bạn có thể quản lý danh sách các thành phần trong website của bạn tại đây!</p>
    <div class="parent-container mb-3" style="text-align: right;">
        <div class="create btn btn-success pt-2 pb-2 ps-3 pe-3 rounded-0">
            <i class="fa-solid fa-plus fz-18 font-weight-bold text-end"></i>
            <a href="{{ route('user.create') }}" class="fz-18 text-decoration-none text-white font-weight-bold">
                Thêm mới
            </a>
        </div>
    </div>
    <div class="parent-container mb-3 d-flex justify-content-end" style="text-align: right;">
        <div style="margin-right: 15px">
            <form action="{{ route('admin.users') }}" method="get">
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
            <h6 class="m-0 font-weight-bold text-primary">Danh sách sản phẩm</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped fz-15" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 30px" class="text-center">#</th>
                            <th style="width:60px">Ảnh</th>
                            <th>Tên Thành Viên</th>
                            <th class="">Email</th>
                            <th class="text-center">Ngày sinh</th>
                            <th class="text-center">Quyền</th>
                            <th class="text-center" style="width: 120px">Trạng thái</th>
                            <th class="text-center">Tác vụ</th>
                        </tr>
                    </thead>
                    @php
                        $i = 1;
                    @endphp
                    <tbody>
                        @foreach ($users as $key => $item)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td>
                                    <div class="img" style="margin-right: 10px">
                                        <img src="/upload/user/{{ ($item->image) ? $item->image : 'avt-conan.jpg' }}" alt=""
                                            class="object-fit-cove rounded-circle" width="50" height="50">
                                    </div>
                                </td>
                                <td>
                                    <div class="info">
                                        <span class="">{{ $item->name }}</span>
                                    </div>
                                </td>
                                <td class="">
                                    <span class="">{{ $item->email }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="">{{ \Carbon\Carbon::parse($item->birthday)->format('d-m-Y') }}</span>
                                </td>
                                <td class="text-center">
                                    @if ($item->user_catalogue_id == 1)
                                        <span class="badge p-2 pr-4 pl-4 fz-12 bg-danger text-white">Admin</span>
                                    @elseif($item->user_catalogue_id == 2)
                                        <span class="badge p-2 pr-4 pl-4 fz-12 bg-warning text-white">Editor</span>
                                    @else
                                        <span class="badge p-2 pr-3 pl-3 fz-12 bg-success text-white">Thành viên</span>
                                    @endif

                                </td>
                                <td
                                    class="text-center text-{{ $item->publish == 1 ? 'success' : 'danger' }} font-weight-bold">
                                    {{ $item->publish == 1 ? 'Hiển thị' : 'Ẩn' }}</td>
                                <td>
                                    <div class="d-flex justify-content-around border-0">
                                        <div class="update" style="font-size: 25px">
                                            <a href="{{ route('user.update', ['id' => $item->id]) }}">
                                                <i class="fa-solid fa-pen-to-square text-primary"></i>
                                            </a>
                                        </div>
                                        <div class="trash" style="font-size: 25px">
                                            <a href="{{ route('user.delete', ['id' => $item->id]) }}">
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
                    {{ $users->onEachSide(3)->links('pagination::bootstrap-5') }}
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
