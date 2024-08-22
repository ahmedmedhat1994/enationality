<?php

namespace App\Models\Backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;


    public function files()
    {
        return $this->hasMany(RequestFiles::class,'request_id');
    }

    public function user_review()
    {
        return $this->belongsTo(User::class,'updated_by');
    }




    public function statusLabel()
    {
        switch ($this->status) {
            case 0: $result = ' <span class="badge  bg-primary    fw-bold fs-15px" >جديد</span>'; break;
            case 1: $result = ' <span class="badge  bg-danger    fw-bold fs-15px" >تصحيح الاخطاء</span>'; break;
            case 2: $result = ' <span class="badge  bg-info    fw-bold fs-15px" >حالة الدفع</span>'; break;
            case 3: $result = ' <span class="badge  bg-success    fw-bold fs-15px" >منتهي</span>'; break;
            case 4: $result = ' <span class="badge  bg-secondary   fw-bold fs-15px" >إعادة المراجعه</span>'; break;
            case 5: $result = ' <span class="badge  bg-secondary   fw-bold fs-15px" >مراجعة الدفع</span>'; break;
        }
        return $result;
    }

}
