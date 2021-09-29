<?php

namespace App\Models;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fridge extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'created_at',
        'memo',
        'updated_at', 
        'expiry_date', 
        'quantity', 
        'now', 
        'checked[]', 
        'warning'
    ];

    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required|max:191',
    );
}
