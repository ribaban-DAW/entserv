@extends ('layouts.app')
@section('html')

    @section('headTitle')
        Cliente
    @endsection

    @section('main')
        @section('mainTitle')
            Cliente
        @endsection

        <table>
            <thead class="[&>tr>th]:p-4">
                <tr class="bg-pink-300">
                    <th>ID</th>
                    <th>NIF</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                </tr>
            </thead>
            <tbody class="[&>tr>td]:p-4">
                @foreach ($clientes as $cliente)
                <tr class="odd:bg-pink-200 even:bg-pink-300">
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->nif }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->apellidos }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->direccion }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endsection

@endsection
