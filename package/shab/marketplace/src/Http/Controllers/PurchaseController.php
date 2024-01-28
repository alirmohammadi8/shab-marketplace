<?php

namespace Shab\Marketplace\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PurchaseController extends Controller
{

    public function purchaseProduct(Request $request)
    {
        // Assume the request has 'products' field with array of product IDs
        $products = Product::findMany($request->products);

        // Call logic to handle purchase. This could be a separate function and
        // might involve reducing inventory, recording the purchase history,
        // creating a transaction record, etc.

        // use the purchase details to create an email
        $details = [
            'title' => 'A customer purchase A Product',
            'body'  => 'Please find purchase details below.',
            'products' => $products
        ];

        // Send the email to the admin.
        // You could store the admin email in your environment file and use config() helper to access it.
        $adminEmail = config('mail.admin.address');

        Mail::to($adminEmail)->send(new PurchasedProducts($details));

        return response()->json(['message' => 'Purchase successful and email sent'], 200);
    }
}
