<h1>Nova Dúvida {{ $support->id }}</h1>

<x-alert/>

<form action="{{ route('supports.update', $support->id) }}" method="POST"> <!-- vai ser usado o post para armazenar isso-->

    @method('PUT') <!-- <input type="text" value="PUT" name="_method"> atualiza como se fosse assim o metodo POST para PUT pois nao é aceito-->
   
    @include('admin.supports.partials.form', ['support' => $support])

</form>