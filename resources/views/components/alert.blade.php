<div class="alert alert-danger">
    @if ($errors->any()) <!-- se existir um erro-->
            @foreach($errors->all() as $error) <!-- forearch pq tem multiplos campos q podem dar erro. joga os erros e joga para $error -->
             {{ $error }} <!-- e depois imprime o erro na tela -->
        @endforeach
    @endif
</div>