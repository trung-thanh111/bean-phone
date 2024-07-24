<div class="bg-light">
    <div class="row ms-3  pt-3">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb container">
                <li class="breadcrumb-item"><a href="/">Trang Chủ</a></li>
                <li class="breadcrumb-item"><a href="/post">Bài Viết</a></li>
                <li class="breadcrumb-item active" aria-current="page">@php
                    $printed = false;
                @endphp
                    @foreach ($postInCategories as $key => $item)
                        @if ($item->categoryName > 1 && !$printed)
                            {{ $item->categoryName }}
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
<div class="container mb-5">
    <div class="row mb-5">
        <div class="col-9 mt-5">
            <h1 class="mb-4 mt-1 rounded-2 bg-light pt-3 pb-3 ps-3 fw-bold fs-4 text-uppercase">BÀI VIẾT
                @php
                    $printed = false;
                @endphp
                @foreach ($postInCategories as $key => $item)
                    @if ($item->categoryName > 1 && !$printed)
                        {{ $item->categoryName }}
                        @php
                            $printed = true;
                        @endphp
                    @endif
                @endforeach
            </h1>
            @foreach ($postInCategories as $key => $item)
                <div class="bv d-flex mb-1">
                    <img src="/fontend/img/{{ $item->image }}" class="scale-hover object-fit-cover" alt=""
                        style="width: 245px; height: 145px;">
                    <div class="content ms-4">
                        <div class="col-7">
                            <a href="{{ route('post.detail', ['id' => $item->id]) }}"
                                class="text-truncate text-hover fs-5 fw-medium custom-text w-100"
                                style="width: 100%">{!! $item->title !!}</a>
                        </div>
                        <span class="fz-14 d-flex mt-2">
                            Tác Giả: {{ $item->userName }}
                            <p class="ms-4 fz-14">Ngày Đăng: {{ $item->date_submit }}</p>
                        </span>
                        <div>
                            <p class="fz-14 mt-3 text-truncate text-hover custom-text" style="width: 680px;">
                                <a href="{{ route('post.detail', ['id' => $item->id]) }}">{!! $item->description !!}</a>
                            </p>
                        </div>
                    </div>
                </div>
                <hr class="border-1 text-dark mt-2 mb-1">
                </hr>
            @endforeach
            <div class="d-flex justify-content-center mt-5">
                {{ $postInCategories->links('pagination::bootstrap-4') }}
            </div>
        </div>
        <div class="col-3 mt-5">
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
            <ul class="list-group fz-14 mt-4">
                <li class="list-group-item active list-group-item-success "><span class="">BÀI VIẾT NỔI BẬT</span>
                </li>
                @foreach ($postOutStandings as $key => $item)
                    <li class="list-group-item p-0 mt-2">
                        <a href="{{ route('post.detail', ['id' => $item->id]) }}"
                            class="list-group-item p-0               ">
                            <div class="bv d-flex">
                                <img src="/fontend/img/{{ $item->image }}" alt=""
                                    class="rounded-2 scale-hover object-fit-cover" width="110" height="65">
                                <div class="content ms-2">
                                    <a href="{{ route('post.detail', ['id' => $item->id]) }}"
                                        class="fz-12 fw-medium text-hover">{!! $item->title !!}</a> <br>
                                </div>
                            </div>
                        </a>
                        <hr class="mt-2 mb-1">
                    </li>
                @endforeach
            </ul>
            <div class="card mt-4">
                <li class="list-group-item active list-group-item-success pt-2 pb-2 bg-main"><span class="p-3">DANH
                        MỤC
                        BÀI VIẾT</span></li>
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
</div>
