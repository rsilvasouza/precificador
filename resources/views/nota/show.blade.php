<x-layout title="nota">
    <div class="text-end">
        <a class="btn btn-primary" href="{{ route('nfe') }}">Início</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Item</th>
                    <th scope="col">Preço</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tabela as $key => $item)
                    <tr>
                        <td>{{ $item['nome'] }}</td>
                        <td>R$ {{ $item['preco'] }}</td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>


</x-layout>
