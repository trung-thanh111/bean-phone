<div class="bg-light  ">
    <div class="row ms-3  pt-3">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb container">
                <li class="breadcrumb-item"><a href="/">Trang Chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Liên Hệ</li>
            </ol>
        </nav>

    </div>
</div>
</div>
<div class="container mb-5">
    <div class="row mb-5">
        <div class="col fz-14">
            <h1 style="font-size: 16px; font-weight: bold;" class="mb-3 mt-3">BẠN ĐANG CÓ THẮC MẮC VỀ WEBSITE CỦA
                CHÚNG TÔI? lIÊN HỆ NGAY NÀO.</h1>
            <div class="des_foo mb-2">
                Với sứ mệnh "Khách hàng là ưu tiên số 1" chúng tôi luôn mạng lại giá trị tốt nhất
            </div>
            <div class="time_work">
                <div class="item mb-2">
                    <b>Địa chỉ:</b>

                    70 Lữ Gia, Phường 15, Quận 11, TP. Hồ Chí Minh

                </div>
                <div class="item mb-2">
                    <b>Hotline:</b> <a href="tel:19006750" title="1900 6750" class="fw-bold text-warning">1900
                        6750</a>
                </div>
                <div class="item mb-2">
                    <b>Email:</b> <a href="mailto:thanhtrung@gmail.com" title=""
                        class="fw-bold text-warning">thanhtrung@gmail.com</a>
                </div>

            </div>
            <h1 style="font-size: 16px; font-weight: bold;" class="mb-3 mt-3">LIÊN HỆ VỚI CHÚNG TÔI NGAY </h1>
            <form class="row g-3" method="POST" action="{{ route('contact.sendmail') }}">
                @csrf
                <div class="col-md-6 mb-2">
                    <input type="text" name="name" class="form-control rounded-0 fz-14" placeholder="Họ Và Tên"
                        value="{{ old('name', Auth::check() ? Auth::user()->name : '') }}" required>
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" name="phone" class="form-control rounded-0 fz-14"
                        placeholder="Số điện Thoại"
                        value="{{ old('phone', Auth::check() ? Auth::user()->phone : '') }}" required>
                </div>
                <div class="col-md-12 mb-2">
                    <input type="email" name="email" class="form-control rounded-0 fz-14" placeholder="Email"
                        value="{{ old('email', Auth::check() ? Auth::user()->email : '') }}" required>
                </div>
                <div class="form-floating">
                    <textarea class="form-control rounded-0 fz-14" name="content" id="floatingTextarea2" style="height: 140px" required>{{ old('content') }}</textarea>
                    <label for="floatingTextarea2 ps-2">Nội Dung</label>
                </div>
                <div class="col-12 mt-4 text-end">
                    <button type="submit" class="btn btn-info fw-bold text-white  text-end rounded-1">Xác nhận</button>
                </div>
            </form>

        </div>
        <div class="col">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.6440363847046!2d106.61059177480578!3d10.838529389314038!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752bd6150bb24d%3A0x77a11952d458f48b!2zOTggVMOibiBUaOG7m2kgTmjhuqV0IDUsIFTDom4gVGjhu5tpIE5o4bqldCwgUXXhuq1uIDEyLCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1710782005913!5m2!1svi!2s"
                width="530" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
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