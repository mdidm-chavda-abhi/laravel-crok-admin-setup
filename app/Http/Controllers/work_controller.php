<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Client;
use App\Models\Category;
use App\Models\Bank;
use App\Models\WorkStep;
use App\Models\CategoryStep;
use App\Models\WorkStepOption;
use Carbon\Carbon;

use Illuminate\Support\Facades\Log;

class work_controller extends Controller
{

    public function List()
    {
        // Fetch all Works from the database in descending order by id
        $Works = Work::orderBy('id', 'desc')->get();

        // Pass them to the view
        return view('admin.work.list', compact('Works'));
    }

    public function Add()
    {
        $clients = Client::orderBy('id', 'desc')->get();
        $categories = Category::all();
        $banks = Bank::all();

        return view('admin.work.add', compact('clients', 'categories', 'banks'));
    }


    public function store(Request $request)
    {

        // dd($request->all());

        // Validate the request data
        // Create a new Work instance
        Work::create([
            'work_name' => $request->work_name,
            'client_id' => $request->person_id,
            'bank_id' => $request->bank_id,
            'category_id' => $request->category_id,
        ]);

        // Redirect back with success message
        return redirect()->route('work.list')->with('success', 'Work added successfully!');
    }


    // ✅ Edit page
    public function edit($id)
    {
        $clients = Client::orderBy('id', 'desc')->get();
        $categories = Category::all();
        $banks = Bank::all();
        $work = Work::findOrFail($id);

        // dd($work);

        return view('admin.work.edit', compact('work', 'clients', 'categories', 'banks'));
    }

    // ✅ Update Work
    public function update(Request $request, $id)
    {


        $work = Work::findOrFail($id);

        $work->update([
            'work_name' => $request->work_name,
            'client_id' => $request->person_id,
            'bank_id' => $request->bank_id,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('work.list')->with('success', 'Work updated successfully!');
    }


    // ✅ Delete Work
    public function delete($id)
    {
        $Work = Work::findOrFail($id);
        $Work->delete();

        return redirect()->route('work.list')->with('success', 'Work deleted successfully!');
    }



    public function stepList($id)
    {
        $work = Work::with([
            'category.steps.options',
            'category.requiredDocs',
            'workSteps' // Load actual progress
        ])->findOrFail($id);

        // Map work_steps for quick access
        $completedSteps = $work->workSteps->pluck('status', 'category_step_id');

        return view('admin.work.steps-list', compact('work', 'completedSteps'));
    }



    public function updateStatus(Request $request)
    {
        // Log::info('Update Status Request:', $request->all());

        $validated = $request->validate([
            'work_id' => 'required|integer|exists:works,id',
            'category_step_id' => 'required|integer|exists:category_steps,id',
            'status' => 'required|in:pending,completed',
        ]);

        $workId = $validated['work_id'];
        $categoryStepId = $validated['category_step_id'];
        $status = $validated['status'];

        // Find or create WorkStep
        $workStep = WorkStep::where('work_id', $workId)
            ->where('category_step_id', $categoryStepId)
            ->first();

        if ($workStep) {
            \Log::info("Updating existing WorkStep (ID: {$workStep->id}) for Work ID: $workId");
        } else {
            \Log::info("Creating new WorkStep for Work ID: $workId, Category Step ID: $categoryStepId");
            $workStep = new WorkStep();
            $workStep->work_id = $workId;
            $workStep->category_step_id = $categoryStepId;
        }

        // Prepare update data
        $data = ['status' => $status];

        if ($status === 'completed') {
            $data['completed_at'] = now();
            if (!$workStep->started_at) {
                $data['started_at'] = now();
            }
        } else {
            $data['completed_at'] = null;
        }

        $workStep->fill($data);
        $workStep->save();

        // \Log::info("WorkStep Saved:", $workStep->toArray());

        return response()->json([
            'success' => true,
            'message' => $workStep->wasRecentlyCreated ? 'Step created successfully!' : 'Step updated successfully!',
            'status' => $workStep->status,
            'work_step_id' => $workStep->id
        ]);
    }

    public function updateWorkStepOption(Request $request)
    {
        $workOption = WorkStepOption::updateOrCreate(
            [
                'work_id' => $request->work_id,
                'category_step_id' => $request->category_step_id,
            ],
            [
                'option_id' => $request->option_id
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'Option updated successfully!',
            'data' => $workOption
        ]);
    }
}
