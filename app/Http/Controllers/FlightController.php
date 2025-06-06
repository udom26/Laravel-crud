<?php
namespace App\Http\Controllers;
use App\Models\Flight;
use App\Models\Post;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index()
    {
        $flights = Flight::with(['post', 'destinationRelation'])->get();
        return view('flights.index', compact('flights'));
    }

    public function create()
    {
        $posts = Post::all();
        return view('flights.create', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'airport_id' => 'required|exists:posts,id',
            'destination_airport_id' => 'required|exists:posts,id',
            'flight_number' => 'required|string|max:50',
        ]);

        Flight::create($request->only(['airport_id', 'destination_airport_id', 'flight_number']));
        return redirect()->route('flights.index')->with('success', 'Flight created successfully.');
    }

    public function show($id)
    {
        $flight = Flight::with('post')->findOrFail($id);
        return view('flights.show', compact('flight'));
    }

    public function edit($id)
    {
        $flight = Flight::findOrFail($id);
        $posts = Post::all();
        return view('flights.edit', compact('flight', 'posts'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'airport_id' => 'required|exists:posts,id',
            'destination_airport_id' => 'required|exists:posts,id',
            'flight_number' => 'required|string|max:50',
        ]);

        $flight = Flight::findOrFail($id);
        $flight->update($request->only(['airport_id', 'destination_airport_id', 'flight_number']));
        return redirect()->route('flights.index')->with('success', 'Flight updated successfully.');
    }

    public function destroy($id)
    {
        $flight = Flight::findOrFail($id);
        $flight->delete();
        return redirect()->route('flights.index')->with('success', 'Flight deleted successfully.');
    }
}