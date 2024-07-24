<div class="bg-light  mb-3">
    <div class="row ms-3  pt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb container">
                <li class="breadcrumb-item"><a href="index.html">Trang Chủ</a></li>
                <li class="breadcrumb-item"><a href="post.html">Tin Tức</a></li>
                <li class="breadcrumb-item active text-info" aria-current="page">Chi Tiết Tin Tức</li>
            </ol>
        </nav>

    </div>
</div>
<div class="container mb-5">
    <div class="row mb-5">
        <div class="col-9">
            <div class="position-relative">
                <img src="/fontend/img/{{ $post->image }}" class="object-fit-cover rounded-5" alt=""
                    width="100%" height="420">
                <div class=" bg-light pt-4  rounded-top-4 w-75 position-absolute bottom-0 start-50 translate-middle-x pb-5"
                    style="margin-left:0">
                    <h1 class="fs-3 text-wrap text-center fw-bold">{!! $post->title !!}</h1>
                </div>
            </div>
            <div class="d-flex fz-14 text-secondary mt-3 mb-5  ">
                <div>
                    <span>
                        <img src="/fontend/img/{{ $post->userImage }}" alt=""
                            class="rounded-circle object-fit-cover border p-1 border-danger fw-bold me-3" width="50"
                            height="50">
                        <strong class="fs-6">{{ $post->userName }}</strong>
                        <div class="ms-5">
                            <i class="fa-regular fa-clock fz-14 ms-1"></i>
                            <span class="ms-1">Ngày Đăng: <span>{{ $post->date_submit }}</span></span>
                        </div>
                    </span>
                </div>
            </div>
            <div class="content fz-14 text-dark mt-3">
                <p class="text-dark text-wrap ">{!! $post->content !!} </p>
                @foreach ($productOne as $key => $item)
                    <div class="card mb-3 mt-4" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="/fontend/img/{{ $item->image }}"
                                    class="img-fluid rounded-start object-fit-cover" alt="..." width="170"
                                    height="180">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->title }}</h5>
                                    <p class="card-text">Giá: <strong
                                            class="text-danger">{{ number_format($item->price, 0, ',', '.') . 'VNĐ' }}</strong>
                                    </p>
                                    <p class="card-text {{ $item->del == 0 ? 'hidden' : '' }}">Giá Thị trường:
                                        <del>{{ number_format($item->del, 0, ',', '.') . 'VNĐ' }}</del>
                                    </p>
                                    <p class="card-text btn btn-success text-light"><a
                                            href="{{ route('product.detail', ['id' => $item->id]) }}"
                                            class="text-light">Mua Ngay</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="author-post d-flex justify-content-end mt-5 mb-5">
                <span>Nguồn: </span>
                <h6 class="ms-5">{{ $post->cre != null ? $post->cre : $post->userName }}</h6>
            </div>
            <h5 class="mb-3 mt-5 fz-18 fw-bold text-uppercase">Đánh giá bài viết</h5>
            <form class="row g-3" action="{{ route('post.comment', ['id' => $post->id]) }}" method="POST">
                @csrf
                <div class="rateing">
                    <label for="" class="form-label text-info fw-medium fz-14">Đánh Giá:* </label>
                    <span class="fa fa-star text-secondary"></span>
                    <span class="fa fa-star text-secondary"></span>
                    <span class="fa fa-star text-secondary"></span>
                    <span class="fa fa-star text-secondary"></span>
                    <span class="fa fa-star text-secondary"></span>
                </div>
                <div class="">
                    <label for="" class="form-label text-info fw-medium">
                        Nội dung:*
                    </label>
                    <textarea class="form-control pt-2 pb-2 rounded-1" placeholder="Nội dung bình luận" rows="8" name="content"></textarea>
                </div>
                <div class="col-12 mt-4 text-end">
                    <button type="submit" class="btn btn-info text-light fw-medium ps-4 pe-4 rounded-1">Xác
                        nhận</button>
                </div>
            </form>
            <div class="mt-5 mb-5">
                @foreach ($postCmts->comment as $key => $item)
                    <div class="fz-14 d-flex ms-3 mt-3 position-relative">
                        <img src="/fontend/img/{{ !$item->user->image ? 'avt-conan.jpg' : $item->user->image }}"
                            class="rounded-circle" style="width: 60px; height: 60px;" alt="">
                        <div class="ms-3">
                            <span class="fs-6">
                                <h6>{{ $item->user->name }}</h6>
                            </span>
                            <span>
                                <div class="fz-10 mb-2 text-primary">
                                    <i class="fa-regular fa-clock fz-10 "></i>
                                    <Span>Ngày Đăng: {{ $item->created_at }}</Span>
                                </div>
                            </span>
                            <p class="text-dark fw-medium fst-italic">{{ $item->content }}</p>
                        </div>
                        @if (Auth::id() == $item->user_id)
                            <div class="text-end position-absolute end-0">
                                <form method="POST" action="{{ route('comment.destroy', $item->id) }}"
                                    class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <button type="button"
                                        class="btn btn-outline-danger border-0 btn-delete-comment">Xóa</button>
                                </form>
                            </div>
                        @endif
                    </div>
                @endforeach
                {{-- <div class="text-center">
                    <div class="btn btn-outline-info text-secondary">Xem Thêm</div>
                </div> --}}
            </div>
        </div>
        <div class="col-3 mt-3">
            <ul class="list-group fz-14">
                <li class="list-group-item active list-group-item-info "><span class="">DANH MỤC SẢN PHẨM</span>
                </li>
                @foreach ($allCategories as $key => $item)
                    <li class="list-group-item p-0">
                        <div class="accordion accordion-flush " id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed fz-14" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $item->id }}"
                                        aria-expanded="false" aria-controls="flush-collapse{{ $item->id }}">
                                        {{ $item->name }}
                                    </button>
                                </h2>
                                <div id="flush-collapse{{ $item->id }}" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul class="nav flex-column">
                                            @foreach ($brandInCates as $key => $val)
                                                @if ($item->id == $val->id)
                                                    <li class="nav-item"><a class="nav-link"
                                                            href="{{ route('product.brand', ['id' => $val->brandId]) }}">{{ $val->brandName }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
            <ul class="list-group fz-14 mt-3">
                <li class="list-group-item active list-group-item-success ">
                    <span class="">TIN TỨC NỔI BẬT</span>
                </li>
                @foreach ($postOutStandings as $key => $item)
                    <li class="list-group-item p-0 mt-2">
                        <a href="{{ route('post.detail', ['id' => $item->id]) }}" class="list-group-item p-0">
                            <div class="bv d-flex">
                                <img src="/fontend/img/{{ $item->image }}" alt=""
                                    class="rounded-2 scale-hover object-fit-cover" width="110" height="65">
                                <div class="content ms-2">
                                    <a href="{{ route('post.detail', ['id' => $item->id]) }}"
                                        class="fz-12 fw-medium text-hover">{!! $item->title !!}</a>
                                    <br>
                                </div>
                            </div>
                        </a>
                        <hr class="mt-2 mb-1">
                    </li>
                @endforeach
            </ul>
            <div class="card mt-4">
                <li class="list-group-item active list-group-item-success pt-2 pb-2 bg-main">
                    <span class="p-3">DANH MỤC BÀI VIẾT</span>
                </li>
                <div class="card-body p-2 mt-2 mb-2 ms-2">
                    @foreach ($allPostCatagories as $key => $item)
                        <span class="border border-secondary rounded pb-1 me-2">
                            <span class="badge rounded-2 text-dark fz-14  m-1 fw-normal"><a
                                    href="{{ route('post.category', ['id' => $item->id]) }}">{{ $item->name }}</a></span>
                        </span>
                    @endforeach
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
<script>
    $(document).ready(function() {
        $('.btn-delete-comment').click(function() {
            var form = $(this).closest('form');

            swal({
                title: "Xác nhận",
                text: "Bạn có muốn xóa bình luận của bạn không?",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "Hủy",
                        value: false,
                        visible: true,
                        className: "",
                        closeModal: true,
                    },
                    confirm: {
                        text: "Xóa",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: true
                    }
                },
                dangerMode: true,
            }).then((isConfirm) => {
                if (isConfirm) {
                    form.submit();
                }
            });
        });

        @if (session('success'))
            swal({
                title: "Thành công!",
                text: "{{ session('success') }}",
                icon: "success",
                button: "OK",
            });
        @endif

        @if (session('error'))
            swal({
                title: "Lỗi!",
                text: "{{ session('error') }}",
                icon: "error",
                button: "OK",
            });
        @endif
    });
</script>
