@extends('layouts.app')

@section('content')
<h1>Sửa Vấn Đề</h1>

<form action="{{ route('issues.update', $issue->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="computer_name" class="form-label">Tên Máy Tính</label>
        <input type="text" class="form-control" id="computer_name" name="computer_name" value="{{ $issue->computer->computer_name }}" required>
    </div>
    <div class="mb-3">
        <label for="reported_by" class="form-label">Người Báo Cáo</label>
        <input type="text" class="form-control" id="reported_by" name="reported_by" value="{{ $issue->reported_by }}" required>
    </div>
    <div class="mb-3">
        <label for="reperted_date" class="form-label">Thời Gian Báo Cáo</label>
        <input type="datetime-local" class="form-control" id="reported_date" name="reported_date" value="{{ date('Y-m-d\TH:i', strtotime($issue->reported_date)) }}" required>
    </div>
    <div class="mb-3">
        <label for="urgency" class="form-label">Mức Độ Sự Cố</label>
        <select class="form-select" id="urgency" name="urgency" required>
            <option value="Thấp" {{ $issue->urgency == 'Thấp' ? 'selected' : '' }}>Low</option>
            <option value="Trung bình" {{ $issue->urgency == 'Trung bình' ? 'selected' : '' }}>Medium</option>
            <option value="Cao" {{ $issue->urgency == 'Cao' ? 'selected' : '' }}>High</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Trạng Thái</label>
        <select class="form-select" id="status" name="status" required>
            <option value="Đang xử lý" {{ $issue->status == 'Đang xử lý' ? 'selected' : '' }}>In Progress</option>
            <option value="Hoàn thành" {{ $issue->status == 'Hoàn thành' ? 'selected' : '' }}>Open</option>
            <option value="Hủy bỏ" {{ $issue->status == 'Hủy bỏ' ? 'selected' : '' }}>Resolved</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Cập Nhật</button>
    <a href="{{ route('issues.index') }}" class="btn btn-secondary">Quay Lại</a>
</form>
@endsection
