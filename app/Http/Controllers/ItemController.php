<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function list() {
        return view("pages.item.list");
    }

    public function incoming() {
        return view("pages.item.incoming-list");
    }

    public function outcoming() {
        return view("pages.item.outcoming");
    }
}
