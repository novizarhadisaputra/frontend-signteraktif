<?php

namespace App\Repositories;

use Exception;
use Illuminate\Support\Facades\DB;

class BillingRepository
{
    public function __construct()
    {

    }
    public function index($request)
    {
        $billingPage = 'active';
        $title = 'Billing';
        return view('pages.billing.index', compact('billingPage', 'title'));
    }
}
