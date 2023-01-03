<x-layout title="NFe">

    <div class="py-1">
        <label class="form-label">Cadastro da NF</label>
        <form action="{{route('nfe.upload')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-10">
                    <input class="form-control" type="file" name="nfe" id="nfe">
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </div>
        </form>
    </div>
<hr>
    <div class="py-5">
        <label for="nfe" class="form-label">Escolha a NF</label>
        <form action="{{ route('nota') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-10">
                    <select class="form-select form-select-lg" name="nfe" id="nfe">
                        @foreach ($lista as $nfe)
                            <option name="nfe" value="{{ $nfe['caminho'] . '/' . $nfe['arquivo'] }}">
                                {{ $nfe['arquivo'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2">
                    <button class="btn btn-success" type="submit">Enviar</button>
                </div>
            </div>
        </form>
    </div>

</x-layout>
