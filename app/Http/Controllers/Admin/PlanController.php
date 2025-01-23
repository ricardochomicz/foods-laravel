<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlanRequest;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index(Request $request)
    {
        $filters = ['search' => $request->get('search')];
        $plans = Plan::filter($filters)->paginate(1);
        return view('admin.plans.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.plans.create');
    }

    public function store(PlanRequest $request)
    {
        Plan::create($request->all());
        return redirect()->route('plans.index');
    }

    public function edit($id)
    {
        $plan = Plan::find($id);
        if (!$plan) {
            return back();
        }
        return view('admin.plans.edit', compact('plan'));
    }

    public function show($id)
    {
        $plan = Plan::find($id);
        if (!$plan) {
            return back();
        }
        return view('admin.plans.show', compact('plan'));
    }

    public function update(PlanRequest $request, $id)
    {
        $plan = Plan::find($id);
        if (!$plan) {
            return back();
        }
        $plan->update($request->all());
        return redirect()->route('plans.index');
    }

    public function destroy($id)
    {
        $plan = Plan::find($id);
        if (!$plan) {
            return back();
        }
        $plan->delete();
        return redirect()->route('plans.index');
    }
}
