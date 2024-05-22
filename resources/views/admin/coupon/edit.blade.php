@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Phiếu Mua Hàng</h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h4>Cập Nhật Phiếu Mua Hàng</h4>

        </div>
        <div class="card-body">
            <form action="{{ route('admin.coupon.update', $coupon->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Tên</label>
                    <input type="text" name="name" class="form-control" value="{{ $coupon->name }}">
                </div>

                <div class="form-group">
                    <label>Mã Giarm Gía</label>
                    <input type="text" name="code" class="form-control" value="{{ $coupon->code }}">
                </div>

                <div class="form-group">
                    <label>Số Lượng Phiếu Giảm Gía</label>
                    <input type="text" name="quantity" class="form-control" value="{{ $coupon->quantity }}">
                </div>

                <div class="form-group">
                    <label>Gía Mua Tối Thiểu</label>
                    <input type="text" name="min_purchase_amount" class="form-control" value="{{ $coupon->min_purchase_amount }}">
                </div>

                <div class="form-group">
                    <label>Hạn Sử Dụng</label>
                    <input type="date" name="expire_date" class="form-control" value="{{ $coupon->expire_date }}">
                </div>

                <div class="form-group">
                    <label>Loại Giảm Giá</label>
                    <select name="discount_type" class="form-control" id="">
                        <option @selected($coupon->discount_type === 'percent') value="percent">Phần trăm</option>
                        <option @selected($coupon->discount_type === 'amount') value="amount">Gía tiền ({{ config('settings.site_currency_icon') }})</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Gía Giảm</label>
                    <input type="text" name="discount" class="form-control" value="{{ $coupon->discount }}">
                </div>

                <div class="form-group">
                    <label>Trạng thái</label>
                    <select name="status" class="form-control" id="">
                        <option @selected($coupon->status === 1) value="1">Hoạt Động</option>
                        <option @selected($coupon->status === 0) value="0">Ngưng Hoạt Động</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</section>
@endsection
