<h1>Detalhes da duvida {{ $support->id }}</h1> <!-- mostra o id que foi cliado -->

<ul>
    
    <li>Assunto: {{ $support->subject }}</li>
    <li>Status: {{ $support->status }}</li>
    <li>Descrição: {{ $support->body }}</li>

<form action="{{ route('supports.detroy', $support->id) }}" method="post"> <!-- tem que ser em um form pois é um submit  -->
    @csrf() <!-- valida o token unico da request -->
    @method('DELETE') <!-- troca o method padrao POST por DELETE-->
    <button type="submit">Excluir</button>
</form>
</ul>