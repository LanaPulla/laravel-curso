
@extends('admin.supports.layouts.app')

@section('title', 'Editar Dúvida { $support->subject }')


@section('header')

<h1 class="text-lg text-black-500">Dúvida: {{ $support->subject }}</h1>

@endsection

@section('content')
<x-alert/>

<form action="{{ route('supports.update', $support->id) }}" method="POST"> <!-- vai ser usado o post para armazenar isso-->

    @method('PUT') <!-- <input type="text" value="PUT" name="_method"> atualiza como se fosse assim o metodo POST para PUT pois nao é aceito-->
   
    @include('admin.supports.partials.form', ['support' => $support])

</form>
@endsection