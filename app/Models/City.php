<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'state'];
    public $timestamps = true;

    // Relacionamento: uma cidade pode ter vários médicos
    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}
