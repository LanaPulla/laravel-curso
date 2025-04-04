@extends('admin.supports.layouts.app')

@section('title', 'Detalhes da Dúvida { $support->subject }')


@section('header')

<h1 class="text-lg text-black-500">Dúvida: {{ $support->subject }}</h1>
 
@endsection

@section('content')
<x-alert/>

<ul>
    
    <li>Assunto: {{ $support->subject }}</li>
    <li>Status: {{ $support->status }}</li>
    <li>Descrição: {{ $support->body }}</li>

<form action="{{ route('supports.detroy', $support->id) }}" method="post"> <!-- tem que ser em um form pois é um submit  -->
    @csrf() <!-- valida o token unico da request -->
    @method('DELETE') <!-- troca o method padrao POST por DELETE-->
    <button type="submit">Excluir</button>
    <style>
        button{
            background-color:rgb(163, 57, 57); /* Red */
            border: solid 1px;
            border-color: rgb(107, 73, 71);
            border-radius: 2px;
            color: white;
            padding: 10px 8px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style
</form>
</ul>
@endsection

