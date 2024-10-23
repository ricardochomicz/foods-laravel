<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        return view('admin.plans.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.plans.create');
    }

    public function store(Request $request) {}

    public function edit($id)
    {
        $plan = Plan::find($id);
        if (!$plan) {
            return back();
        }
        return view('admin.plans.edit', compact('plan'));
    }

    public function update(Request $request, $id) {}
}
