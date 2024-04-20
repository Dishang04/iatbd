<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PetSittingRequest;

class SitterController extends Controller
{
    public function index()
    {
        $sitterRequests = PetSittingRequest::where('sitter_id', auth()->id())->latest()->get();

        return view('sitter.index', compact('sitterRequests'));
    }
}