<h1>Nova Dúvida {{ $support->id }}</h1>

@if ($errors->any()) <!-- se existir um erro-->
    @foreach($errors->all() as $error) <!-- forearch pq tem multiplos campos q podem dar erro. joga os erros e joga para $error -->
        {{ $error }} <!-- e depois imprime o erro na tela -->
    @endforeach
@endif

<form action="{{ route('supports.update', $support->id) }}" method="POST"> <!-- vai ser usado o post para armazenar isso-->
  
    @csrf() <!-- cria um token unico para cada requisiçao para validar se nao é falsa a req -->
    @method('PUT') <!-- <input type="text" value="PUT" name="_method"> atualiza como se fosse assim o metodo POST para PUT pois nao é aceito-->
    <input type="text" name="subject" placeholder="Assunto" value="{{ $support->subject }}"> <!-- nome dos inputs igual as colunas do banco para facilitar na hora de guardar os dados no bd-->>
    <textarea name="body" cols="30" rows="5" placeholder="Descrição">{{ $support->body }}</textarea>
    <button type="submit">Enviar</button>

</form>