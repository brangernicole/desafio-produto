@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Editar Produto</h1>
    <form action="{{ route('produtos.update', $produto) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block">Nome</label>
            <input type="text" name="nome" class="border rounded w-full p-2" value="{{ old('nome', $produto->nome) }}">
            @error('nome') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block">Preço</label>
            <input type="number" step="0.01" name="preco" class="border rounded w-full p-2" value="{{ old('preco', $produto->preco) }}">
            @error('preco') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block">Descrição</label>
            <textarea name="descricao" class="border rounded w-full p-2">{{ old('descricao', $produto->descricao) }}</textarea>
            @error('descricao') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Atualizar</button>
            <a href="{{ route('produtos.index') }}" class="ml-2 text-gray-600">Cancelar</a>
        </div>
    </form>
</div>
@endsection
