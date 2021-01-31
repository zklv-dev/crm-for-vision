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
        return Carbon::parse($this->created_at)->format('m.d.Y');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
