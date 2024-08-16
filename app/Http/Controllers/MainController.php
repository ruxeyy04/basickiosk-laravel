<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Userinfo;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use function PHPSTORM_META\map;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    // Cashier Web Pages
    public function loginpage()
    {
        return view('login');
    }
    public function cashierpage()
    {
        return view('home');
    }
    public function cashierAbout()
    {
        return view('about');
    }
    public function cashierInv()
    {
        return view('inventory');
    }
    public function cashierProfile()
    {
        return view('profile');
    }
    // =================
    // Auth Page
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $user = $request->input('user');
            $password = $request->input('password');

            $hashedPasswordFromDB = DB::select("SELECT * FROM userinfos WHERE username = ?", [$user]);

            if (!empty($hashedPasswordFromDB)) {
                if (Hash::check($password, $hashedPasswordFromDB[0]->password)) {
                    return response()->json($hashedPasswordFromDB);
                } else {
                    return response()->json(['message' => '0 results']);
                }
            } else {
                return response()->json(['message' => '0 results']);
            }
        }
    }
    // =================
    // Products
    public function getProducts()
    {
        if (request()->isMethod('get')) {
            $products = Product::all();

            $tableRows = [];
            foreach ($products as $product) {
                $serial = $product->serial_id;
                $name = $product->name;
                $image = $product->image;
                $price = $product->price;
                $expdate = $product->exp_date;
                $stocks = $product->quantity;
                $status = $product->status;

                $tableRows[] = [
                    'serial' => $serial,
                    'productName' => $name,
                    'unitPrice' => $price,
                    'expiryDate' => $expdate,
                    'stockQuantity' => $stocks,
                    'status' => $status,
                    'image' => $image
                ];
            }

            return response()->json(['data' => $tableRows]);
        }
    }
    // =================

    // Order Controller
    public function addOrder(Request $request)
    {
        if ($request->has('addOrder') && $request->has('cusName')) {
            $order = new Order();
            $order->order_id = $request->input('addOrder');
            $order->customer_name = $request->input('cusName');

            if ($order->save()) {
                return response()->json(['status' => 'Success', 'message' => 'Order Added Successfully']);
            } else {
                return response()->json(['status' => 'Error', 'message' => 'Error']);
            }
        }
    }

    public function delOrder(Request $request)
    {
        if ($request->has('delOrder')) {
            $orderId = $request->input('delOrder');

            // Check if there is data in orderdetails table
            $orderDetails = OrderDetail::where('order_id', $orderId)->get();

            if ($orderDetails->isNotEmpty()) {
                // Delete data from orderdetails table
                OrderDetail::where('order_id', $orderId)->delete();
            }

            // Delete data from orders table
            $deleted = Order::where('order_id', $orderId)->delete();

            if ($deleted) {
                return response()->json(['status' => 'Success', 'message' => 'Order Deleted Successfully']);
            } else {
                return response()->json(['status' => 'Error', 'message' => 'Error']);
            }
        }
    }

    public function purchaseAddOrder(Request $request)
    {
        if ($request->has('purchaseAddOrder')) {
            $orderId = $request->input('purchaseAddOrder');
            $serialId = $request->input('serid');
            $quantity = $request->input('quant');

            $orderDetail = OrderDetail::where('order_id', $orderId)->where('serial_id', $serialId)->first();

            if ($orderDetail) {
                // Update quantity in orderdetails table
                $orderDetail->quantity += $quantity;
                $orderDetail->save();
            } else {
                // Insert data into orderdetails table
                OrderDetail::create([
                    'order_id' => $orderId,
                    'serial_id' => $serialId,
                    'quantity' => $quantity,
                ]);
            }

            // Subtract quantity from products table
            $product = Product::where('serial_id', $serialId)->first();
            if ($product) {
                $product->quantity -= $quantity;
                $product->status = ($product->quantity > 0) ? $product->status : 'Not Available';
                $product->save();
            }

            return response()->json(['status' => 'Success', 'message' => 'Prod Added']);
        }
    }
    public function checkItem(Request $request)
    {
        if ($request->has('checkItem')) {
            $orderId = $request->input('checkItem');

            $result = OrderDetail::selectRaw('SUM(orderdetails.quantity) as totalItems, SUM(orderdetails.quantity * products.price) as totalPrice')
                ->leftJoin('products', 'orderdetails.serial_id', '=', 'products.serial_id')
                ->where('orderdetails.order_id', $orderId)
                ->groupBy('orderdetails.order_id')
                ->first();

            if ($result) {
                $totalItems = $result->totalItems;
                $totalPrice = $result->totalPrice;

                return response()->json(['totalItems' => $totalItems, 'totalPrice' => $totalPrice]);
            } else {
                return response()->json(['totalItems' => 0, 'totalPrice' => 0]);
            }
        }
    }

    public function payment(Request $request)
    {
        if ($request->has('payment')) {
            $orderId = $request->input('payment');
            $totalAmount = $request->input('totalamount');

            $payment = new Payment();
            $payment->totalamount = $totalAmount;
            $payment->order_id = $orderId;

            if ($payment->save()) {
                $orders = OrderDetail::select(
                    'products.serial_id',
                    'products.name',
                    'orderdetails.quantity',
                    DB::raw('(orderdetails.quantity * products.price) as totalPrice')
                )
                    ->leftJoin('products', 'orderdetails.serial_id', '=', 'products.serial_id')
                    ->where('orderdetails.order_id', $orderId)
                    ->get();

                return response()->json(['orderItem' => $orders]);
            } else {
                return response()->json(['status' => 'Error', 'message' => 'Error']);
            }
        }
    }
    public function getOrders()
    {
        $orders = DB::table('orders as a')
            ->join('orderdetails as b', 'b.order_id', '=', 'a.order_id')
            ->join('products as c', 'c.serial_id', '=', 'b.serial_id')
            ->select('a.*', 'b.*', 'c.name', 'c.price', DB::raw('(b.quantity * c.price) as totalprice'))
            ->get();

        if ($orders->count() > 0) {
            return response()->json($orders);
        } else {
            return response()->json(['message' => 'No results'], 404);
        }
    }
    // =================

    // Inventory
    public function getProductsData()
    {
        $productsData = Product::select(
            'products.*',
            'products.serial_id',
            DB::raw('COALESCE(SUM(orderdetails.quantity), 0) AS totalsold'),
            DB::raw('COALESCE(SUM(orderdetails.quantity * products.price), 0) AS totalsale')
        )
            ->leftJoin('orderdetails', 'orderdetails.serial_id', '=', 'products.serial_id')
            ->groupBy(
                'products.serial_id',
                'products.name',  // Include all columns from the products table
                'products.manufacturer',
                'products.manufactured_date',
                'products.exp_date',
                'products.price',
                'products.quantity',
                'products.status',
                'products.image',
                'products.created_at',
                'products.updated_at'
            )
            ->get();

        $tableRows = [];

        foreach ($productsData as $row) {
            $tableRows[] = [
                'serial' => $row->serial_id,
                'name' => $row->name,
                'manufacturer' => $row->manufacturer,
                'manufactured_date' => $row->manufactured_date,
                'exp_date' => $row->exp_date,
                'price' => $row->price,
                'quantity' => $row->quantity,
                'totalsold' => $row->totalsold,
                'totalsale' => $row->totalsale,
                'status' => $row->status,
            ];
        }

        return response()->json(['data' => $tableRows]);
    }
    // =================

    // Profile Info
    public function getUserInfo(Request $request)
    {
        if ($request->isMethod('get')) {
            $userid = $request->input('userid');

            $userInfo = Userinfo::where('userid', $userid)
                ->get();

            return response()->json($userInfo);
        } elseif ($request->isMethod('post')) {
            $userid = $request->input('userid');
            $user = $request->input('user');
            $pass = $request->input('pass');
            $hashpass = Hash::make($pass);
            $updateResult = Userinfo::where('userid', $userid)
                ->update(['username' => $user, 'password' => $hashpass]);

            if ($updateResult) {
                return response()->json(['message' => 'Successfully Updated!', 'messageType' => 'success']);
            } else {
                return response()->json(['message' => 'Failed', 'messageType' => 'failed']);
            }
        }
    }
    // =================

    // ADMIN WEB PAGES
    public function adminpage()
    {
        return view('admin.index');
    }
    public function adminAdd()
    {
        return view('admin.addadmin');
    }
    public function adminAddIncharge()
    {
        return view('admin.addincharge');
    }
    public function adminOrderLog()
    {
        return view('admin.orderlog');
    }
    public function adminProfile()
    {
        return view('admin.profile');
    }
    public function adminSales()
    {
        return view('admin.sales');
    }
    public function adminViewAdmin()
    {
        return view('admin.viewadmin');
    }
    public function adminViewCashier()
    {
        return view('admin.viewcashier');
    }
    public function adminViewIncharge()
    {
        return view('admin.viewincharge');
    }
    // ====================

    // Sales
    public function getSales()
    {
        $products = DB::table('products')
            ->select('*')
            ->get();

        $response = [];

        foreach ($products as $product) {
            $prodid = $product->serial_id;

            $itemsold = DB::table('orderdetails as a')
                ->join('products as b', 'a.serial_id', '=', 'b.serial_id')
                ->where('b.serial_id', $prodid)
                ->groupBy('a.serial_id')
                ->sum('a.quantity');

            $totalsale = DB::table('orderdetails as a')
                ->join('products as b', 'a.serial_id', '=', 'b.serial_id')
                ->where('b.serial_id', $prodid)
                ->groupBy('a.serial_id')
                ->sum(DB::raw('a.quantity * b.price'));

            $product->totalsale = $totalsale ?? '0.00';
            $product->itemsold = $itemsold ?? 0;

            $response[] = $product;
        }

        return response()->json($response);
    }
    // =====================


    // Modify Products
    public function addProduct(Request $request)
    {
        $newfilename = 'default.png'; // Set a default value

        if ($request->isMethod('post')) {
            $serial = $request->input('serial');
            $name = $request->input('name');
            $manufacturer = $request->input('manufacturer');
            $mandate = $request->input('mandate');
            $expdate = $request->input('expdate');
            $price = $request->input('price');
            $quantity = $request->input('quantity');
            $status = 'Available';

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $image = $request->file('image');
                $fileName = $image->getClientOriginalName();
                $img_ex = pathinfo($fileName, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $newfilename = uniqid("product-", true) . '.' . $img_ex_lc;
                // Move the uploaded file to the destination
                $image->move(public_path('prod-img'), $newfilename);
            }

            Product::create([
                'serial_id' => $serial,
                'name' => $name,
                'manufacturer' => $manufacturer,
                'manufactured_date' => $mandate,
                'exp_date' => $expdate,
                'price' => $price,
                'quantity' => $quantity,
                'image' => $newfilename,
                'status' => $status,
            ]);

            return response()->json(['message' => 'Product added successfully', 'messageType' => 'success']);
        }

        return response()->json(['message' => 'Failed', 'messageType' => 'failed']);
    }


    public function deleteProduct(Request $request)
    {
        if ($request->isMethod('post')) {
            $userid = $request->input('delete');

            DB::table('products')->where('serial_id', $userid)->delete();

            return response()->json(['message' => 'Product deleted successfully', 'messageType' => 'success']);
        }

        return response()->json(['message' => 'Failed', 'messageType' => 'failed']);
    }

    public function getProductById(Request $request)
    {
        if ($request->isMethod('get')) {
            $serialid = $request->input('serialId');

            $product = DB::table('products')->where('serial_id', $serialid)->get();

            return response()->json($product);
        }

        return response()->json(['message' => 'Failed', 'messageType' => 'failed']);
    }

    public function updateProduct(Request $request)
    {
        if ($request->isMethod('post')) {
            $serial = $request->input('serial');
            $name = $request->input('name');
            $manufacturer = $request->input('manufacturer');
            $mandate = $request->input('mandate');
            $expdate = $request->input('expdate');
            $price = $request->input('price');
            $quantity = $request->input('quantity');
            $status = $request->input('status');
            $image = $request->file('image');

            $currentImage = DB::table('products')->where('serial_id', $serial)->value('image');

            if ($image) {
                $newfilename = uniqid() . '.' . $image->getClientOriginalExtension();
                $uploadPath = 'prod-img/' . $newfilename;
                Storage::put($uploadPath, file_get_contents($image->getRealPath()));

                // Delete the old image if it exists and it's not the default image
                if ($currentImage !== 'default.png') {
                    Storage::delete('prod-img/' . $currentImage);
                }
            } else {
                $newfilename = $currentImage;
            }

            DB::table('products')->where('serial_id', $serial)->update([
                'name' => $name,
                'manufacturer' => $manufacturer,
                'manufactured_date' => $mandate,
                'exp_date' => $expdate,
                'price' => $price,
                'quantity' => $quantity,
                'image' => $newfilename,
                'status' => $status,
            ]);

            return response()->json(['message' => 'Product updated successfully', 'messageType' => 'success']);
        }

        return response()->json(['message' => 'Failed', 'messageType' => 'failed']);
    }

    public function getAllProducts()
    {
        $products = DB::table('products')->get();

        return response()->json($products);
    }
    // =====================

    // User Mod
    public function addInCharge(Request $request)
    {
        $user = $request->input('user');
        $pass = $request->input('pass');

        $result = Userinfo::create([
            'username' => $user,
            'password' => Hash::make($pass),
            'usertype' => 'In-charge',
        ]);

        if ($result) {
            return response()->json(['message' => 'You have Added In-charge!', 'messageType' => 'success']);
        } else {
            return response()->json(['message' => 'Failed', 'messageType' => 'failed']);
        }
    }

    public function getInCharge()
    {
        $result = DB::table('userinfos')->where('usertype', 'In-charge')->get();

        if ($result->count() > 0) {
            return response()->json($result);
        } else {
            return response()->json(['message' => '0 results']);
        }
    }

    public function deleteInCharge(Request $request)
    {
        $userid = $request->input('delete');

        $result = DB::table('userinfos')->where('userid', $userid)->delete();

        if ($result) {
            return response()->json(['message' => 'In-charge Deleted!', 'messageType' => 'success']);
        } else {
            return response()->json(['message' => 'Failed', 'messageType' => 'failed']);
        }
    }

    public function addAdmin(Request $request)
    {
        $user = $request->input('user');
        $pass = $request->input('pass');

        $result = Userinfo::create([
            'username' => $user,
            'password' => Hash::make($pass),
            'usertype' => 'Admin',
        ]);

        if ($result) {
            return response()->json(['message' => 'You have Added Admin!', 'messageType' => 'success']);
        } else {
            return response()->json(['message' => 'Failed', 'messageType' => 'failed']);
        }
    }

    public function getAdmin()
    {
        $result = DB::table('userinfos')->where('usertype', 'Admin')->get();

        if ($result->count() > 0) {
            return response()->json($result);
        } else {
            return response()->json(['message' => '0 results']);
        }
    }

    public function deleteAdmin(Request $request)
    {
        $userid = $request->input('delete');

        $result = DB::table('userinfos')->where('userid', $userid)->delete();

        if ($result) {
            return response()->json(['message' => 'Admin Deleted!', 'messageType' => 'success']);
        } else {
            return response()->json(['message' => 'Failed', 'messageType' => 'failed']);
        }
    }

    public function deleteCashier(Request $request)
    {
        $userid = $request->input('delete');

        $result = DB::table('userinfos')->where('userid', $userid)->delete();

        if ($result) {
            return response()->json(['message' => 'Cashier Deleted!', 'messageType' => 'success']);
        } else {
            return response()->json(['message' => 'Failed', 'messageType' => 'failed']);
        }
    }

    public function getCashiers()
    {
        $result = DB::table('userinfos')->where('usertype', 'Cashier')->get();

        if ($result->count() > 0) {
            return response()->json($result);
        } else {
            return response()->json(['message' => '0 results']);
        }
    }

    public function addCashier(Request $request)
    {
        $user = $request->input('user');
        $pass = $request->input('pass');

        $result = Userinfo::create([
            'username' => $user,
            'password' => Hash::make($pass),
            'usertype' => 'Cashier',
        ]);

        if ($result) {
            return response()->json(['message' => 'You have Added Cashier!', 'messageType' => 'success']);
        } else {
            return response()->json(['message' => 'Failed', 'messageType' => 'failed']);
        }
    }
    // ====================

    // Inchage page
    public function inchargePage()
    {
        return view('incharge.index');
    }
    public function inchargeProdedit()
    {
        return view('incharge.prodedit');
    }
    public function inchargeProfile()
    {
        return view('incharge.profile');
    }
    public function inchargeViewProduct()
    {
        return view('incharge.viewproduct');
    }
    // ====================
}
