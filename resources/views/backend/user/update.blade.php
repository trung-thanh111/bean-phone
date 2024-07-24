<div class="wrapper">
    <div class="title-create pr-4 pl-4 pb-4">
        <h4 class="font-weight-bold text-uppercase">Cập nhật thành viên</h4>
        <p>Bạn hãy chắc chắn thông tin mà bạn đang nhập đúng với những gì đang có!</p>
    </div>
    <form action="{{ route('user.edit', ['id' => $user->id]) }}" method="POST" class="p-2" enctype="multipart/form-data">
        @csrf
        <div class="row pr-3 pl-3 pt-3 pb-0">
            <div class="form-group col-md-12">
                <label class="font-weight-bold">Tên thành viên:</label>
                <input type="text" name="name" class="form-control rounded-0 pt-1 pb-1"
                    value="{{ old('name', $user->name) }}">
                @if ($errors->has('name'))
                    <span class="text-danger fz-14">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>
        <div class="row pr-3 pl-3 pt-3">
            <div class="form-group col-md-6">
                <label class="font-weight-bold">Email:</label>
                <input type="text" name="email" class="form-control rounded-0 pt-1 pb-1"
                    value="{{ old('email', $user->email) }}" readonly>
                    <span class="text-danger fz-14">Bạn không thể chỉnh sửa email!</span>
            </div>
            <div class="form-group col-md-6">
                <label class="font-weight-bold">Mật khẩu:</label>
                <input type="password" name="password" class="form-control rounded-0 pt-1 pb-1"
                    value="{{ old('password', $user->password) }}" readonly>
                    <span class="text-danger fz-14">Bạn không thể thay đổi mật khẩu!</span>
            </div>
        </div>
        <div class="form-group col-12">
            <label class="font-weight-bold">Mô tả:</label>
            <textarea type="text" name="description" class="form-control rounded-0 pt-1 ps-2 pe-2 pb-1" rows="5"
                placeholder="Nhập mô tả">{{ old('description', $user->description) }}</textarea>
            @if ($errors->has('description'))
                <span class="text-danger fz-14">{{ $errors->first('description') }}</span>
            @endif
        </div>
        <div class="row pr-3 pl-3 pt-3">
            <div class="form-group col-md-8">
                <label class="font-weight-bold">Địa chỉ:</label>
                <input type="text" name="address" class="form-control rounded-0 pt-1 pb-1"
                    value="{{ old('address' , $user->address) }}">
                @if ($errors->has('address'))
                    <span class="text-danger fz-14">{{ $errors->first('address') }}</span>
                @endif
            </div>
            <div class="form-group col-md-4">
                <label class="font-weight-bold">Số điện thoại:</label>
                <input type="text" name="phone" class="form-control rounded-0 pt-1 pb-1"
                    value="{{ old('phone', $user->phone) }}">
                @if ($errors->has('phone'))
                    <span class="text-danger fz-14">{{ $errors->first('phone') }}</span>
                @endif
            </div>
        </div>
        <div class="row pr-3 pl-3 pt-3">
            
            <div class="form-group col-md-4">
                <label for="inputState" class="font-weight-bold">Ngày sinh:</label>
                <input type="date" name="birthday"  class="form-control rounded-0" value="{{ old('birthday', $user->birthday) }}">
            </div>
            <div class="form-group col-md-4">
                <label for="inputState" class="font-weight-bold">Quyền:</label>
                <select class="form-control rounded-0 setupSelect2" name="user_catalogue_id">
                    <option value="0">Chọn nhóm thành viên</option>
                    @foreach($userCatalogue as $key => $item)
                    <option value="{{ $item->id }}" {{ old('user_catalogue_id', $user->user_catalogue_id) == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('user_catalogue_id'))
                    <span class="text-danger fz-14">{{ $errors->first('user_catalogue_id') }}</span>
                @endif
            </div>
            <div class="form-group col-md-4">
                <label for="inputState" class="font-weight-bold">Trạng thái:</label>
                <select class="form-control rounded-0 setupSelect2" name="publish">
                    <option value="" >Chọn trạng thái</option>
                    <option value="1" {{ old('publish',$user->publish) == 1 ? 'selected' : '' }}>Hiển thị</option>
                    <option value="0" {{ old('publish',$user->publish) == 0 ? 'selected' : '' }}>Ẩn</option>
                </select>
                @if ($errors->has('publish'))
                    <span class="text-danger fz-14">{{ $errors->first('publish') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group col-md-6 pt-3">
            <label for="inputState" class="font-weight-bold">Hình ảnh:</label> <br>
            <input type="file" name="image" value="{{ old('image') }}">
            @if ($errors->has('image'))
                <span class="text-danger fz-14">{{ $errors->first('image') }}</span>
            @endif
        </div>
        <img src="/upload/user/{{ $user->image }}" alt="" class="object-fit-cover ml-2" width="120" >
        <div class="form-group col-12 text-right ps-2 pe-2">
            <button type="submit" class="btn btn-primary rounded-0 pl-4 pr-4">Xác Nhận</button>
        </div>
    </form>
</div>
