<div class="wrapper p-2">
    <div class="title-create pl-4 pb-4">
        <h4 class="font-weight-bold text-uppercase mb-3">Xóa Đơn hàng</h4>
        <div class="luuy fz-14">
            <p>Hãy xác nhận thông tin thật kỹ trước khi xóa dữ liệu từ website!</p>
        </div>
    </div>
    <div class="row pr-4 pl-4 mt-3">
        <div class="col-md-6">
            <div class="title-destroy">
                <h5 class="font-weight-bold text-uppercase">
                    Xóa dữ liệu
                </h5>
            </div>
            <div class="fz-14">
                <p class="mb-1">Bạn hãy chắc chắn muốn xóa thông tin đơn hàng <strong class="text-danger">id =
                        {{ $order->id }}</strong>.</p>
                <p>Sau khi xóa thông tin đơn hàng sẽ không thể phục hồi!</p>
            </div>
        </div>
        <div class="col-md-6">
            <form action="{{ route('order.destroy', ['id' => $order->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="mb-4">
                    <label class="form-label">Mã đơn hàng:</label>
                    <input type="text" class="form-control rounded-0" value="{{ $order->id }}" readonly>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="submit w-50 d-flex ">
                        <a href="{{ route('admin.orders') }}"
                            class="rounded-1 text-end form-control btn btn-secondary text-uppercase fz-14 font-weight-bold mr-2">
                            Hủy</a>
                        <button type="submit" class="rounded-1 text-end form-control btn btn-danger text-uppercase fz-14 font-weight-bold pr-2 pl-2">
                            Xóa dữ liệu
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@if (session('warning'))
    <script>
        swal({
            title: "Cảnh báo!",
            text: "{{ session('warning') }}",
            icon: "warning",
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
