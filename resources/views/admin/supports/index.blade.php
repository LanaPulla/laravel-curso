@extends('admin.supports.layouts.app')

@section('title', 'Fórum')

@section('header')
    @include('admin.supports.partials.header', compact('supports'))
@endsection

@section('content')

<!-- nao abre arquivo < ? php em arquivo blade pois fica muito exposto codigo--> 

<!-- <a href=" {{ route('supports.create') }} ">Criar dúvida</a>    esta mandando para a pag de form pelo nome dela em routes -->


@include('admin.supports.partials.content')

<x-pagination 
    :paginator="$supports"
    :appends="$filters"/>

<!-- aqui estamos passando o paginator e os filtros para a paginacao, que estao no controller.-->
@endsection