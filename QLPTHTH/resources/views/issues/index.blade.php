@extends('layouts.app')

@section('content')
<h1 class="mb-4">Danh Sách Phòng Thực Hành Tin Học</h1>
<!-- Nút Thêm Mới -->
<a href="{{ route('issues.create') }}" class="btn btn-primary mb-3">Thêm Phòng Mới</a>

<!-- Bảng Danh Sách -->
<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Tên Máy Tính</th>
            <th>Người Báo Cáo</th>
            <th>Thời Gian Báo Cáo</th>
            <th>Mức Độ</th>
            <th>Trạng Thái</th>
            <th>Hành Động</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($issues as $issue)
        <tr>
            <td>{{ $issue->id }}</td>
            <td>{{ $issue->computer->computer_name }}</td>
            <td>{{ $issue->reported_by }}</td>
            <td>{{ $issue->reperted_date }}</td>
            <td>{{ $issue->urgency }}</td>
            <td>{{ $issue->status }}</td>
            <td>
            
                <a href="{{ route('issues.edit', $issue->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                <form action="{{ route('issues.destroy', $issue->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center">Không có vấn đề nào được tìm thấy.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<!-- Phân Trang -->
<div class="d-flex justify-content-start">
    <div class="pagination-sm">
        {{ $issues->links('pagination::bootstrap-5') }}
    </div>
</div>

@endsection
