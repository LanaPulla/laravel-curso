<h1>LiSTAGEM DE SUPORTES</h1>
<!-- nao abre arquivo < ? php em arquivo blade pois fica muito exposto codigo--> 

<a href=" {{ route('supports.create') }} ">Criar dúvida</a> <!-- esta mandando para a pag de form pelo nome dela em routes -->

<table>

    <thead>
        <th>assunto</th>
        <th>status</th>
        <th>descrição</th>
        <th></th>
    </thead> 
    <tbody>

        @foreach($supports->items() as $support) <!-- para cada em suportes... -->
            <tr>
                <td>{{ $support->subject }}</td> <!-- ...mostre tal coluna 'subject', 'status' -->
                <td>{{ getStatusSupport($support->status) }}</td>
                <td>{{ $support->body }}</td>
                <td> <a href= "{{ route('supports.show', $support->id ) }}">Ver</a>
                     <a href=" {{ route('supports.edit', $support->id ) }} ">Editar</a>
                </td> <!-- indo para a pag support/{id} para mostrar mais do usuario. É necessário passar o id aqui se nao da erro -->
            </tr>
        @endforeach
    </tbody>
</table>

<x-pagination 
    :paginator="$supports"
    :appends="$filters"/>
