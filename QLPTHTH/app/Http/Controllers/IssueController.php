<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use App\Models\Computer; // Đảm bảo đã import model Computer


class IssueController extends Controller
{
    // Hiển thị danh sách các đồ án KHÔNG PHÂN TRANG
    // public function index()
    // {
    //     $issues = Issue::with('student')->get(); // Lấy dữ liệu đồ án và sinh viên liên quan
    //     return view('issues.index', compact('issues'));
    // }

    //Hiển thị danh sách các đồ án kiểu CÓ PHÂN TRANG dùng paginate
    public function index()
{
    $issues = Issue::with('computer')->paginate(50);
    return view('issues.index', compact('issues'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $computers = Computer::all();
        return view('issues.create', compact('computers'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'computer_name' => 'required|string|max:255',
            'version_name' => 'required|string|max:255',
            'reporter_name' => 'required|string|max:255',
            'report_time' => 'required|date',
            'severity' => 'required|string',
            'status' => 'required|string',
        ]);
    
        // Lưu dữ liệu vào cơ sở dữ liệu
        Issue::create($validatedData);
    
        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được thêm thành công!');
    }
    
    


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $issue = Issue::findOrFail($id); // Lấy dữ liệu từ DB
    return view('issues.edit', compact('issue')); // Truyền $issue sang view
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'computer_name' => 'required|string|max:255',
            'version_name' => 'required|string|max:255',
            'reporter_name' => 'required|string|max:255',
            'report_time' => 'required|date',
            'severity' => 'required|string',
            'status' => 'required|string',
        ]);
    
        // Tìm và cập nhật dữ liệu
        $issue = Issue::findOrFail($id);
        $issue->update($validatedData);
    
        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được cập nhật thành công!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $issues = Issue::findOrFail($id);
        $issues->delete();
        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được xóa!');
    }
    
}
