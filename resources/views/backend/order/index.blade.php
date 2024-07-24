<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 font-weight-bold text-uppercase">Đơn hàng</h1>
    <p class="mb-4">Bạn có thể quản lý danh sách các thành phần trong website của bạn tại đây!</p>
    <div class="parent-container mb-3 mt-4" style="text-align: right;">
        <div class="btn btn-success pt-2 pb-2 ps-3 pe-3 rounded-0">
            <i class="fa-solid fa-plus fz-18 font-weight-bold text-end"></i>
            <a href="{{ route('order.create') }}" class="fz-18 text-decoration-none text-white font-weight-bold">
                Thêm mới
            </a>
        </div>
    </div>
    <div class="parent-container mb-5 d-flex justify-content-end " style="text-align: right;">
        <div style="margin-right: 15px">
            <form action="{{ route('admin.orders') }}" method="get">
                <div class="form-search d-flex align-items-center justify-content-end me-2" style="width: 350px">
                    @csrf
                    <input type="text" name="keyword" class="form-control rounded-0 me-2" placeholder="Nhập mã đơn hàng bạn cần ?">
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
    <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link shadow-md  mr-1 font-weight-bold active" id="allorders-tab" data-toggle="tab"
                href="#allorders" role="tab" aria-controls="allorders" aria-selected="true">Tất cả
                <p class="fz-12 font-weight-normal" style="20px">{{ $orders->count() }} đơn hàng</p>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link shadow-md  mr-1" id="confirmed-tab" data-toggle="tab" href="#confirmed" role="tab"
                aria-controls="confirmed" aria-selected="false">Đã Xác Nhận
                <p class="fz-12 font-weight-normal" style="20px">
                    {{ $confirms->count() }} đơn hàng</p>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link shadow-md  mr-1" id="shipping-tab" data-toggle="tab" href="#shipping" role="tab"
                aria-controls="shipping" aria-selected="false">Vận chuyển
                <p class="fz-12 font-weight-normal" style="20px">
                    {{ $tranports->count() }} đơn hàng</p>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link shadow-md  mr-1" id="success-tab" data-toggle="tab" href="#success" role="tab"
                aria-controls="success" aria-selected="false">Thành Công
                <p class="fz-12 font-weight-normal" style="20px">
                    {{ $delivered->count() }} đơn hàng</p>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link shadow-md  mr-1" id="cancelled-tab" data-toggle="tab" href="#cancelled" role="tab"
                aria-controls="cancelled" aria-selected="false">Hủy
                <p class="fz-12 font-weight-normal" style="20px">
                    {{ $cancel->count() }} đơn hàng</p>
            </a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="allorders" role="tabpanel" aria-labelledby="allorders-tab">
            <div class="parent-container mb-3 mt-4" style="text-align: right;">
                <div class="d-flex justify-content-between mt-3">
                    <div>
                        <h5 class="text-uppercase font-weight-bold">Tất Cả</h5>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách Đơn hàng</h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped fz-15" id="dataTable" width="100%"
                            cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 80px" class="text-center">Mã ĐH</th>
                                    <th>Khách hàng</th>
                                    <th class="text-center">PT thanh toán</th>
                                    <th class="text-center" style="width: 200px">Ngày đặt</th>
                                    <th class="text-center" style="width: 180px">Tổng tiền</th>
                                    <th class="text-center" style="width: 120px">Trạng thái</th>
                                    <th class="text-center" style="width: 120px">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key => $item)
                                    @php
                                        $statusClass = '';
                                        if ($item->status == 'confirm') {
                                            $statusClass = 'primary';
                                        } elseif ($item->status == 'cancel') {
                                            $statusClass = 'danger';
                                        } elseif ($item->status == 'delivered') {
                                            $statusClass = 'success';
                                        } elseif ($item->status == 'tranport') {
                                            $statusClass = 'info';
                                        }
                                        $statusName = '';
                                        if ($item->status == 'confirm') {
                                            $statusName = 'Xác nhận';
                                        } elseif ($item->status == 'cancel') {
                                            $statusName = 'Đã hủy';
                                        } elseif ($item->status == 'delivered') {
                                            $statusName = 'Thành công';
                                        } elseif ($item->status == 'tranport') {
                                            $statusName = 'Đang vận chuyển';
                                        }
                                        $paymentMethod = '';
                                        if ($item->payment_method == 'cod') {
                                            $paymentMethod = 'Tiền mặt';
                                        } elseif ($item->payment_method == 'momo') {
                                            $paymentMethod = 'MoMo';
                                        } elseif ($item->payment_method == 'vnpay') {
                                            $paymentMethod = 'VN Pay';
                                        }
                                    @endphp
                                    <tr>
                                        <td class="">#{{ $item->id }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="img" style="margin-right: 10px">
                                                    <img src="/upload/user/{{ $item->users->image != null ? $item->users->image : 'avt-conan.jpg' }}"
                                                        alt="" class="object-fit-cover rounded-circle"
                                                        width="60" height="60">
                                                </div>
                                                <div class="info mt-4">
                                                    <span class="font-weight-bold">{{ $item->users->name }}</span>
                                                    <br>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">{{ $paymentMethod }}</td>
                                        <td class="text-center">{{ \Carbon\Carbon::parse($item->created_at)->format('h:i  d-m-Y') }}</td>
                                        <td class="text-center">
                                            {{ number_format($item->total, 0, ',', '.') . ' ' . 'VNĐ' }}
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="badge p-2 pr-3 pl-3 fz-12 text-white bg-{{ $statusClass }}">{{ $statusName }}</span>

                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-around border-0">
                                                <div class="trash" style="font-size: 25px">
                                                    <a href="{{ route('order.delete', ['id' => $item->id]) }}">
                                                        <i class="fa-solid fa-trash text-danger"></i>
                                                    </a>
                                                </div>
                                                <div class="update" style="font-size: 25px">
                                                    <a href="{{ route('order.update', ['id' => $item->id]) }}">
                                                        <i class="fa-solid fa-pen-to-square text-primary"></i>
                                                    </a>
                                                </div>
                                                <div class="trash" style="font-size: 25px">
                                                    <a href="{{ route('order.detail', ['id' => $item->id]) }}">
                                                        <i class="fa-solid fa-circle-info text-info"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end mt-5">
                            {{ $orders->onEachSide(3)->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tab Đã xác nhận -->
        <div class="tab-pane fade" id="confirmed" role="tabpanel" aria-labelledby="confirmed-tab">
            <div class="parent-container mb-3 mt-4" style="text-align: right;">
                <div class="d-flex justify-content-between mt-3">
                    <div>
                        <h5 class="text-uppercase font-weight-bold">ĐÃ xác nhận</h5>
                    </div>
                </div>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách Đơn hàng</h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped fz-15" id="dataTable" width="100%"
                            cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 80px" class="text-center">Mã ĐH</th>
                                    <th>Khách hàng</th>
                                    <th class="text-center">PT thanh toán</th>
                                    <th class="text-center" style="width: 200px">Ngày đặt</th>
                                    <th class="text-center" style="width: 180px">Tổng tiền</th>
                                    <th class="text-center" style="width: 120px">Trạng thái</th>
                                    <th class="text-center" style="width: 120px">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($confirms as $key => $item)
                                    @php
                                        $statusClass = '';
                                        if ($item->status == 'confirm') {
                                            $statusClass = 'primary';
                                        } elseif ($item->status == 'cancel') {
                                            $statusClass = 'danger';
                                        } elseif ($item->status == 'delivered') {
                                            $statusClass = 'success';
                                        } elseif ($item->status == 'tranport') {
                                            $statusClass = 'info';
                                        }
                                        $statusName = '';
                                        if ($item->status == 'confirm') {
                                            $statusName = 'Xác nhận';
                                        } elseif ($item->status == 'cancel') {
                                            $statusName = 'Đã hủy';
                                        } elseif ($item->status == 'delivered') {
                                            $statusName = 'Thành công';
                                        } elseif ($item->status == 'tranport') {
                                            $statusName = 'Đang vận chuyển';
                                        }
                                        $paymentMethod = '';
                                        if ($item->payment_method == 'cod') {
                                            $paymentMethod = 'Tiền mặt';
                                        } elseif ($item->payment_method == 'momo') {
                                            $paymentMethod = 'MoMo';
                                        } elseif ($item->payment_method == 'vnpay') {
                                            $paymentMethod = 'VN Pay';
                                        }
                                    @endphp
                                    <tr>
                                        <td class="">#{{ $item->id }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="img" style="margin-right: 10px">
                                                    <img src="/upload/user/{{ $item->users->image != null ? $item->users->image : 'avt-conan.jpg' }}"
                                                        alt="" class="object-fit-cover rounded-circle"
                                                        width="60" height="60">
                                                </div>
                                                <div class="info mt-4">
                                                    <span class="font-weight-bold">{{ $item->users->name }}</span>
                                                    <br>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">{{ $paymentMethod }}</td>
                                        <td class="text-center">{{ \Carbon\Carbon::parse($item->created_at)->format('h:i d-m-Y') }}</td>
                                        <td class="text-center">
                                            {{ number_format($item->total, 0, ',', '.') . ' ' . 'VNĐ' }}
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="badge p-2 pr-3 pl-3 fz-12 text-white bg-{{ $statusClass }}">{{ $statusName }}</span>

                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-around border-0">
                                                <div class="trash" style="font-size: 25px">
                                                    <a href="{{ route('order.delete', ['id' => $item->id]) }}">
                                                        <i class="fa-solid fa-trash text-danger"></i>
                                                    </a>
                                                </div>
                                                <div class="update" style="font-size: 25px">
                                                    <a href="{{ route('order.update', ['id' => $item->id]) }}">
                                                        <i class="fa-solid fa-pen-to-square text-primary"></i>
                                                    </a>
                                                </div>
                                                <div class="trash" style="font-size: 25px">
                                                    <a href="{{ route('order.detail', ['id' => $item->id]) }}">
                                                        <i class="fa-solid fa-circle-info text-info"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end mt-5">
                            {{ $orders->onEachSide(3)->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tab Vận chuyển -->
        <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">
            <div class="parent-container mb-3 mt-4" style="text-align: right;">
                <div class="d-flex justify-content-between mt-3">
                    <div>
                        <h5 class="text-uppercase font-weight-bold">Đang vận chuyển</h5>
                    </div>
                </div>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách Đơn hàng</h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped fz-15" id="dataTable" width="100%"
                            cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 80px" class="text-center">Mã ĐH</th>
                                    <th>Khách hàng</th>
                                    <th class="text-center">PT thanh toán</th>
                                    <th class="text-center" style="width: 200px">Ngày đặt</th>
                                    <th class="text-center" style="width: 180px">Tổng tiền</th>
                                    <th class="text-center" style="width: 120px">Trạng thái</th>
                                    <th class="text-center" style="width: 120px">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tranports as $key => $item)
                                    @php
                                        $statusClass = '';
                                        if ($item->status == 'confirm') {
                                            $statusClass = 'primary';
                                        } elseif ($item->status == 'cancel') {
                                            $statusClass = 'danger';
                                        } elseif ($item->status == 'delivered') {
                                            $statusClass = 'success';
                                        } elseif ($item->status == 'tranport') {
                                            $statusClass = 'info';
                                        }
                                        $statusName = '';
                                        if ($item->status == 'confirm') {
                                            $statusName = 'Xác nhận';
                                        } elseif ($item->status == 'cancel') {
                                            $statusName = 'Đã hủy';
                                        } elseif ($item->status == 'delivered') {
                                            $statusName = 'Thành công';
                                        } elseif ($item->status == 'tranport') {
                                            $statusName = 'Đang vận chuyển';
                                        }
                                        $paymentMethod = '';
                                        if ($item->payment_method == 'cod') {
                                            $paymentMethod = 'Tiền mặt';
                                        } elseif ($item->payment_method == 'momo') {
                                            $paymentMethod = 'MoMo';
                                        } elseif ($item->payment_method == 'vnpay') {
                                            $paymentMethod = 'VN Pay';
                                        }
                                    @endphp
                                    <tr>
                                        <td class="">#{{ $item->id }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="img" style="margin-right: 10px">
                                                    <img src="/upload/user/{{ $item->users->image != null ? $item->users->image : 'avt-conan.jpg' }}"
                                                        alt="" class="object-fit-cover rounded-circle"
                                                        width="60" height="60">
                                                </div>
                                                <div class="info mt-4">
                                                    <span class="font-weight-bold">{{ $item->users->name }}</span>
                                                    <br>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">{{ $paymentMethod }}</td>
                                        <td class="text-center">{{ \Carbon\Carbon::parse($item->created_at)->format('h:i d-m-Y') }}</td>
                                        <td class="text-center">
                                            {{ number_format($item->total, 0, ',', '.') . ' ' . 'VNĐ' }}
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="badge p-2 pr-3 pl-3 fz-12 text-white bg-{{ $statusClass }}">{{ $statusName }}</span>

                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-around border-0">
                                                <div class="trash" style="font-size: 25px">
                                                    <a href="{{ route('order.delete', ['id' => $item->id]) }}">
                                                        <i class="fa-solid fa-trash text-danger"></i>
                                                    </a>
                                                </div>
                                                <div class="update" style="font-size: 25px">
                                                    <a href="{{ route('order.update', ['id' => $item->id]) }}">
                                                        <i class="fa-solid fa-pen-to-square text-primary"></i>
                                                    </a>
                                                </div>
                                                <div class="trash" style="font-size: 25px">
                                                    <a href="{{ route('order.detail', ['id' => $item->id]) }}">
                                                        <i class="fa-solid fa-circle-info text-info"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end mt-5">
                            {{ $orders->onEachSide(3)->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tab Thành công -->
        <div class="tab-pane fade" id="success" role="tabpanel" aria-labelledby="success-tab">
            <div class="parent-container mb-3 mt-4" style="text-align: right;">
                <div class="d-flex justify-content-between mt-3">
                    <div>
                        <h5 class="text-uppercase font-weight-bold">Thành công</h5>
                    </div>
                </div>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách Đơn hàng</h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped fz-15" id="dataTable" width="100%"
                            cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 80px" class="text-center">Mã ĐH</th>
                                    <th>Khách hàng</th>
                                    <th class="text-center">PT thanh toán</th>
                                    <th class="text-center" style="width: 200px">Ngày đặt</th>
                                    <th class="text-center" style="width: 180px">Tổng tiền</th>
                                    <th class="text-center" style="width: 120px">Trạng thái</th>
                                    <th class="text-center" style="width: 120px">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($delivered as $key => $item)
                                    @php
                                        $statusClass = '';
                                        if ($item->status == 'confirm') {
                                            $statusClass = 'primary';
                                        } elseif ($item->status == 'cancel') {
                                            $statusClass = 'danger';
                                        } elseif ($item->status == 'delivered') {
                                            $statusClass = 'success';
                                        } elseif ($item->status == 'tranport') {
                                            $statusClass = 'info';
                                        }
                                        $statusName = '';
                                        if ($item->status == 'confirm') {
                                            $statusName = 'Xác nhận';
                                        } elseif ($item->status == 'cancel') {
                                            $statusName = 'Đã hủy';
                                        } elseif ($item->status == 'delivered') {
                                            $statusName = 'Thành công';
                                        } elseif ($item->status == 'tranport') {
                                            $statusName = 'Đang vận chuyển';
                                        }
                                        $paymentMethod = '';
                                        if ($item->payment_method == 'cod') {
                                            $paymentMethod = 'Tiền mặt';
                                        } elseif ($item->payment_method == 'momo') {
                                            $paymentMethod = 'MoMo';
                                        } elseif ($item->payment_method == 'vnpay') {
                                            $paymentMethod = 'VN Pay';
                                        }
                                    @endphp
                                    <tr>
                                        <td class="">#{{ $item->id }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="img" style="margin-right: 10px">
                                                    <img src="/upload/user/{{ $item->users->image != null ? $item->users->image : 'avt-conan.jpg' }}"
                                                        alt="" class="object-fit-cover rounded-circle"
                                                        width="60" height="60">
                                                </div>
                                                <div class="info mt-4">
                                                    <span class="font-weight-bold">{{ $item->users->name }}</span>
                                                    <br>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">{{ $paymentMethod }}</td>
                                        <td class="text-center">{{ \Carbon\Carbon::parse($item->created_at)->format('h:i d-m-Y') }}</td>
                                        <td class="text-center">
                                            {{ number_format($item->total, 0, ',', '.') . ' ' . 'VNĐ' }}
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="badge p-2 pr-3 pl-3 fz-12 text-white bg-{{ $statusClass }}">{{ $statusName }}</span>

                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-around border-0">
                                                <div class="trash" style="font-size: 25px">
                                                    <a href="{{ route('order.delete', ['id' => $item->id]) }}">
                                                        <i class="fa-solid fa-trash text-danger"></i>
                                                    </a>
                                                </div>
                                                <div class="update" style="font-size: 25px">
                                                    <a href="{{ route('order.update', ['id' => $item->id]) }}">
                                                        <i class="fa-solid fa-pen-to-square text-primary"></i>
                                                    </a>
                                                </div>
                                                <div class="trash" style="font-size: 25px">
                                                    <a href="{{ route('order.detail', ['id' => $item->id]) }}">
                                                        <i class="fa-solid fa-circle-info text-info"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end mt-5">
                            {{ $orders->onEachSide(3)->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tab Hủy -->
        <div class="tab-pane fade" id="cancelled" role="tabpanel" aria-labelledby="cancelled-tab">
            <div class="parent-container mb-3 mt-4" style="text-align: right;">
                <div class="d-flex justify-content-between mt-3">
                    <div>
                        <h5 class="text-uppercase font-weight-bold">Đã hủy</h5>
                    </div>
                </div>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách Đơn hàng</h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped fz-15" id="dataTable" width="100%"
                            cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 80px" class="text-center">Mã ĐH</th>
                                    <th>Khách hàng</th>
                                    <th class="text-center">PT thanh toán</th>
                                    <th class="text-center" style="width: 200px">Ngày đặt</th>
                                    <th class="text-center" style="width: 180px">Tổng tiền</th>
                                    <th class="text-center" style="width: 120px">Trạng thái</th>
                                    <th class="text-center" style="width: 120px">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cancel as $key => $item)
                                    @php
                                        $statusClass = '';
                                        if ($item->status == 'confirm') {
                                            $statusClass = 'primary';
                                        } elseif ($item->status == 'cancel') {
                                            $statusClass = 'danger';
                                        } elseif ($item->status == 'delivered') {
                                            $statusClass = 'success';
                                        } elseif ($item->status == 'tranport') {
                                            $statusClass = 'info';
                                        }
                                        $statusName = '';
                                        if ($item->status == 'confirm') {
                                            $statusName = 'Xác nhận';
                                        } elseif ($item->status == 'cancel') {
                                            $statusName = 'Đã hủy';
                                        } elseif ($item->status == 'delivered') {
                                            $statusName = 'Thành công';
                                        } elseif ($item->status == 'tranport') {
                                            $statusName = 'Đang vận chuyển';
                                        }
                                        $paymentMethod = '';
                                        if ($item->payment_method == 'cod') {
                                            $paymentMethod = 'Tiền mặt';
                                        } elseif ($item->payment_method == 'momo') {
                                            $paymentMethod = 'MoMo';
                                        } elseif ($item->payment_method == 'vnpay') {
                                            $paymentMethod = 'VN Pay';
                                        }
                                    @endphp
                                    <tr>
                                        <td class="">#{{ $item->id }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="img" style="margin-right: 10px">
                                                    <img src="/upload/user/{{ $item->users->image != null ? $item->users->image : 'avt-conan.jpg' }}"
                                                        alt="" class="object-fit-cover rounded-circle"
                                                        width="60" height="60">
                                                </div>
                                                <div class="info mt-4">
                                                    <span class="font-weight-bold">{{ $item->users->name }}</span>
                                                    <br>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">{{ $paymentMethod }}</td>
                                        <td class="text-center">{{ \Carbon\Carbon::parse($item->created_at)->format('h:i d-m-Y') }}</td>
                                        <td class="text-center">
                                            {{ number_format($item->total, 0, ',', '.') . ' ' . 'VNĐ' }}
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="badge p-2 pr-3 pl-3 fz-12 text-white bg-{{ $statusClass }}">{{ $statusName }}</span>

                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-around border-0">
                                                <div class="trash" style="font-size: 25px">
                                                    <a href="{{ route('order.delete', ['id' => $item->id]) }}">
                                                        <i class="fa-solid fa-trash text-danger"></i>
                                                    </a>
                                                </div>
                                                <div class="update" style="font-size: 25px">
                                                    <a href="{{ route('order.update', ['id' => $item->id]) }}">
                                                        <i class="fa-solid fa-pen-to-square text-primary"></i>
                                                    </a>
                                                </div>
                                                <div class="trash" style="font-size: 25px">
                                                    <a href="{{ route('order.detail', ['id' => $item->id]) }}">
                                                        <i class="fa-solid fa-circle-info text-info"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end mt-5">
                            {{ $orders->onEachSide(3)->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách Đơn hàng</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped fz-15" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 80px" class="text-center">Mã ĐH</th>
                            <th>Khách hàng</th>
                            <th class="text-center">PT thanh toán</th>
                            <th class="text-center" style="width: 200px">Ngày đặt</th>
                            <th class="text-center" style="width: 180px">Tổng tiền</th>
                            <th class="text-center" style="width: 120px">Trạng thái</th>
                            <th class="text-center" style="width: 120px">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderSearchs as $key => $item)
                            @php
                                $statusClass = '';
                                if ($item->status == 'confirm') {
                                    $statusClass = 'primary';
                                } elseif ($item->status == 'cancel') {
                                    $statusClass = 'danger';
                                } elseif ($item->status == 'delivered') {
                                    $statusClass = 'success';
                                } elseif ($item->status == 'tranport') {
                                    $statusClass = 'info';
                                }
                                $statusName = '';
                                if ($item->status == 'confirm') {
                                    $statusName = 'Xác nhận';
                                } elseif ($item->status == 'cancel') {
                                    $statusName = 'Đã hủy';
                                } elseif ($item->status == 'delivered') {
                                    $statusName = 'Thành công';
                                } elseif ($item->status == 'tranport') {
                                    $statusName = 'Đang vận chuyển';
                                }
                                $paymentMethod = '';
                                if ($item->payment_method == 'cod') {
                                    $paymentMethod = 'Tiền mặt';
                                } elseif ($item->payment_method == 'momo') {
                                    $paymentMethod = 'MoMo';
                                } elseif ($item->payment_method == 'vnpay') {
                                    $paymentMethod = 'VN Pay';
                                }
                            @endphp
                            <tr>
                                <td class="">#{{ $item->id }}</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="img" style="margin-right: 10px">
                                            <img src="/upload/user/{{ $item->users->image != null ? $item->users->image : 'avt-conan.jpg' }}"
                                                alt="" class="object-fit-cover rounded-circle" width="60"
                                                height="60">
                                        </div>
                                        <div class="info mt-4">
                                            <span class="font-weight-bold">{{ $item->users->name }}</span> <br>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">{{ $paymentMethod }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($item->created_at)->format('h:i d-m-Y') }}</td>
                                <td class="text-center">
                                    {{ number_format($item->total, 0, ',', '.') . ' ' . 'VNĐ' }}
                                </td>
                                <td class="text-center">
                                    <span
                                        class="badge p-2 pr-3 pl-3 fz-12 text-white bg-{{ $statusClass }}">{{ $statusName }}</span>

                                </td>
                                <td>
                                    <div class="d-flex justify-content-around border-0">
                                        <div class="trash" style="font-size: 25px">
                                            <a href="{{ route('order.delete', ['id' => $item->id]) }}">
                                                <i class="fa-solid fa-trash text-danger"></i>
                                            </a>
                                        </div>
                                        <div class="update" style="font-size: 25px">
                                            <a href="{{ route('order.update', ['id' => $item->id]) }}">
                                                <i class="fa-solid fa-pen-to-square text-primary"></i>
                                            </a>
                                        </div>
                                        <div class="trash" style="font-size: 25px">
                                            <a href="{{ route('order.detail', ['id' => $item->id]) }}">
                                                <i class="fa-solid fa-circle-info text-info"></i>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end mt-5">
                    {{ $orders->onEachSide(3)->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div> --}}
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
