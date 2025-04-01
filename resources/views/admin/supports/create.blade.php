<h1>Nova Dúvida</h1>

<x-alert/>

<form action="{{ route('supports.store') }}" method="POST"> <!-- vai ser usado o post para armazenar isso-->
    
    @include('admin.supports.partials.form') <!-- importando formulario dessa pasta -->
</form>