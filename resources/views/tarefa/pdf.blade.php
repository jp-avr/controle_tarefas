<h1>Lista de Tarefas</h1>

<table>
        <thead>
                <tr>
                        <th>ID</th>
                        <th>TAREFA</th>
                        <th>LIMITE CONCLUSÃO</th>
                </tr>
        </thead>

        <tbody>
                @foreach($tarefas as $key => $tarefa)
                        <tr>
                                <td>{{ $tarefa->tarefa_id }}</td>
                                <td>{{ $tarefa->tarefa_nome }}</td>
                                <td>{{ $tarefa->tarefa_data_limiete_conclusao }}</td>
                        </tr>
                @endforeach
        </tbody>
</table>