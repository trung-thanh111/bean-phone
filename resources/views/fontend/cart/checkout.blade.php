<div class="bg-light ">
    <div class="row ms-3  pt-3">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb container">
                <li class="breadcrumb-item"><a href="index.html">Trang Chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thanh Toán</li>
            </ol>
        </nav>
    </div>
</div>
</div>
<div class="container mb-5 mt-5 ">
    <div class="row ">
        <div class="col-8">
            <div class="text-center">
                <img src="/fontend/img/logo.webp" class="text-center align-items-center" alt="">
            </div>
            <h1 style="font-size: 20px; font-weight: bold;" class=" rounded-2 bg-light mt-5 mb-3  pb-3 ">
                Thông Tin Nhận Hàng</h1>
            <form class="row g-3" action="{{ route('checkout.confirm') }}" method="POST" novalidate>
                @csrf
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Họ Và Tên</label>
                    <input type="text" name="name" class="form-control pt-2 pb-2" id="inputPassword4" required>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control pt-2 pb-2" id="inputEmail4" required>
                </div>
                <div class="col-auto w-100">
                    <label class="form-label" for="autoSizingInputGroup">Số Điện Thoại</label>
                    <input type="text" name="phone" class="form-control pt-2 pb-2" id="autoSizingInputGroup"
                        placeholder="Số điện thoại" pattern="^0\d{9,10}$" required>
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Địa Chỉ</label>
                    <input type="text" name="address" class="form-control pt-2 pb-2" id="inputAddress"
                        placeholder="Địa chỉ" required>
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label">Tỉnh/Thành Phố</label>
                    <select name="province" class="form-select pt-2 pb-2" id="inputState" required>
                        <option value="" disabled selected>[Chọn Tỉnh/Thành Phố]</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label">Quận/Huyện</label>
                    <select name="district" class="form-select pt-2 pb-2" id="inputState" required>
                        <option value="" disabled selected>[Chọn Quận/Huyện]</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label">Xã Phường/Thị Trấn</label>
                    <select name="ward" class="form-select pt-2 pb-2" id="inputState" required>
                        <option value="" disabled selected>[Chọn Phường/Thị Trấn]</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputZip" class="form-label">Zip</label>
                    <input type="text" name="zipcode" class="form-control" id="inputZip" pattern="^\d{6}$" required>
                </div>
                <div class="form">
                    <label class="form-label">Lưu ý:</label>
                    <textarea class="form-control" name="description" placeholder="Nhập lưu ý" rows="4" id="floatingTextarea"></textarea>
                </div>
                <div class="mt-3 d-flex justify-content-between">
                    <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary text- w-100 mb-3 mt-1 me-2">Hủy</a>
                    <button type="submit" class="btn btn-info text-white w-100  mb-3 mt-1">Đặt Hàng</button>
                </div>
            </form>
        </div>
        
        <div class="col-4">
            <h1 style="font-size: 20px; font-weight: bold;" class=" rounded-2 bg-light  pb-3">
                Đơn Mua</h1>
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
            @endif
            <hr>
            <div class="row g-3">
                <label for="" class="form-label">Nhập Coupon</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="" aria-label="City">
                </div>
                <div class="col-md">
                    <input type="button" class=" btn btn-info form-control text-white" value="Áp Dụng">
                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-between mb-2">
                <span class="fs-6 ">Phí vận chuyển: </span>
                <strong class="">-24.000 VNĐ</strong>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span class="fs-6 ">Khuyến Mãi: </span>
                <strong class="">0 VNĐ</strong>
            </div>
            <div class="d-flex justify-content-between mb-5">
                <span class="fs-6 ">Thành Tiền: </span>
                <strong class="">{{ number_format($order->total, 0, ',','.') }} VNĐ</strong>
            </div>
            <h4 style="font-size: 16px; font-weight: bold;" class=" rounded-2 bg-light  pb-3">
                Phương Thức Thanh Toán</h4>
            <div class="form-check ms-3">
                <input class="form-check-input" type="radio" name="" id="" checked>
                <label class="form-check-label" for="">
                    Thanh Toán Khi Nhận Hàng
                </label>
            </div>
            <div class="form-check mt-3 ms-3">
                <input class="form-check-input" type="radio" name="" id="">
                <label class="form-check-label" for="">
                    Thanh Toán Online
                </label>
            </div>
            <div class="payment-accept mt-3 mb-5 text-center">
                <img width="auto" height="40px"
                    src="//bizweb.dktcdn.net/100/497/960/themes/923878/assets/payment-1.png?1710409416702"
                    data-src="//bizweb.dktcdn.net/100/497/960/themes/923878/assets/payment-1.png?1710409416702"
                    alt="Payment 1" class="lazyload loaded" data-was-processed="true">
                <img width="auto" height="40px"
                    src="//bizweb.dktcdn.net/100/497/960/themes/923878/assets/payment-2.png?1710409416702"
                    data-src="//bizweb.dktcdn.net/100/497/960/themes/923878/assets/payment-2.png?1710409416702"
                    alt="Payment 2" class="lazyload loaded" data-was-processed="true">
                <img width="auto" height="40px"
                    src="//bizweb.dktcdn.net/100/497/960/themes/923878/assets/payment-3.png?1710409416702"
                    data-src="//bizweb.dktcdn.net/100/497/960/themes/923878/assets/payment-3.png?1710409416702"
                    alt="Payment 3" class="lazyload loaded" data-was-processed="true">
                <img width="auto" height="40px"
                    src="//bizweb.dktcdn.net/100/497/960/themes/923878/assets/payment-4.png?1710409416702"
                    data-src="//bizweb.dktcdn.net/100/497/960/themes/923878/assets/payment-4.png?1710409416702"
                    alt="Payment 4" class="lazyload loaded" data-was-processed="true">
            </div>

        </div>
    </div>
</div>
