<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Issue;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $issues = Issue::with('computer')->paginate(10); 
        return view('issues.index', compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $computers = Computer::all();
        return view('issues.create', compact('computers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'computer_name' => 'required|string|max:255',
            'reported_by' => 'required|string|max:255',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In progress,Resolved',
        ]);
        $computer = Computer::where('computer_name', $request->input('computer_name'))->firstOrFail();
        Issue::create([
            'computer_id' => $computer->id,
            'reported_by' => $request->input('reported_by'),
            'reported_date' => $request->input('reported_date'),
            'urgency' => $request->input('urgency'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
        ]);
        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được thêm thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Issue $issue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Issue $issue)
    {
        $computers = Computer::all();
        $issue->load('computer');
        return view('issues.edit', compact('issue', 'computers'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Issue $issue)
    {
        
        $request->validate([
            'computer_name' => 'required|string|max:255',
            'reported_by' => 'required|string|max:255',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In progress,Resolved',
        ]);
        $computer = Computer::where('computer_name', $request->input('computer_name'))->firstOrFail();
        $issue->update([
            'computer_id' => $computer->id,
            'reported_by' => $request->input('reported_by'),
            'reported_date' => $request->input('reported_date'),
            'urgency' => $request->input('urgency'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được cập nhật thành công.');
    }

    public function destroy(Issue $issue)
    {
        $issue->delete();
        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được xóa thành công.');
    }
}
