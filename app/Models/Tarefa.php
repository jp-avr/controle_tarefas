<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $table = 'tarefas';

    protected $fillable = [
        'user_id',
        'tarefa_nome',
        'tarefa_data_limite_conclusao',
        'created_at',
        'updated_at'
    ];

    protected $primaryKey = 'tarefa_id';

    use HasFactory;

    public function usuarios()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
