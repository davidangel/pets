<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;

class PetSearchController extends Controller
{
    public function index($q) {
        return Pet::like('name', $q)->get();
    }
}
