<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_id',
        'file',
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}