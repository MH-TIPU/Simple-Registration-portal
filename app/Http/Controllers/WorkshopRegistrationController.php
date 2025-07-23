<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkshopRegistration;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class WorkshopRegistrationController extends Controller
{
    public function index()
    {
        return view('workshop.landing');
    }

    public function showForm()
    {
        return view('workshop.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|unique:workshop_registrations,email',
            'enterprise_name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create the registration
        $registration = WorkshopRegistration::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'enterprise_name' => $request->enterprise_name,
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
            
            // Add CSV headers
            fputcsv($file, ['ID', 'Name', 'Phone Number', 'Email', 'College/Organization', 'Registration Date']);
            
            // Add data rows
            foreach ($registrations as $registration) {
                fputcsv($file, [
                    $registration->id,
                    $registration->name,
                    $registration->phone_number,
                    $registration->email,
                    $registration->enterprise_name,
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
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|unique:workshop_registrations,email',
            'enterprise_name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        WorkshopRegistration::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'enterprise_name' => $request->enterprise_name,
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
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|unique:workshop_registrations,email,' . $id,
            'enterprise_name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $registration->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'enterprise_name' => $request->enterprise_name,
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
}
