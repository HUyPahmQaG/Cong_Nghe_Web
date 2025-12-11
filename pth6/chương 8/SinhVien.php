<?php 
namespace App\Models; 
 
// DÒNG NÀY ĐANG BỊ THIẾU HOẶC SAI!
use Illuminate\Database\Eloquent\Factories\HasFactory; 
 
use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model 
{ 
    // DÒNG NÀY GÂY LỖI NẾU KHÔNG CÓ DÒNG IMPORT Ở TRÊN
    use HasFactory; 

    // TODO 8: Thêm mảng $fillable 
    protected $fillable = [ 
        'ten_sinh_vien', 
        'email', 
    ]; 
}