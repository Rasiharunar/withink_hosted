<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relay extends Model
{
    use HasFactory;
    protected $table = 'relays';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id','relay1', 'relay2'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
