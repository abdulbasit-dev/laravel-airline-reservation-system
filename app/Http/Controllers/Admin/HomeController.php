<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Airline;
use App\Models\Airport;
use App\Models\Flight;
use App\Models\Plane;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (view()->exists('template.' . $request->path())) {
            return view('template.' . $request->path());
        }
        return abort(404);
    }

    public function root()
    {
        $totalAirline = Airline::count();
        $totalCustomer = User::whereIsAdmin(0)->count();
        $totalPlane = Plane::count();
        $totalAirport = Airport::count();
        $totalFlight = Flight::count();
        $totalTicket = Ticket::count();

        // get last 10 flights
        $lastFlights = Flight::orderBy('id', 'desc')->take(10)->get();

        // get active ariline by number of flights
        $activeAirlines = Airline::query()
            ->withCount('flights')
            ->withCount('planes')
            ->orderBy('flights_count', 'desc')
            ->take(6)
            ->get();

        // CHARTS DATA CONFIG
        // get status of flights
        $flightStatusChart = DB::table('flights')
            ->orderBy('status', 'desc')
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get()
            ->map(function ($item) {
                switch (trim($item->status)) {
                    case 0:
                        $item->label = "Land";
                        $item->color = "#ea868f";
                        break;
                    case 1:
                        $item->label = "Take Off";
                        $item->color = "#20c997";
                        break;
                }
                return (array) $item;
            })->toArray();

        $data = [
            'totalAirline'      => $totalAirline,
            'totalPlane'        => $totalPlane,
            'totalAirport'      => $totalAirport,
            'totalFlight'       => $totalFlight,
            'totalTicket'       => $totalTicket,
            'totalCustomer'     => $totalCustomer,
            'lastFlights'       => $lastFlights,
            "activeAirlines"    => $activeAirlines,
            "flightStatusChart" => $flightStatusChart,
        ];
        return view('admin.index', compact('data'));
    }

    public function storeTempFile(Request $request)
    {

        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function deleteTempFile(Request $request)
    {
        $path = storage_path('tmp/uploads');
        if (file_exists($path . '/' . $request->fileName)) {
            unlink($path . '/' . $request->fileName);
        }
    }

    /*Language Translation*/
    public function lang($locale)
    {
        if ($locale) {
            App::setLocale($locale);
            Session::put('lang', $locale);
            Session::save();
            return redirect()->back()->with('locale', $locale);
        } else {
            return redirect()->back();
        }
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');

        if ($request->file('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/');
            $avatar->move($avatarPath, $avatarName);
            $user->avatar = '/images/' . $avatarName;
        }

        $user->update();
        if ($user) {
            Session::flash('message', 'User Details Updated successfully!');
            Session::flash('alert-class', 'alert-success');
            return response()->json([
                'isSuccess' => true,
                'Message' => "User Details Updated successfully!"
            ], 200); // Status code here
        } else {
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
            return response()->json([
                'isSuccess' => true,
                'Message' => "Something went wrong!"
            ], 200); // Status code here
        }
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            return response()->json([
                'isSuccess' => false,
                'Message' => "Your Current password does not matches with the password you provided. Please try again."
            ], 200); // Status code
        } else {
            $user = User::find($id);
            $user->password = Hash::make($request->get('password'));
            $user->update();
            if ($user) {
                Session::flash('message', 'Password updated successfully!');
                Session::flash('alert-class', 'alert-success');
                return response()->json([
                    'isSuccess' => true,
                    'Message' => "Password updated successfully!"
                ], 200); // Status code here
            } else {
                Session::flash('message', 'Something went wrong!');
                Session::flash('alert-class', 'alert-danger');
                return response()->json([
                    'isSuccess' => true,
                    'Message' => "Something went wrong!"
                ], 200); // Status code here
            }
        }
    }
}
