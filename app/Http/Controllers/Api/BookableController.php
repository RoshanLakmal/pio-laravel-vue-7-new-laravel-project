<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookableIndexResource;
use App\Http\Resources\BookableShowResource;
use App\Models\Bookable;
use Illuminate\Http\Request;

class BookableController extends Controller
{
    public function index()
    {
        /**transform your models and model collections into JSON. */
        return BookableIndexResource::collection(
            Bookable::all()
        );
        // return Bookable::all();
    }

    public function show($id)
    {
        /**transform your models and model collections into JSON. */
        return new BookableShowResource(Bookable::find($id));
        // return Bookable::findOrFail($id);
    }
}
