@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Thanh trượt</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Cập nhật thanh trượt</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <div id="image-preview" class = "image-preview">
                            <label for="image-upload" id="image-label">Chọn ảnh</label>
                            <input type="file" name="image" id="image-upload" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Lời đề nghị</label>
                        <input type="text" name="offer" class="form-control" value="{{ $slider->offer }}">
                    </div>

                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input type="text" name="title" class="form-control" value="{{ $slider->title }}">
                    </div>

                    <div class="form-group">
                        <label>Phụ đề</label>
                        <input type="text" name="sub_title" class="form-control" value="{{ $slider->sub_title }}">
                    </div>


                    <div class="form-group">
                        <label>Mô tả ngắn</label>
                        <textarea name="short_description" class="form-control" >{{ $slider->short_description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Nút liên kết</label>
                        <input type="text" name="button_link" class="form-control" value="{{ $slider->button_link }}">
                    </div>
                    
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control" id="">
                            <option @selected($slider->status === 1) value="1">Hoạt động</option>
                            <option @selected($slider->status === 0) value="0">Ngừng hoạt động</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>

                </form>
            </div>
        </div>

    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('.image-preview').css({
                'background-image': 'url({{ asset($slider->image) }})',
                'background-size': 'cover',
                'background-position':'center center'
            })
        })
    </script>

@endpush
