<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Http\Requests\ProdutoRequest;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProdutoRequest $request)
    {
        Produto::create($request->validated());
        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('produtos.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produto = Produto::findOrFail($id);
        return view('produtos.edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProdutoRequest $request, string $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->update($request->validated());
        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto excluído com sucesso!');
    }
}
