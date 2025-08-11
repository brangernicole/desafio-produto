@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Produtos</h1>
        <a href="{{ route('produtos.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Novo Produto</a>
    </div>
    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Nome</th>
                <th class="py-2 px-4 border-b">Preço</th>
                <th class="py-2 px-4 border-b">Descrição</th>
                <th class="py-2 px-4 border-b">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
            <tr>
                <td class="py-2 px-4 border-b">{{ $produto->id }}</td>
                <td class="py-2 px-4 border-b">{{ $produto->nome }}</td>
                <td class="py-2 px-4 border-b">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                <td class="py-2 px-4 border-b">{{ $produto->descricao }}</td>
                <td class="py-2 px-4 border-b">
                    <a href="{{ route('produtos.edit', $produto) }}" class="text-blue-500 mr-2">Editar</a>
                    <form action="{{ route('produtos.destroy', $produto) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500" onclick="return confirm('Tem certeza?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
