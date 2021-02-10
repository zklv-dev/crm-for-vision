<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */

    // public function __construct()
    // {
    //     $this->comment = "default value"; //or fetch from db.
    // }

    protected $fillable = [
        'name', 'detail', 'user_id', 'age', 'phone_number', 'city', 'where', 'results', 'necessary', 'flag', 'user_new_id', 'comment', 'recall'
    ];

    public function getClientDate()
    {
        return Carbon::parse($this->created_at)->format('Y-m-d H:i');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('client_id');
    }

    public function latestComment()
    {
        return $this->hasOne(Comment::class)->latest();
    }
}
