<div class="container">
    <h3 class="fw-medium text-secondary p-2 rounded-2 fz-20 mt-5 text-center fs-3">{{ $products->count() }} kết quả tìm kiếm về <strong class="text-decoration-underline">{{ $keyword }}</strong> của bạn!</h3>
    <div class="row">
        @foreach ($products as $key => $item)
            <div class="col-md-3 pt-3  mb-4">
                <div class="card shadow w-100" style="height: 550px">
                    <div class="head-card d-flex p-2">
                        <span
                            class="text-bg-danger rounded-end ps-2 pe-2 pt-1 fz-10 {{ $item->del == 0 ? 'hidden' : '' }}">{{ $item->del != 0 ? number_format((($item->del - $item->price) / $item->del) * 100, 1) . '%' : '' }}</span>
                        <span class="ms-auto"><i class="fa-regular fa-heart "></i></span>
                    </div>
                    <img src="fontend/img/{{ $item->image }}" class="card-img-top scale-hover object-fit-cover"
                        alt="..." width="290" height="290">
                    <span
                        class="text-white ms-2 mt-5  ps-3 pe-3  rounded-pill position-absolute fz-14 top-50  start-0 translate-middle-y"
                        style="background-color: var(--subColor); margin-top: 45px !important;" >{{ $item->hot == 1 ? 'Sản Phẩm Hot' : '' }}</span>

                    <div class="card-body p-2">
                        <h6 class="fw-light" style="height: 40px;"><a
                                href="{{ route('product.detail', ['id' => $item->id]) }}"
                                class="text-break w-100 text-hover fw-medium ">{{ $item->title }}</a></h5>
                            <div class="d-flex ">
                                <span class="text-danger">{{ number_format($item->price, 0, ',', '.') . 'VNĐ' }}
                                    <br>
                                    <del class="text-secondary fz-14 {{ $item->del == 0 ? 'hidden' : '' }}">{{ number_format($item->del, 0, ',', '.') . 'VNĐ' }}
                                    </del></span>
                                <span class="ms-auto align-middle">
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                                        <input type="hidden" name="price" value="{{ $item->price }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="btn btn-link p-0"><i
                                                class="fa-solid fa-cart-plus p-2 bg-info rounded text-white scale-hover"></i></button>
                                    </form>
                                </span>
                            </div>
                            <p class="card-text mb-2 mt-2  bg-success p-0 rounded-pill fz-10 text-center text-white">
                                Đã bán {{ $item->sold }} sản phẩm</p>
                            <p class="card-text bg-light p-0 rounded fz-10 text-center text-dark pt-1 pb-1 {{ $item->gift == '' ? 'hidden' : '' }}"
                                style="height: 30px">{{ $item->gift }}
                            </p>
                            <div class="head-card d-flex p-0">
                                @php
                                    $rating = $item->rate;
                                    $fullStar = floor($rating);
                                    $halfStar = $rating - $fullStar;
                                @endphp
                                <span class="fz-14 ">
                                    <div class="rating">
                                        @for ($i = 0; $i < $fullStar; $i++)
                                            <span class="fa fa-star text-warning"></span>
                                        @endfor
                                        @if ($halfStar >= 0.5)
                                            <span class="fa fa-star-half-alt text-warning"></span>
                                        @endif
                                    </div>
                                </span>
                                <span class="ms-auto fz-14">{{ $item->feedback }}</span>
                            </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-end mt-5">
            {{ $products->onEachSide(3)->links('pagination::bootstrap-5') }}

        </div>
    </div>
</div>
@if(session('success'))
    <script>
        swal({
            title: "Thành công!",
            text: "{{ session('success') }}",
            icon: "success",
            buttons: {
                viewCart: {
                    text: "Giỏ hàng",
                    value: "viewCart",
                },
                ok: "OK",
            },
        }).then((value) => {
            switch (value) {
                case "ok":
                    break;
                case "viewCart":
                    window.location.href = "{{ route('cart.index') }}";
                    break;
                default:
                    break;
            }
        });
    </script>
@endif
