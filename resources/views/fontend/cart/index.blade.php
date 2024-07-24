<div class="bg-light  ">
    <div class="row ms-3  pt-3">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb container">
                <li class="breadcrumb-item"><a href="/">Trang Chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Giỏ Hàng</li>
            </ol>
        </nav>
    </div>
</div>
</div>
<div class="container  mb-5  ">
    <h1 style="font-size: 20px; " class="mb-3 mt-3 rounded-2 bg-light fw-bold pt-3 pb-3 ps-3">
        GIỎ HÀNG</h1>
    <div class="row">
        <div class="col-9">
            @if (!empty($order) && $order->orderItems->count() > 0)
                <p class="text-bg-success w-100 rounded text-center p-1 fw-medium fz-12">Đơn hàng được miễn phí vận
                    chuyển</p>

                <table class="table bordered w-100">
                    <thead>
                        <tr>
                            <th class="w-10">Thông Tin Sản Phẩm</th>
                            <th class="w-10"></th>
                            <th class="w-10"></th>
                            <th class="text-center w-20">Đơn Giá</th>
                            <th class="text-center w-10">Số Lượng</th>
                            <th class="text-center w-20">Thành Tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $key => $item)
                            
                            @csrf
                            <tr class="align-middle">
                                <td class="w-10 d-flex">
                                    <img src="/fontend/img/{{ $item->product->image }}" class="object-fit-cover"
                                        width="100" height="100" alt="">
                                    <div class="fz-14 mt-3">
                                        <span class="fw-bold mb-2">{{ $item->product->title }}</span> <br>
                                        <span class="fz-12">Màu:
                                            <strong>{{ $item->product->color }}</strong></span>
                                        <br>
                                        <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="fz-12 btn btn-outline-danger border-0 p-1 mt-3"
                                                style="width: 50px;">Xóa</button>
                                        </form>
                                    </div>
                                </td>
                                <td class="w-10"></td>
                                <td class="w-10"></td>
                                <td class="text-center w-20"><span
                                        class="text-danger fw-bold">{{ number_format($item->price, 0, ',', '.') . ' ' . 'VNĐ' }}</span>
                                </td>
                                <td class="text-center w-10">
                                    <form action="{{ route('cart.update') }}" method="POST">
                                        @csrf
                                        <div class="quantity">
                                            <button class="minus" aria-label="Decrease">&minus;</button>
                                            <input type="hidden" name="items[{{ $key }}][id]"
                                                value="{{ $item->id }}">
                                            <input type="number" name="items[{{ $key }}][quantity]"
                                                class="input-box" value="{{ $item->quantity }}" min="1"
                                                max="{{ $item->product->sold }}">
                                            <button class="plus" aria-label="Increase">&plus;</button>
                                        </div>
                                    </form>

                                </td>
                                <td class="text-center w-20">
                                    {{ number_format($item->quantity * $item->price, 0, ',', '.') . ' ' . 'VNĐ' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6" class="text-end">
                                <form action="{{ route('cart.clear') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Xóa Hết</button>
                                </form>
                            </td>
                        </tr>
                    </tfoot>

                </table>
            @else
                <div class="null-cart text-center">

                    <img src="/fontend/img/cartnull.png" class="object-fit-cover " alt="" width="150"
                        height="150">
                    <h1 class=" fw-bold p-3 text-center rounded-2 fz-20 text-secondary">
                        <i class="fa-solid fa-cart-shopping me-2 m-2"></i>Bạn chưa có sản phẩm nào.
                    </h1>
                    <a href="/product"
                        class=" btn btn-info text-danger text-decoration text-decoration-none fw-bold text-light">Shopping
                        ngay!</a>
                </div>
            @endif
        </div>
        <div class="col-3 border border-light shadow pt-2 pb-4 rounded-2">
            <h1 style="font-size: 18px; font-weight: bold;" class=" rounded-2 bg-light  pb-3 ps-0">Đơn Mua</h1>
            @if (!empty($order) && $order->orderItems->count() > 0)
                @foreach ($order->orderItems as $key => $item)
                    <div class="position-relative d-flex mt-3">
                        <img src="/fontend/img/{{ $item->product->image }}" class="object-fit-cover"
                            style="width: 40px;" alt="">
                        <div>
                            <span class=" ms-2" style="height: 40px; font-size: 12px;">
                                {{ $item->product->title }}
                            </span>
                            <p class="position-absolute top-0 start-100 translate-middle text-danger fz-14">
                                x{{ $item->quantity }}
                            </p>
                        </div>
                    </div>
                @endforeach
            @else
                <div>
                    <span class="text-center text-info">Bạn chưa có sản phẩm!</span>
                </div>
            @endif
            <hr>
            <div class="row g-3">
                <label for="" class="form-label fw-medium">Nhập Coupon</label>
                <div class="col-md-8 p-0">
                    <input type="text" class="form-control rounded-0" placeholder="" aria-label="City">
                </div>
                <div class="col-md p-0">
                    <input type="button" class="rounded-0 btn btn-info form-control text-white" value="Áp Dụng">
                </div>
            </div>
            <hr>
            <div class=" g-3 mt-3">
                <label for="" class="form-label fw-medium">Phương thức thanh toán</label>
                <div class="">
                    <input type="radio" class="pt-1" style="width: 20px">
                    <label for="">Thanh toán qua momo</label>
                </div>

            </div>

            <hr>
            <div class="d-flex justify-content-between mb-2">
                <span class="fs-6 ">Phí vận chuyển: </span>
                <strong class="">0 VNĐ</strong>
            </div>
            <div class="d-flex justify-content-between mb-5">
                <span class="fs-6 ">Tạm Tính:</span>
                <strong class="">
                    {{ ($order->total != null) ? number_format($order->total, 0, ',', '.') . ' ' . 'VNĐ' : '0' . ' ' . 'VNĐ' }}
                </strong>
            </div>
            <a href="/checkout" class="btn btn-warning fw-medium text-white w-100">Tiến Hành Thanh Toán</a>
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
{{-- @if (session('warning'))
    <script>
        swal({
            title: "Bạn có chắc không?",
            text: "Sau khi xóa, bạn sẽ không thể phục hồi",
            icon: "warning",
            buttons: {
                cancel: {
                    text: "Giỏ hàng",
                    value: "cancel",
                },
                ok: {
                    text: "OK",
                    value: "ok",
                }
            },
            dangerMode: true,
        }).then((value) => {
            switch (value) {
                case "ok":
                    window.location.href = "{{ route('cart.destroy', $item->id) }}";
                    break;
                case "cancel":
                    break;
                default:
                    break;
            }
        });
    </script>
@endif --}}

