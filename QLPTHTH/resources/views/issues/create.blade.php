@extends('layouts.app')

@section('content')
<h1>Thêm Vấn Đề Mới</h1>

<form action="{{ route('issues.store') }}" method="POST" style="margin: 50px 50px">
    @csrf
    <div class="mb-3">
        <label for="computer_name" class="form-label">Tên Máy Tính</label>
        <select class="form-select" name="computer_id" required>
            <option value="">-- Chọn Máy Tính --</option>
            @foreach ($computers as $computer)
                <option value="{{ $computer->id }}">{{ $computer->computer_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="reported_by" class="form-label">Người Báo Cáo</label>
        <input type="text" class="form-control" id="reported_by" name="reported_by" placeholder="Nhập tên người báo cáo" required>
    </div>
    <div class="mb-3">
        <label for="reperted_date" class="form-label">Thời Gian Báo Cáo</label>
        <input type="datetime-local" class="form-control" id="reported_date" name="reported_date" required>
    </div>
    <div class="mb-3">
        <label for="urgency" class="form-label">Mức Độ Sự Cố</label>
        <select class="form-select" id="urgency" name="urgency" required>
            <option value="Thấp">Low</option>
            <option value="Trung bình">Medium</option>
            <option value="Cao">High</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Trạng Thái</label>
        <select class="form-select" id="status" name="status" required>
            <option value="Đang xử lý">In Progress</option>
            <option value="Hoàn thành">Open</option>
            <option value="Hủy bỏ">Resolved</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
    <a href="{{ route('issues.index') }}" class="btn btn-secondary">Quay Lại</a>
</form>
@endsection
