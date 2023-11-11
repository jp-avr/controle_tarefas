<?php

namespace App\Exports;

use App\Models\Tarefa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TarefasExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tarefa::all();
    }

    public function headings():array
    {
        return ['ID TAREFA','ID USUARIO','TAREFA','DATA LIMITE','HORA DA CRIAÇÃO', 'HORA DA ATUALIZAÇÃO'];
    }

    public function map($linha):array
    {
        return [
            $linha->tarefa_id,
            $linha->usuarios->id,
            $linha->tarefa_nome,
            date('d/m/Y', strtotime($linha->tarefa_data_limite_conclusao)),
            $linha->created_at,
            $linha->updated_at,
        ];
    }
}
