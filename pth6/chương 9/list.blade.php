@extends('layouts.app') 

@section('content')

<h2>Quản Lý Sinh Viên (Eloquent ORM)</h2>

<div style="border: 1px solid #ccc; padding: 15px; margin-bottom: 20px;">
    <h3>Thêm Sinh Viên Mới</h3>
    
    <form action="{{ route('sinhvien.store') }}" method="POST">
        
        @csrf 

        <label for="ten_sinh_vien">Tên sinh viên:</label>
        <input type="text" id="ten_sinh_vien" name="ten_sinh_vien" required style="width: 300px;"><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required style="width: 300px;"><br><br>

        <button type="submit" style="padding: 5px 15px;">Lưu Sinh Viên</button>
    </form>
</div>

<h3>Danh Sách Sinh Viên</h3>
<table border="1" cellpadding="10" cellspacing="0" style="width: 100%;">
    <thead>
        <tr style="background-color: #f4f4f4;">
            <th>ID</th>
            <th>Tên Sinh Viên</th>
            <th>Email</th>
            <th>Ngày Tạo</th>
        </tr>
    </thead>
    <tbody>
        @foreach($danhSachSV as $sv)
        <tr>
            <td>{{ $sv->id }}</td>
            <td>{{ $sv->ten_sinh_vien }}</td> 
            <td>{{ $sv->email }}</td>
            <td>{{ $sv->created_at }}</td>
        </tr>
        @endforeach
        
        @if($danhSachSV->isEmpty())
        <tr>
            <td colspan="4" style="text-align: center; color: gray;">
                Chưa có sinh viên nào. Hãy thêm sinh viên mới!
            </td>
        </tr>
        @endif
    </tbody>
</table>

@endsection