<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Client;
use App\Models\Category;
use App\Models\Bank;
use App\Models\WorkStep;
use App\Models\CategoryStep;

use Illuminate\Support\Str;


class Chat_controller extends Controller
{
    //
    public function Chat()
    {

        $Works = Work::with([
            'category.steps.options',
            'category.requiredDocs',
            'workSteps' // Load actual progress
        ])->get();

        return view('admin.chat.index', compact('Works'));
    }

    public function work_track($id, $category, $client)
    {

        $work = Work::with([
            'category.steps.options',
            'category.requiredDocs',
            'workSteps' // Load actual progress
        ])->findOrFail($id);
        // Map work_steps for quick access
        $completedSteps = $work->workSteps->pluck('status', 'category_step_id');


        return view('admin.chat.work_track', compact('work', 'completedSteps'));
    }

    public function sendWhatsApp($id)
    {
        $item = Work::with('client', 'category')->findOrFail($id);

        $phone = $item->client->whatsapp_number ?? ''; // Use actual client phone
        $message = "Greetings,%0A%0A";
        $message .= "Dear {$item->client->name},%0A%0A";
        $message .= "You have been allotted {$item->category->name} on " . \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') . ".%0A%0A";
        $message .= "You can track the current status of your {$item->category->name} here:%0A";
        $message .= route('work.track', [
            'id' => $item->id,
            'category' => Str::slug($item->category->name),
            'client' => Str::slug($item->client->name),
        ]) . "%0A%0A";
        $message .= "Please feel free to reach out in case you need any further information or assistance.%0A%0A";
        $message .= "Best Regards,%0AJay Soni%0A +91 98765 43210";

        $whatsappUrl = "https://api.whatsapp.com/send?phone=+91{$phone}&text={$message}";

        return redirect()->away($whatsappUrl);
    }

    public function cattree_show(){

         // Fetch all banks
        $banks = Bank::all();

        // Fetch all categories with steps, options, and required docs
        $categories = Category::with([
            'steps.options',   // Load steps and their options
            'requiredDocs'     // Load required documents for the category
        ])->get();

        // Pass to view
        return view('admin.cattree_show', compact('banks', 'categories'));

    }

}
