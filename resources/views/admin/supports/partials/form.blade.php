 <!--  <inpu t type="hidden" value="{{ csrf_token() }}" name="_token"> cria um token unico para cada requisiçao para validar se nao é falsa a req -->
<!-- @csrf() faz isso aqui de cima automaticamente -->
 
<x-alert/>

@csrf()
<input type="text" placeholder="Assunto" name="subject" value="{{ $support->subject ?? old('subject') }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
<textarea name="body" cols="30" rows="5" placeholder="Descrição" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">{{ $support->body ?? old('body') }}</textarea>
<button type="submit" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Enviar</button>