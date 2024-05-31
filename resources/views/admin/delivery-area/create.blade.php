@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Khu Vực Mua Hàng</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Thêm Mới Khu Vực</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.delivery-area.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf



                    <div class="form-group">
                        <label>Khu Vực Mua Hàng</label>
                        <input type="text" name="area_name" class="form-control">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Thời Gian Giao Hàng Tối Thiểu</label>
                                <input type="text" name="min_delivery_time" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Thời Gian Giao Hàng Tối Đa</label></label>
                                <input type="text" name="max_delivery_time" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phí Giao Hàng</label>
                                <input type="text" name="delivery_fee" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control" id="">
                                    <option value="1">Hoạt động</option>
                                    <option value="0">Ngưng hoạt động</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Tạo mới</button>

                </form>
            </div>
        </div>

    </section>
@endsection
