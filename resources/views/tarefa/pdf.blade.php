<html>
        <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

                <style>
                        .page-break {
                                page-break-after: always;
                        }

                        .titulo {
                                border: 1px;
                                background-color: grey;
                                text-align: center;
                                width: 100%;
                                text-transform: uppercase;
                                font-weight: bold;
                                margin-bottom: 25px;
                        }

                        table th {
                                text-align: left;
                        }

                </style>
        </head>

        <body>              
                <div class="titulo">Lista de Tarefas</div>

                <table style="width:100%">
                        <thead>
                                <tr>
                                        <th>ID</th>
                                        <th>TAREFA</th>
                                        <th>LIMITE CONCLUSÃO</th>
                                </tr>
                        </thead>

                        <tbody>
                                @foreach($tarefas as $tarefa)
                                        <tr>
                                                <td>{{ $tarefa->tarefa_id }}</td>
                                                <td>{{ $tarefa->tarefa_nome }}</td>
                                                <td>{{ date('d/m/Y', strtotime($tarefa->tarefa_data_limite_conclusao)) }}</td>
                                        </tr>
                                @endforeach
                        </tbody>
                </table>

                <div class="page-break"></div>
                <h2>Página 2</h2>
        </body>
</html>