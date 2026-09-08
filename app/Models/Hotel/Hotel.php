<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Apartment\Apartment;

class Hotel extends Model
{
    use HasFactory;

    protected $table = 'hotels';

    protected $fillable = [
        'name',
        'image',
        'description',
        'location',
        'rating',
    ];

    public function apartments()
    {
        return $this->hasMany(Apartment::class, 'hotel_id');
    }
}
