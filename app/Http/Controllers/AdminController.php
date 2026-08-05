<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function ViewCategory()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->usertype == 1) {
                $categories = Category::all();
                return view('admin.category', compact('categories'));
            } else {
                return redirect('login');
            }
        } else {
            return redirect('login');
        }
    }

    public function AddCategory(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->usertype == 1) {
                $category = new Category();
                $category->name = $request->name;
                $category->save();
                return redirect()->back();
            } else {
                return redirect('login');
            }
        } else {
            return redirect('login');
        }
    }

    public function DeleteCategory($id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->usertype == 1) {
                Category::where('id', '=', $id)->delete();
                return redirect()->back();
            } else {
                return redirect('login');
            }
        } else {
            return redirect('login');
        }
    }

    public function ViewProduct()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->usertype == 1) {
                $categories = Category::all();
                return view('admin.add_product', compact('categories'));
            } else {
                return redirect('login');
            }
        } else {
            return redirect('login');
        }
    }

    public function AddProduct(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->usertype == 1) {
                $product = new Product();
                $product->name = $request->name;
                $product->description = $request->description;
                $product->price = $request->price;
                $product->category_id = $request->category_id;
                $product->quantity = $request->quantity;
                $product->user_id = $user->id;

                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = time() . '.' . $image->extension();
                    $image->move(public_path('products_images'), $imageName);
                    $product->image = $imageName;
                }

                $product->save();
                return redirect()->back()->with('success', 'Product added successfully');
            } else {
                return redirect('login');
            }
        } else {
            return redirect('login');
        }
    }

    public function ShowProduct()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->usertype == 1) {
                $products = Product::all();
                return view('admin.show_product', compact('products'));
            } else {
                return redirect('login');
            }
        } else {
            return redirect('login');
        }
    }

    public function DeleteProduct($id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->usertype == 1) {
                Product::where('id', '=', $id)->delete();
                return redirect()->back();
            } else {
                return redirect('login');
            }
        } else {
            return redirect('login');
        }
    }

    public function EditProduct($id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->usertype == 1) {
                $product = Product::find($id);
                $categories = Category::all();
                return view('admin.edit_product', compact('product', 'categories'));
            } else {
                return redirect('login');
            }
        } else {
            return redirect('login');
        }
    }

    public function UpdateProduct(Request $request, $id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->usertype == 1) {
                $product = Product::find($id);
                $product->name = $request->name;
                $product->description = $request->description;
                $product->price = $request->price;
                $product->category_id = $request->category_id;
                $product->quantity = $request->quantity;

                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = time() . '.' . $image->extension();
                    $image->move(public_path('products_images'), $imageName);
                    $product->image = $imageName;
                }

                $product->save();
                return redirect()->back()->with('success', 'Product updated successfully');
            } else {
                return redirect('login');
            }
        } else {
            return redirect('login');
        }
    }

    public function SearchProduct(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->usertype == 1) {
                $search = trim($request->search ?? '');
                if (empty($search)) {
                    $products = Product::all();
                } else {
                    $keywords = array_filter(explode(' ', $search));
                    $query = Product::query();
                    $query->where(function ($q) use ($keywords, $search) {
                        $q->where('title', 'LIKE', "%{$search}%")
                          ->orWhere('category', 'LIKE', "%{$search}%")
                          ->orWhere('processor', 'LIKE', "%{$search}%")
                          ->orWhere('ram', 'LIKE', "%{$search}%");
                        foreach ($keywords as $word) {
                            $q->orWhere('title', 'LIKE', "%{$word}%")
                              ->orWhere('category', 'LIKE', "%{$word}%")
                              ->orWhere('processor', 'LIKE', "%{$word}%")
                              ->orWhere('ram', 'LIKE', "%{$word}%");
                        }
                    });
                    $products = $query->get();
                }
                return view('admin.show_product', compact('products'));
            } else {
                return redirect('login');
            }
        } else {
            return redirect('login');
        }
    }

    public function SearchOrder(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->usertype == 1) {
                $search = $request->search;
                $orders = Order::where('tracking_id', 'like', '%' . $search . '%')->get();
                return view('admin.orders', compact('orders'));
            } else {
                return redirect('login');
            }
        } else {
            return redirect('login');
        }
    }

    public function UserOrders()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->usertype == 1) {
                $orders = Order::all();
                return view('admin.orders', compact('orders'));
            } else {
                return redirect('login');
            }
        } else {
            return redirect('login');
        }
    }

    public function UpdateOrder($user_id, $order_id, $delivery_status)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->usertype == 1) {
                $order = Order::find($order_id);
                $order->delivery_status = $delivery_status;
                $order->save();
                return redirect()->back();
            } else {
                return redirect('login');
            }
        } else {
            return redirect('login');
        }
    }

    public function PrintBill($order_id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->usertype == 1) {
                $order = Order::find($order_id);
                return view('admin.user_bill', compact('order'));
            } else {
                return redirect('login');
            }
        } else {
            return redirect('login');
        }
    }

    public function Customers()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->usertype == 1) {
                $customers = User::where('usertype', 0)->get();
                return view('admin.customers', compact('customers'));
            } else {
                return redirect('login');
            }
        } else {
            return redirect('login');
        }
    }

    public function DeleteUser($id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->usertype == 1) {
                User::where('id', '=', $id)->delete();
                return redirect()->back();
            } else {
                return redirect('login');
            }
        } else {
            return redirect('login');
        }
    }

    public function SearchUser(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->usertype == 1) {
                $search = $request->search;
                $customers = User::where('usertype', 0)
                    ->where('name', 'like', '%' . $search . '%')
                    ->get();
                return view('admin.customers', compact('customers'));
            } else {
                return redirect('login');
            }
        } else {
            return redirect('login');
        }
    }
}
