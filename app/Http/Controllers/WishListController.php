<?php

namespace App\Http\Controllers;

use App\Course;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function store($id)
    {
        $course = Course::find($id);
        $wishlist = \Cart::session(Auth::user()->id . '_wishlist');
        $wishlist->add(array(
            'id' => $course->id,
            'name' => $course->title,
            'price' => $course->price,
            'quantity' => 1,
            'associatedModel' => $course
        ));
        return redirect()->route('cart.index')->with('success', 'Ce cours ajouté à votre liste de souhait');
    }
    public function destroy($id)
    {
        \Cart::session(Auth::user()->id . '_wishlist')->remove($id);
        return redirect()->route('cart.index')->with('success', 'Ce cours a été  supprimé avec succès de votre liste de souhait');
    }
    public function toCart($id)
    {
        $course = Course::find($id);
        \Cart::session(Auth::user()->id . '_wishlist')->remove($id);
        $add = \Cart::session(Auth::user()->id)->add(array(
            'id' => $course->id,
            'name' => $course->title,
            'price' => $course->price,
            'quantity' => 1,
            'associatedModel' => $course
        ));
        return redirect()->route('cart.index')->with('success', 'Ce cours a été ajouté avec succès dans votre panier');
    }
    public function toWishList($id)
    {
        $course = Course::find($id);
        \Cart::session(Auth::user()->id)->remove($id);
        $wishlist = \Cart::session(Auth::user()->id . '_wishlist');
        $wishlist->add(array(
            'id' => $course->id,
            'name' => $course->title,
            'price' => $course->price,
            'quantity' => 1,
            'associatedModel' => $course
        ));
        return redirect()->route('cart.index')->with('success', 'Ce cours ajouté à votre liste de souhait avec succès');
    }
}
