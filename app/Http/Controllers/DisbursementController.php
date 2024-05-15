<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disbursement;
use Inertia\Inertia;

class DisbursementController extends Controller
{
    public function index(){
        $disbursement = Disbursement::orderBy('id', 'DESC')->get();
        return Inertia::render('Disbursement', [
            'disbursements' => $disbursement,
        ]);
    }
}
