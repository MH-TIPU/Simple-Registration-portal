<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkshopRegistration;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class WorkshopRegistrationController extends Controller
{
    public function showDraft()
    {
        return view('workshop.landing');
    }

    public function registerFromDraft(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create the registration with only phone number
        $registration = WorkshopRegistration::create([
            'phone_number' => $request->phone_number,
            'registered_at' => now(),
        ]);

        return redirect()->back()->with('registered', true);
    }

    public function showForm()
    {
        return view('workshop.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        // Create the registration with only phone number
        $registration = WorkshopRegistration::create([
            'phone_number' => $request->phone_number,
            'registered_at' => now(),
        ]);

        // WhatsApp group invitation link (replace with your actual group invite link)
        // To get a WhatsApp group invite link:
        // 1. Create a WhatsApp group
        // 2. Go to Group Info > Invite to Group via Link > Share Link
        // 3. Replace the URL below with your actual invite link
        $whatsappGroupLink = "https://google.com";
        
        // You can also customize the message when joining
        $whatsappMessage = "Hello! I just registered for the AI Workshop. Looking forward to learning with everyone!";
        $whatsappGroupLink .= "?text=" . urlencode($whatsappMessage);
        
        return view('workshop.success', compact('whatsappGroupLink'));
    }

    public function showRegistrations()
    {
        $registrations = WorkshopRegistration::orderBy('registered_at', 'desc')->get();
        return view('workshop.admin.registrations', compact('registrations'));
    }

    public function exportToExcel()
    {
        $registrations = WorkshopRegistration::orderBy('registered_at', 'desc')->get();
        
        $filename = 'workshop_registrations_' . date('Y-m-d_H-i-s') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];
        
        $callback = function() use ($registrations) {
            $file = fopen('php://output', 'w');
            
            // Add CSV headers for phone-only registration
            fputcsv($file, ['ID', 'Phone Number', 'Registration Date']);
            
            // Add data rows
            foreach ($registrations as $registration) {
                fputcsv($file, [
                    $registration->id,
                    $registration->phone_number,
                    $registration->registered_at->format('Y-m-d H:i:s')
                ]);
            }
            
            fclose($file);
        };
        
        return response()->stream($callback, 200, $headers);
    }

    // CRUD Operations for Admin Panel
    
    public function create()
    {
        return view('workshop.admin.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        WorkshopRegistration::create([
            'phone_number' => $request->phone_number,
            'registered_at' => now(),
        ]);

        return redirect()->route('workshop.admin.registrations')
            ->with('success', 'Registration created successfully!');
    }

    public function show($id)
    {
        $registration = WorkshopRegistration::findOrFail($id);
        return view('workshop.admin.show', compact('registration'));
    }

    public function edit($id)
    {
        $registration = WorkshopRegistration::findOrFail($id);
        return view('workshop.admin.edit', compact('registration'));
    }

    public function update(Request $request, $id)
    {
        $registration = WorkshopRegistration::findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $registration->update([
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->route('workshop.admin.registrations')
            ->with('success', 'Registration updated successfully!');
    }

    public function destroy($id)
    {
        $registration = WorkshopRegistration::findOrFail($id);
        $registration->delete();

        return redirect()->route('workshop.admin.registrations')
            ->with('success', 'Registration deleted successfully!');
    }

    public function bulkDelete(Request $request)
    {
        $selectedIds = $request->input('selected_ids', []);
        
        if (empty($selectedIds)) {
            return redirect()->route('workshop.admin.registrations')
                ->with('error', 'No registrations selected for deletion.');
        }
        
        // Validate that all IDs are integers
        $validIds = array_filter($selectedIds, function($id) {
            return is_numeric($id) && $id > 0;
        });
        
        if (empty($validIds)) {
            return redirect()->route('workshop.admin.registrations')
                ->with('error', 'Invalid registration IDs provided.');
        }
        
        try {
            $deletedCount = WorkshopRegistration::whereIn('id', $validIds)->delete();
            
            return redirect()->route('workshop.admin.registrations')
                ->with('success', "Successfully deleted {$deletedCount} registration(s)!");
                
        } catch (\Exception $e) {
            return redirect()->route('workshop.admin.registrations')
                ->with('error', 'An error occurred while deleting registrations. Please try again.');
        }
    }
}
