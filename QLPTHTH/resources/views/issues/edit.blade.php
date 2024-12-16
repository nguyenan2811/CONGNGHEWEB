<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Quản Lý Phòng Thực Hành Tin Học')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1 style="margin: 50px 50px">Sửa vấn đề</h1>
        <form action="{{ route('issues.update', $issue->id) }}" method="POST" style="margin: 50px 50px">
            @csrf
            @method('PUT') 
            
            <div class="mb-3">
                <label for="computer_id" class="form-label">Máy tính</label>
                <select class="form-control" id="computer_id" name="computer_id" required>
                    <option value="" disabled>Chọn máy tính</option>
                    @foreach($computers as $computer)
                        <option value="{{ $computer->id }}" 
                            {{ $computer->id == $issue->computer_id ? 'selected' : '' }}>
                            {{ $computer->computer_name }}
                        </option>
                    @endforeach
                </select>
            </div>
        
            <div class="mb-3">
                <label for="reported_by" class="form-label">Người báo cáo</label>
                <input type="text" class="form-control" id="reported_by" name="reported_by" value="{{ old('reported_by', $issue->reported_by) }}" required>
            </div>
        
            <div class="mb-3">
                <label for="reported_date" class="form-label">Thời gian báo cáo</label>
                <input type="datetime-local" class="form-control" id="reperted_date" name="reperted_date" value="{{ old('reperted_date', $issue->reported_date)}}" required>
            </div>
        
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả</label>
                <textarea class="form-control" id="description" name="description" required>{{ old('description', $issue->description) }}</textarea>
            </div>
        
            <div class="mb-3">
                <label for="urgency" class="form-label">Mức độ sự cố</label>
                <select class="form-control" id="urgency" name="urgency" required>
                    <option value="Low" {{ $issue->urgency == 'Low' ? 'selected' : '' }}>Low</option>
                    <option value="Medium" {{ $issue->urgency == 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="High" {{ $issue->urgency == 'High' ? 'selected' : '' }}>High</option>
                </select>
            </div>
        
            <div class="mb-3">
                <label for="status" class="form-label">Trạng thái</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Open" {{ $issue->status == 'Open' ? 'selected' : '' }}>Open</option>
                    <option value="In Progress" {{ $issue->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="Resolved" {{ $issue->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
                </select>
            </div>
        
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('issues.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
</div>
</body>
</html>
