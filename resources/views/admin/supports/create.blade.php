@extends('admin.supports.layouts.app')

@section('title', 'Criar Nova Dúvida')


@section('header')

<h1 class="text-lg text-black-500">Nova Dúvida</h1>

@endsection

@section('content')


<form action="{{ route('supports.store') }}" method="POST"> <!-- vai ser Susado o post para armazenar isso-->
    
    @include('admin.supports.partials.form') <!-- importando formulario dessa pasta -->
</form>
@endsection