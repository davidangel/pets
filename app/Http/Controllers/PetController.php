<?php

namespace App\Http\Controllers;

use App\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
    {
        return Pet::inRandomOrder()->take(12)->get();
    }

    public function show(Pet $pet)
    {
        return $pet->load('human');
    }
}
