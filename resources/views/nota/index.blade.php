<x-layout title="...">

    <div class="container">
        <form action="{{ route('nota.show') }}" method="post">
            <input type="hidden" name="total" value="{{ count($nota) }}">
            @csrf
            <div class="text-end">
                <button type="submit" class="btn btn-success">Imprimir</button>
            </div>


            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Produto</th>
                            <th>Preço Compra</th>
                            <th>Quantidade</th>
                            <th>Porcentagem</th>
                            <th>Preço Sugerido</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nota as $key => $itens)
                            <tr class="align-middle">
                                <input type="hidden" name="nomeItem{{ $itens->attributes() }}"
                                    value="{{ $itens->prod->xProd }}">
                                <td scope="row">{{ $itens->attributes() }}</td>
                                <td scope="row">{{ $itens->prod->xProd }}</td>
                                <td><input class="form-control" type="text" name="vProd{{ $itens->attributes() }}"
                                        id="vProd{{ $itens->attributes() }}" value="{{ $itens->prod->vUnCom }}"></td>
                                <td><input class="form-control" type="text" name="divide{{ $itens->attributes() }}"
                                        id="divide{{ $itens->attributes() }}"></td>
                                <td><input class="form-control" type="text"
                                        name="porcentagem{{ $itens->attributes() }}"
                                        id="porcentagem{{ $itens->attributes() }}"
                                        onblur="calcula({{ $itens->attributes() }})"></td>
                                <td><input class="form-control" type="text"
                                        name="vSugerido{{ $itens->attributes() }}"
                                        id="vSugerido{{ $itens->attributes() }}"></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>
        <button class="btn btn-primary position-fixed top-50 end-0 translate-middle-y m-4" id="back-to-top"><i
                class="fa fa-arrow-up" aria-hidden="true"></i>
        </button>
    </div>
</x-layout>
<script>
    var btn = document.querySelector("#back-to-top");

    btn.addEventListener("click", function() {
        window.scrollTo(0, 0);
    });

    function calcula(id) {

        var vProd = document.getElementById("vProd" + id);
        var porcentagem = document.getElementById("porcentagem" + id);
        var divide = document.getElementById("divide" + id);
        var vSugerido = document.getElementById("vSugerido" + id);

        var valorSugerido = calculo(vProd.value, porcentagem.value, divide.value);

        vSugerido.value = valorSugerido;

        console.log(valorSugerido);
    }

    function calculo(valorCompra, porcentagem, divide) {
        if (porcentagem == null || porcentagem == "") porcentagem = 1;
        if (divide == null || divide == "") divide = 1;

        return ((valorCompra / divide) * porcentagem);
    }
</script>
