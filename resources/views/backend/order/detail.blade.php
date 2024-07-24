<div class="container-fuild">
    <div class="text-dark pr-3 pl-3">
        <div class="info-orders mb-5">
            <h3 class="font-weight-bold text-uppercase">Thông tin đơn hàng</h3>
        </div>
        <h4 class="font-weight-bold">Yêu cầu đơn hàng</h4>
        <div class="d-flex justify-content-between w-100 pr-3">
            
            <div class="d-flex mb-5 pl-2 mt-3">
                <div class=" pr-2 pl-2 pb-2 ">
                    <i class="fa-solid fa-box text-info" style="font-size: 50px"></i>
                </div>
                <div>
                    <h6>Đơn hàng #{{ $orderDetail->order_id }} <span class="badge p-1 pr-3 pl-3 text-warning  btn btn-outline-warning">Đã tiếp nhận
                            đơn hàng</span></h6>
                    <p class="fz-12 mr-2">Thời gian đặt: {{ \Carbon\Carbon::parse($orderDetail->created_at)->format('h:i:sa d-m-Y') }}
                        <span class=""> <i class="fa-solid fa-check text-success"></i>Đã thanh toán</span>
                    </p>
                </div>
            </div>
            <div >
                <span class="btn btn-primary pr-3 pl-3"><i class="fa-brands fa-rocketchat fz-16"></i> Chat với khách</span>
            </div>
        </div>
        <div class="mb-3">
            <h4 class="font-weight-bold">Danh sách sản phẩm</h4>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped fz-15" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width: 30px" class="text-center">#</th>
                                <th>Sản phẩm</th>
                                <th class="text-center">Giá mua</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-center">Thành tiền</th>
                            </tr>
                        </thead>
                        @php
                        $i = 1;
                        $total = 0;
                        @endphp
                        <tbody class="bodytable">
                            @foreach ($productInOrder as $key => $item)
                            @php
                            $provisional = $item->product->price * $item->quantity;
                            $total += $item->product->price * $item->quantity;
                            @endphp
                            <tr class="my-2">
                                <td class="text-center">{{ $i++ }}</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="img" style="margin-right: 10px">
                                            <img src="/upload/product/{{ $item->product->image }}" alt="" class="object-fit-cove" width="60" height="60">
                                        </div>
                                        <div class="info">
                                            <span class="font-weight-bold">{{ $item->product->title }}</span> <br>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">{{ number_format($item->price, 0, ',', '.') . ' ' . 'VNĐ' }}</td>
                                <td class="text-center">{{ $item->quantity }}</td>
                                <td class="text-center text-warning font-weight-bold">{{ number_format($provisional, 0, ',', '.') . ' ' . 'VNĐ' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="text-white bg-info">
                                <td colspan="4" class="font-weight-bold fz-18">Tổng tiền</td>
                                <td class="text-center font-weight-bold fz-16">{{ number_format($total, 0, ',', '.') . ' ' . 'VNĐ' }}</td>
                            </tr>
                        </tfoot>
                    </table>                    
                </div>
            </div>
        </div>
        <div>
            <h4 class="font-weight-bold">Thông tin giao hàng</h4>
            <div class="row p-3 w-100">
                <div class="col-md border border-light bg-white p-3">
                    <div class="mb-4">
                        <h6 class="font-weight-bold mb-2">1. Thông tin người nhận </h6>
                        <p class="pl-3">Phạm thanh trung | 0812720008 </p>
                    </div>
                    <div>
                        <h6 class="font-weight-bold  mb-2">2. Địa chỉ nhận hàng </h6>
                        <p class=" pl-3">98,100 tân thới nhất 5, phường tân thới nhất, quận 12, thành phố HCM</p>
                    </div>
                </div>
                <div class="col-md-5 ml-3 border border-light bg-white w-100 p-0">
                    <h6 class="font-weight-bold p-3 border rounded-0">Thông tin thanh toán</h6>
                    <div class="p-3">
                        <div class="row mb-2">
                            <div class="col-6">
                                <span class="fw-bold">Phương thức thanh toán</span>
                            </div>
                            <div class="col-6 text-end">
                                <strong>Thanh toán khi nhận hàng</strong>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <span>Phụ thu</span>
                            </div>
                            <div class="col-6 text-end">
                                <strong>{{ number_format($total, 0, ',', '.') . ' ' . 'VNĐ' }}</strong>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <a class="btn btn-outline-info pl-3 pr-3 rounded-0 " href="{{ route('admin.orders') }}">Quay Lại</a>
    </div>
</div>
