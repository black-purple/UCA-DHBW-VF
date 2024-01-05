<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;
use App\Models\Project;
use App\Models\Internship;
use App\Models\Program;
use App\Models\Fablab;

class SearchController extends Controller
{
    
   public function search(Request $request)
{
    // Get the search query from the request
    $query = $request->input('query');

    // Create an empty collection to store the combined results
    $combinedResults = collect();

    // Search in workshops
    $workshopResults = Workshop::where('title', 'like', '%' . $query . '%')
        ->orWhere('description', 'like', '%' . $query . '%')
        ->get(['title', 'description']);
    $combinedResults = $combinedResults->merge($this->filterResults($workshopResults));

    // Search in projects
    $projectResults = Project::where('title', 'like', '%' . $query . '%')
        ->orWhere('description', 'like', '%' . $query . '%')
        ->get(['title', 'description']);
    $combinedResults = $combinedResults->merge($this->filterResults($projectResults));

    // Search in internships
    $internshipResults = Internship::where('title', 'like', '%' . $query . '%')
        ->orWhere('description', 'like', '%' . $query . '%')
        ->get(['title', 'description']);
    $combinedResults = $combinedResults->merge($this->filterResults($internshipResults));

    // Search in programs
    $programResults = Program::where('title', 'like', '%' . $query . '%')
        ->orWhere('description', 'like', '%' . $query . '%')
        ->get(['title', 'description']);
    $combinedResults = $combinedResults->merge($this->filterResults($programResults));

    // Search in fablabs
    $fablabResults = Fablab::where('title_fablab', 'like', '%' . $query . '%')
        ->orWhere('description_fablab', 'like', '%' . $query . '%')
        ->get(['title_fablab', 'description_fablab']);
    $combinedResults = $combinedResults->merge($this->filterResults($fablabResults));

    // Ensure uniqueness of results
    $combinedResults = $combinedResults->unique();

    // Return the combined results as a JSON response
    return response()->json(['searchResults' => $combinedResults->values()]);
}

// Helper method to filter out null values
private function filterResults($results)
{
    return $results->filter(function ($item) {
        // Exclude entries with null values in title or description
        return !is_null($item->title) && !is_null($item->description);
    });
}




    
    
}
