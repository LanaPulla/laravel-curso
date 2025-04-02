 <!--  <inpu t type="hidden" value="{{ csrf_token() }}" name="_token"> cria um token unico para cada requisiçao para validar se nao é falsa a req -->
@csrf() <!-- faz isso aqui de cima automaticamente -->
<input type="text" name="subject" placeholder="Assunto" value="{{ $support->subject ?? old('subject') }}">  <!-- nome dos inputs igual as colunas do banco para facilitar na hora de guardar os dados no bd-->>
<textarea name="body" cols="30" rows="5" placeholder="Descrição">{{ $support->body ?? old('body') }}</textarea> <!-- {{ old('body') }} mantem os antigos dados se der erro -->
<button type="submit">Enviar</button>