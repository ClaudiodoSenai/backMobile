
<?php/*

namespace App\Http\Controllers;

use App\Models\CarrinhoItem;
use App\Models\Produto;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function store(Request $request)
    {
        $produtoId = $request->input('id');

        // Verifica se o produto existe
        $produto = Produto::find($produtoId);
        if (!$produto) {
            return response()->json(['error' => 'Produto não encontrado'], 404);
        }

        // Verifica se o produto já está no carrinho
        $carrinhoItem = CarrinhoItem::where('produto_id', $produtoId)->first();
        if ($carrinhoItem) {
            // Atualiza a quantidade do item no carrinho
            $carrinhoItem->quantidade += 1;
            $carrinhoItem->save();
        } else {
            // Adiciona o item ao carrinho
            $carrinhoItem = new CarrinhoItem;
            $carrinhoItem->produto_id = $produtoId;
            $carrinhoItem->quantidade = 1;
            $carrinhoItem->save();
        }

        return response()->json(['message' => 'Produto adicionado ao carrinho'], 201);
    }
    public function retornarTodos()
    {
        $produtos = CarrinhoItem::all();
        return response()->json([
            'status' => true,
            'data' => $produtos
        ]);
    }
}