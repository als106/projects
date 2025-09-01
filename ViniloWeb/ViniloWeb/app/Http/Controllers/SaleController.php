<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\Sale;



class SaleController extends Controller

{

    public function index()

    {

        $sales = Sale::All();

        $products = [];

        foreach ($sales as $sale) {

            $producto = Product::findOrFail($sale->product_id);

            if ($producto) {

                array_push($products, $producto);
            } else {

                echo "Producto no encontrado. :(";
            }
        }



        return view('sales.index', ['products' => $products], ['sales' => $sales]);
    }

    public function newSaleGet()
    {
        $products = Product::orderBy('name')->get();

        return view('sales.create', ['products' => $products]);
    }

    public function newSalePost(Request $request)
    {


        $request->validate(
            [
                'descuento' => 'required|numeric',
            ]
        );

        $descuento = $request->descuento;
        $product = Product::where('name', '=', $request->product)->first();

        $sale = Sale::create(
            [
                'descuento' => $descuento,
            ]
        );
        $sale->save();
        $sale->product()->associate($product);
        $sale->save();
        session()->flash('message', 'Oferta añadida correctamente');
        return redirect()->action([SaleController::class, 'index']);
    }

    public function updateSaleGet($id)
    {
        $product = Product::all();
        $sale = Sale::findOrFail($id);
        return view('sales.update', ['sale' => $sale], compact('product'));
    }

    public function updateSale(Request $request, $id)
    {
        if ($request->has('descuento')) {
            $request->validate(
                    [
                        'descuento' => 'required|numeric'
                    ]
                );

            $descuento = $request->descuento;

            $sale = Sale::findOrFail($id);
            $sale->descuento = $descuento;
            $sale->save();
            session()->flash('message', 'Oferta actualizada correctamente');
            return redirect()->action([SaleController::class, 'index']);
        }
    }

    public function deleteSale($id)
    {

        $sale = Sale::findOrFail($id);

        $sale->delete();
        session()->flash('message', 'Oferta eliminada correctamente');
        return redirect()->back();
    }

    public function indexOfertas()
    {
        $sales = Sale::All();

        $products = [];       

        foreach ($sales as $sale) {


            $producto = Product::findOrFail($sale->product_id);    

            if ($producto) {

                array_push($products, $producto);
            } else {

                echo "Producto no encontrado. :(";
            }
        }

        



        return view('sales.indexOfertas', ['products' => $products], ['sales' => $sales]);
    }

    public function productId($id) 
    {
        $producto = Product::findOrFail($id);

        return $producto;
    }
}
