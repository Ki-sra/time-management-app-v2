<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Task extends Model {
    protected $fillable = ['profile_id','title','notes','category','start_time','end_time','repeat','priority','completed','tags'];
    protected $casts = ['tags'=>'array'];
    public function profile(){ return $this->belongsTo(Profile::class); }
}