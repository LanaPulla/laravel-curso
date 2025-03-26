<h1>Detalhes da duvida {{ $support->id }}</h1> <!-- mostra o id que foi cliado -->

<ul>
    
    <li>Assunto: {{ $support->subject }}</li>
    <li>Status: {{ $support->status }}</li>
    <li>Descrição: {{ $support->body }}</li>

<form action="{{ route('supports.detroy', $support->id) }}" method="post">
    @csrf()
    @method('DELETE')
    <button type="submit">Excluir</button>
</form>
</ul>