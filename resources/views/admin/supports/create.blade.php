<h1>Nova Dúvida</h1>

@if ($errors->any()) <!-- se existir um erro-->
    @foreach($errors->all() as $error) <!-- forearch pq tem multiplos campos q podem dar erro. joga os erros e joga para $error -->
        {{ $error }} <!-- e depois imprime o erro na tela -->
    @endforeach
@endif
 
<form action="{{ route('supports.store') }}" method="POST"> <!-- vai ser usado o post para armazenar isso-->
    <!--  <inpu t type="hidden" value="{{ csrf_token() }}" name="_token"> cria um token unico para cada requisiçao para validar se nao é falsa a req -->
    @csrf() <!-- faz isso aqui de cima automaticamente -->
    <input type="text" name="subject" placeholder="Assunto" value="{{ old('subject') }}">  <!-- nome dos inputs igual as colunas do banco para facilitar na hora de guardar os dados no bd-->>
    <textarea name="body" cols="30" rows="5" placeholder="Descrição">{{ old('body') }}</textarea> <!-- {{ old('body') }} mantem os antigos dados se der erro -->
    <button type="submit">Enviar</button>
</form>