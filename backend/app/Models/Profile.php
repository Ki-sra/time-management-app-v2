<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model {
    protected $fillable = ['user_id','name','password_hash','settings'];
    protected $casts = ['settings' => 'array'];

    public function user(){ return $this->belongsTo(User::class); }
    public function tasks(){ return $this->hasMany(Task::class); }
}