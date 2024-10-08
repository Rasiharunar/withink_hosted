<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relay extends Model
{
    use HasFactory;
    protected $table = 'relays';
    protected $primaryKey = 'id';
    protected $fillable = ['relay1', 'relay2'];
}
