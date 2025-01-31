<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Fornecedor;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFornecedorRequest;
use App\Http\Requests\UpdateFornecedorRequest;
use App\Http\Resources\FornecedorResource;
use App\Http\Resources\FornecedorCollection;

class FornecedorController extends Controller
{
    public function index()
    {
        return new FornecedorCollection(Fornecedor::all());
    }

    public function store(StoreFornecedorRequest $request)
    {
        $fornecedor = Fornecedor::create($request->validated());
        return new FornecedorResource($fornecedor);
    }

    public function show($id)
    {
        $fornecedor = Fornecedor::find($id);
        return new FornecedorResource($fornecedor);
    }

    public function update(UpdateFornecedorRequest $request, $id)
    {
        $fornecedor = Fornecedor::find($id);
        $fornecedor->update($request->validated());
        return new FornecedorResource($fornecedor);
    }

    public function destroy($id)
    {
        $fornecedor = Fornecedor::find($id);
        $fornecedor->delete();
        return response()->json(['message' => 'Fornecedor deletado com sucesso!'], 200);
    }
}