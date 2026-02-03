<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Hero;
use App\Models\Project;
use App\Models\Qualification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // View all heroes
    public function hero()
    {
        $heroes = Hero::latest()->get();
        return view('admin.hero', compact('heroes'));
    }

    // Show create form
    public function heroAdd()
    {
        return view('admin.heroAdd');
    }

    // Store new hero (with file uploads)
    public function heroStore(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'description' => 'nullable|string|max:2000',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // 2MB max
            'resume'      => 'nullable|file|mimes:pdf|max:5120', // 5MB max
        ]);

        $data = $validated;

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('heroes/images', $imageName, 'public');
            $data['image'] = 'heroes/images/' . $imageName;
        }

        // Handle resume upload
        if ($request->hasFile('resume')) {
            $resume = $request->file('resume');
            $resumeName = time() . '_' . uniqid() . '.' . $resume->getClientOriginalExtension();
            $resume->storeAs('heroes/resumes', $resumeName, 'public');
            $data['resume'] = 'heroes/resumes/' . $resumeName;
        }

        // Create record
        Hero::create($data);

        return redirect()->route('admin.hero')->with('success', 'Hero section created successfully!');
    }

   // Show edit form (pre-fill with existing data)
    public function heroEdit($id)
    {
        $hero = Hero::findOrFail($id); // 404 if not found
        return view('admin.hero-edit', compact('hero'));
    }



    public function heroUpdate(Request $request, $id)
{
    $hero = Hero::findOrFail($id);

    $validated = $request->validate([
        'description' => 'nullable|string|max:2000',
        'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        'resume'      => 'nullable|mimes:pdf|max:5120',
    ]);

    $data = $validated;

    // Handle new image (replace old one)
    if ($request->hasFile('image')) {
        // Optional: delete old image
        if ($hero->image) {
            Storage::disk('public')->delete($hero->image);
        }
        $path = $request->file('image')->store('heroes/images', 'public');
        $data['image'] = $path;
    }

    // Handle new resume (replace old one)
    if ($request->hasFile('resume')) {
        if ($hero->resume) {
            Storage::disk('public')->delete($hero->resume);
        }
        $path = $request->file('resume')->store('heroes/resumes', 'public');
        $data['resume'] = $path;
    }

    $hero->update($data);

    return redirect()->route('admin.hero')->with('success', 'Hero updated successfully!');
}

public function heroDestroy($id)
{
    $hero = Hero::findOrFail($id);

    // Delete files if exist
    if ($hero->image) Storage::disk('public')->delete($hero->image);
    if ($hero->resume) Storage::disk('public')->delete($hero->resume);

    $hero->delete();

    return redirect()->route('admin.hero')->with('success', 'Hero deleted successfully!');
}


    // View About (single entry)
public function aboutView()
{
    $about = About::first();
    return view('admin.about.aboutView', compact('about'));
}

// Show create form
public function aboutCreate()
{
    // If already exists, suggest editing instead
    if (About::exists()) {
        return redirect()->route('admin.about.edit', About::first()->id)
            ->with('info', 'About section already exists. Please edit it.');
    }
    return view('admin.about.aboutCreate');
}

// Store new About
public function aboutStore(Request $request)
{
    $validated = $request->validate([
        'designation' => 'nullable|string|max:255',
        'description' => 'nullable|string|max:5000',
        'skills'      => 'nullable|array', // Validate the checkbox array
    ]);

    // Create the About entry without 'frontend'/'backend' strings
    $about = About::create([
        'designation' => $validated['designation'],
        'description' => $validated['description'],
    ]);

    // Attach the skill IDs to the about_skill pivot table
    if ($request->has('skills')) {
        $about->skills()->attach($request->skills);
    }

    return redirect()->route('admin.about.view')
        ->with('success', 'About section created successfully!');
}

// Show edit form
public function aboutEdit($id)
{
    $about = About::findOrFail($id);
    return view('admin.about.aboutEdit', compact('about'));
}

// Update About
public function aboutUpdate(Request $request, $id)
{
    $about = About::findOrFail($id);

    $validated = $request->validate([
        'designation' => 'nullable|string|max:255',
        'description' => 'nullable|string|max:5000',
        'skills'      => 'nullable|array', // New: validates checkbox array
    ]);

    // Update the basic fields
    $about->update([
        'designation' => $validated['designation'],
        'description' => $validated['description'],
        // Note: We no longer save 'frontend'/'backend' as strings here
    ]);

    // Sync the Many-to-Many relationship
    // This automatically manages the 'about_skill' pivot table
    $about->skills()->sync($request->skills ?? []);

    return redirect()->route('admin.about.view')
        ->with('success', 'About section updated successfully!');
}
// Delete About
public function aboutDelete($id)
{
    $about = About::findOrFail($id);
    $about->delete();

    return redirect()->route('admin.about.view')
        ->with('success', 'About section deleted successfully!');
}



// View all qualifications
public function qualificationView()
{
    $qualifications = Qualification::orderBy('start_date', 'desc')->get();
    return view('admin.qualification.qualificationView', compact('qualifications'));
}

// Show create form
public function qualificationCreate()
{
    return view('admin.qualification.qualificationCreate');
}

// Store new qualification
public function qualificationStore(Request $request)
{
    $validated = $request->validate([
        'designation'    => 'required|string|max:255',
        'company_name'   => 'nullable|string|max:255', // university or company
        'description'    => 'nullable|string|max:2000',
        'start_date'     => 'required|date',
        'end_date'       => 'nullable|date|after_or_equal:start_date',
        'type'           => 'required|in:experience,education',
    ]);

    Qualification::create($validated);

    return redirect()->route('admin.qualification.view')
        ->with('success', 'Qualification added successfully!');
}

// Show edit form
public function qualificationEdit($id)
{
    $qualification = Qualification::findOrFail($id);
    return view('admin.qualification.qualificationEdit', compact('qualification'));
}

// Update qualification
public function qualificationUpdate(Request $request, $id)
{
    $qualification = Qualification::findOrFail($id);

    $validated = $request->validate([
        'designation'    => 'required|string|max:255',
        'company_name'   => 'nullable|string|max:255',
        'description'    => 'nullable|string|max:2000',
        'start_date'     => 'required|date',
        'end_date'       => 'nullable|date|after_or_equal:start_date',
        'type'           => 'required|in:experience,education',
    ]);

    $qualification->update($validated);

    return redirect()->route('admin.qualification.view')
        ->with('success', 'Qualification updated successfully!');
}

// Delete qualification
public function qualificationDelete($id)
{
    $qualification = Qualification::findOrFail($id);
    $qualification->delete();

    return redirect()->route('admin.qualification.view')
        ->with('success', 'Qualification deleted successfully!');
}




// View all projects
public function projectView()
{
    $projects = Project::latest()->get();
    return view('admin.project.projectView', compact('projects'));
}

// Show create form
public function projectCreate()
{
    return view('admin.project.projectCreate');
}

// Store new project
public function projectStore(Request $request)
{
    $validated = $request->validate([
        'title'       => 'required|string|max:255',
        'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        'description' => 'nullable|string|max:5000',
        'link'        => 'nullable|url|max:500',
    ]);

    $data = $validated;

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('projects/images', 'public');
        $data['image'] = $path;
    }

    Project::create($data);

    return redirect()->route('admin.project.view')
        ->with('success', 'Project added successfully!');
}

// Show edit form
public function projectEdit($id)
{
    $project = Project::findOrFail($id);
    return view('admin.project.projectEdit', compact('project'));
}

// Update project
public function projectUpdate(Request $request, $id)
{
    $project = Project::findOrFail($id);

    $validated = $request->validate([
        'title'       => 'required|string|max:255',
        'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        'description' => 'nullable|string|max:5000',
        'link'        => 'nullable|url|max:500',
    ]);

    $data = $validated;

    if ($request->hasFile('image')) {
        // Delete old image
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        $path = $request->file('image')->store('projects/images', 'public');
        $data['image'] = $path;
    }

    $project->update($data);

    return redirect()->route('admin.project.view')
        ->with('success', 'Project updated successfully!');
}

// Delete project
public function projectDelete($id)
{
    $project = Project::findOrFail($id);

    // Delete image
    if ($project->image) {
        Storage::disk('public')->delete($project->image);
    }

    $project->delete();

    return redirect()->route('admin.project.view')
        ->with('success', 'Project deleted successfully!');
}
public function messagesView()
{
    // Fetch latest messages first
    $messages = \App\Models\Message::latest()->get();
    
    return view('admin.messages.index', compact('messages'));
}

public function messageDelete($id)
{
    $message = \App\Models\Message::findOrFail($id);
    $message->delete();

    return redirect()->back()->with('success', 'Message deleted successfully!');
}

}