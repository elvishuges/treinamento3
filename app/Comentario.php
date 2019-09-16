<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = [
        'titulo',
        'conteudo',
        'post_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
