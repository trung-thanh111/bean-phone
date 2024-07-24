<div class="bg-light ">
    <div class="row ms-3  pt-3">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb container">
                <li class="breadcrumb-item"><a href="/">Trang Chủ</a></li>
                <li class="breadcrumb-item"><a href="/product">Sản Phẩm</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    @php
                        $printed = false;
                    @endphp
                    @foreach ($productInBrands as $key => $item)
                        @if ($item->brandName > 1 && !$printed)
                            {{ $item->brandName }}
                            @php
                                $printed = true;
                            @endphp
                        @endif
                    @endforeach
                </li>
            </ol>
        </nav>
    </div>
</div>
</div>
<div class="container mb-5">
    <div class="row mt-4">
        @php
            $albumBrands = json_decode(str_replace("'", '"', $bannerBrands->albums), true);
        @endphp

        @foreach ($albumBrands as $key => $album)
            <div class="col-4">
                <img src="/upload/banner/{{ $album }}" class="rounded-2 me-2 w-100 object-fit-cover" alt="banner thương hiệu" >
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col">
            @foreach ($catagories as $key => $item)
                <button type="button"
                    class="btn btn-outline-secondary pt-1 pb-1 ps-3 pe-3 me-2 mt-3 fw-medium fz-14"><a
                        href="/product/category/{{ $item->id }}">{{ $item->name }}</a>
                </button>
            @endforeach
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-3 mt-3">
            <div class="list-group border mb-3">
                <button type="button" class="list-group-item list-group-item-action fw-bold bg-title-cl text-white"
                    aria-current="true">
                    Loại Sản Phẩm
                </button>
                <div class="fz-14 p-3">
                    @foreach ($catagories as $key => $item)
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                {{ $item->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="list-group border mb-3">
                <button type="button" class="list-group-item list-group-item-action fw-bold bg-title-cl text-white"
                    aria-current="true">
                    Mức Giá
                </button>
                <div class="fz-14 p-3">
                    <div class="sortByPrice mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">
                                Dưới 1 triệu
                            </label>
                        </div>
                    </div>
                    <div class="sortByPrice mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">
                                Dưới 1 triệu
                            </label>
                        </div>
                    </div>
                    <div class="sortByPrice mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">
                                Dưới 1 triệu
                            </label>
                        </div>
                    </div>

                </div>
            </div>
            <div class="list-group border ">
                <button type="button" class="list-group-item list-group-item-action fw-bold bg-title-cl text-white"
                    aria-current="true">
                    Đặc Biệt
                </button>
                <div class="fz-14 p-3">
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Pin Khủng
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" value="" id="">
                        <label class="form-check-label" for="">
                            Cấu Hình Mạnh
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" value="" id="">
                        <label class="form-check-label" for="">
                            Chụp Ảnh Đẹp
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" value="" id="">
                        <label class="form-check-label" for="">
                            Sạc Nhanh
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="d-flex justify-content-between">
                <h1 style="font-size: 18px; font-weight: bold;" class="mb-2 mt-2 rounded-2 bg-light pt-1 pb-1 ps-1 text-uppercase">
                    Sản Phẩm Brand
                    @php
                        $printed = false;
                    @endphp
                    @foreach ($productInBrands as $key => $item)
                        @if ($item->brandName > 1 && !$printed)
                            {{ $item->brandName }}
                            @php
                                $printed = true;
                            @endphp
                        @endif
                    @endforeach
                </h1>
                <select class="form-select bg-body-secondary text-dark p-0 ps-3 rounded-0  fz-14 "
                    style="width: 180px; height: 30px;" ng-model="sortOption">
                    <option selc4><i class="fa-solid fa-filter"></i> Sắp Xếp: Mặc Định</option>
                    <option value="name">A - Z</option>
                    <option value="-name">Z - A</option>
                    <option value="price">Giá Trị Thấp Đến Cao</option>
                    <option value="-price">Giá Trị Cao Đến Thấp</option>
                </select>
            </div>
            <div class="row">
                @foreach ($productInBrands as $key => $item)
                    <div class="col-md-3 pt-2 ps-3 mb-4">
                        <div class="card shadow">
                            <div class="head-card d-flex p-2">
                                <span
                                    class="text-bg-danger rounded-end ps-2 pe-2 pt-1 fz-10 {{ $item->del == 0 ? 'hidden' : '' }}">{{ $item->del != 0 ? number_format((($item->del - $item->price) / $item->del) * 100, 1) . '%' : '' }}</span>
                                <span class="ms-auto"><i class="fa-regular fa-heart "></i></span>
                            </div>
                            <img src="/fontend/img/{{ $item->image }}" class="card-img-top scale-hover object-fit-cover"
                                alt="..." width="231" height="231">
                            <span
                                class="text-white ms-2 mt-4  ps-3 pe-3  rounded-pill position-absolute fz-14 top-50  start-0 translate-middle-y"
                                style="background-color: var(--subColor); ">{{ $item->hot == 1 ? 'Sản Phẩm Hot' : '' }}</span>

                            <div class="card-body p-2">
                                <h6 class="fw-light" style="height: 40px;"><a href="{{ route('product.detail', ['id' => $item->id]) }}"
                                        class="text-break w-100 text-hover fw-medium ">{{ $item->title }}</a></h5>
                                    <div class="d-flex ">
                                        <span
                                            class="text-danger">{{ number_format($item->price, 0, ',', '.') . 'VNĐ' }}
                                            <br>
                                            <del class="text-secondary fz-14 {{ $item->del == 0 ? 'hidden' : '' }}">{{ number_format($item->del, 0, ',', '.') . 'VNĐ' }}
                                            </del></span>
                                        <span class="ms-auto align-middle">
                                            <form action="{{ route('cart.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $item->id }}">
                                                <input type="hidden" name="price" value="{{ $item->price }}">
                                                <input type="hidden" name="quantity" value="1" >
                                                <button type="submit" class="btn btn-link p-0"><i
                                                        class="fa-solid fa-cart-plus p-2 bg-info rounded text-white scale-hover"></i></button>
                                            </form>
                                        </span>
                                    </div>
                                    <p
                                        class="card-text mb-2 mt-2  bg-success p-0 rounded-pill fz-10 text-center text-white">
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
                    {{ $productInBrands->onEachSide(3)->links('pagination::bootstrap-5') }}

                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3 mb-5">
        <h6 class="mt-3">Điện thoại di động thông minh iPhone, Samsung, Xiaomi, Realme Chính Hãng Siêu Rẻ</h6>
        <span class="fz-14"> Điện thoại di động đang dần trở thành một vật bất ly thân trong cuộc sống hiện đại ngày
            nay. Xem ngay những thông tin bạn cần phải biết trước khi mua “dế yêu” về phục vụ cuộc sống hàng
            ngày.</span>

        <div class="row">
            <div class="col-md-4">
                <img src="/fontend/img/die-n-thoa-i-di-do-ng.webp" alt="Banner 1">
            </div>

        </div>

        <h6 class="mt-3">Phân loại điện thoại di động theo mục đích sử dụng</h6>
        <span class="fz-14"> Có khá nhiều tiêu chí để phân loại các mẫu điện thoại di động hiện nay. Để người dùng
            dễ lựa chọn, Di Động Thông Minh sẽ dựa theo mục đích sử dụng điện thoại hàng ngày:</span>


        <div class="row">
            <div class="col-md-6">
                <img src="/fontend/img/dien-thoai-thong-minh.webp" alt="Banner 4">
            </div>

        </div>

        <h6 class="mt-3">Điện thoại thông minh (smartphone)</h6>
        <span class="fz-14"> Đầu tiên, loại điện thoại di động phổ biến nhất hiện nay là điện thoại thông minh (hay
            còn gọi là smartphone). Những mẫu máy này có màn hình cảm ứng, có bộ vi xử lý mạnh mẽ, có camera độ phân
            giải cao cùng rất nhiều tính năng thông minh khác. Loại điện thoại này đáp ứng nhu cầu liên lạc và giải
            trí hàng ngày cực tốt.</span>


        <div class="row">
            <div class="col-md-6">
                <img src="/fontend/img/dien-thoai-pho-thong.webp" alt="Banner 4">
            </div>

        </div>

        <h6 class="mt-3">Điện thoại phổ thông (feature phone)</h6>
        <span class="fz-14 mt-2">
            Không như điện thoại thông minh, điện thoại phổ thông tập trung vào chức năng chính là liên lạc. Những
            người sử dụng điện thoại phổ thông hầu hết là người cao tuổi, khó sử dụng điện thoại thông minh có màn
            hình cảm ứng.


        </span>
        <br>
        <span class="fz-14">
            Điện thoại phổ thông còn có một ưu điểm nữa là pin cực kì trâu vì máy gần như chỉ sử dụng để phục vụ
            liên lạc. Máy có thể dễ dàng trụ được 3-4 ngày với nhu cầu nghe gọi, nhắn tin cơ bản.

        </span>
        <br>
        <span class="fz-14">
            Một ưu điểm nữa của điện thoại giá rẻ khiến những chiếc smartphone ao ước đó là độ bền của máy. Với
            những loại điện thoại này, nếu chẳng may người dùng có rơi hay va đập vào tường cũng không phải vấn đề
            quan trọng.

        </span>


        <div class="row">
            <div class="col-md-6">
                <img src="/fontend/img/gaming-phone.webp" alt="Banner 4">
            </div>

        </div>

        <h6 class="mt-3">Điện thoại chơi game (gaming phone)</h6>
        <span class="fz-14"> Điện thoại chơi game là những chiếc điện thoại thông minh được thiết kế và trang bị
            những tính năng giúp game thủ có được trải nghiệm giải trí tốt nhất. Những mẫu điện thoại lý tưởng để
            phục vụ người chơi sẽ có con chip mạnh, màn hình mượt (tần số quét 120Hz), dung lượng RAM lớn (8GB-12GB)
            kết hợp cùng viên pin khủng (~5000mAh).</span>
        <span class="fz-14">
            Để tối ưu cho việc chơi game, nhiều nhà sản xuất còn đưa nhiều công nghệ mới khiến cho máy mạnh hơn
            nhưng vẫn đảm bảo tản nhiệt tốt. Hoặc chế độ Game Mode được tích hợp để người chơi không bị làm phiền
            bởi thông báo hay các cuộc gọi đột xuất làm gián đoạn quá trình chơi game.</span>

        <h6 class="mt-3">Điện thoại chụp ảnh (Camera phone)</h6>
        <span class="fz-14">Điện thoại phục vụ cho nhu cầu chụp ảnh thì các hãng hay hướng tới số lượng và chất
            lượng trên cụm camera. Xu hướng hiện tại nhiều nhà sản xuất đang theo đuổi là nhiều camera và độ phân
            giải cao.
            <br>
            Điện thoại giá rẻ, tầm trung hay cao cấp đa số đều có 3-4 camera được tích hợp. Độ phân giải cũng được
            đẩy lên 48MP - 50MP ở trong tầm giá 4-5tr. Điện thoại tầm trung, cao cấp thì nay đã được trang bị camera
            lên đến 108MP.
            <br>
            Tuy vậy, độ phân giải cao hay số lượng camera nó cũng chỉ là một yếu tố để quyết định bức ảnh cho ra có
            đẹp hay không. Nó còn phụ thuộc vào nhiều yếu tố khác như chất lượng, kích thước cảm biến hay phần mềm
            xử lý từ hãng.</span>


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