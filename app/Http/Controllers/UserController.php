<?php

namespace App\Http\Controllers;

// use PDF;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    // Constructor 
    public function __construct()
    {
        $this->middleware(["auth", "role:admin"]);
    }

    // Print
    // public function print(){
    //     // $users = User::all();
    //     $users = Cache::remember('users', 60, function() {
    //         // return User::select('name', 'email', 'created_at')->get();
    //         $users = User::select('photo', 'name', 'job', 'place', 'created_at', 'membership')->get();
    //         return $users;
    //     });
        

    //     $pdf = Pdf::loadView("users.pdf", compact('users'));
    
    //     return $pdf->download('users.pdf');

        
    // }

    // public function print()
    // {
    //     // $users = Cache::get('users', function () {
    //     //     return User::all();
    //     // });
    //     $users = Cache::remember('users', 60, function(){
    //         $users = User::paginate(500);
    //         return $users;
    //     });
    //     $pdf = PDF::loadView('users.pdf', compact('users'));
    //     return $pdf->download('users.pdf'); 
    // }
    public function print()
    {
        $users = User::paginate(200);
        // You can add a filter if needed
        // $users = User::where('role', 'admin')->paginate(100);
        // ...
    
        $chunks = $users->chunk(200);
        $pdf = PDF::loadView('users.pdf', ['users' => $chunks->first()]);
    
        // Render the first page
        $pdf->render();
    
        // Loop through the other pages and add them to the PDF
        $pages = ceil($users->count() / 200);
        for ($i = 2; $i <= $pages; $i++) {
            $pdf->addPage();
            $pdf->loadView('users.pdf', ['users' => $chunks->forPage($i, 200)]);
        }
    
        return $pdf->download('users.pdf'); 
    }
        
        
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        $query = $request->input('query');

        $users = User::where('name', 'like', '%'.$query.'%')
            ->orWhere('job', 'like', '%'.$query.'%')
            ->orWhere('place', 'like', '%'.$query.'%')
            ->orderBy('created_at', 'desc')
            ->get();
    
        return view("dashboard.users", compact('users'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {  
        // $users = User::select(['photo', 'name', 'job', 'place', 'created_at', 'membership', 'id'])
        //     ->orderBy('created_at', 'desc')
        //     ->get();
        $users = User::with('profile')->get();
        $profiles = Profile::all();

        $roles = ['admin', 'user'];
        $memberships = ['basic', 'pro'];

        // $data = [];

        // foreach ($users as $user) {
        //     $data[] = [
        //         'photo' => '<a href="#"><img class="rounded-circle" style="width:40px;" src="'.$user->photo.'" alt=""></a>',
        //         'name' => '<a href="#" class="text-primary fw-bold">'.$user->name.'</a>',
        //         'job' => $user->job,
        //         'place' => $user->place,
        //         'created_at' => \Carbon\Carbon::parse($user->created_at)->format('d-m-Y'),
        //         'membership' => $user->membership,
        //         'action' => '<div class="d-flex justify-content-between">
        //                         <button data-bs-toggle="modal" data-bs-target="#delete-'.$user->id.'" data-toggle="tooltip" data-placement="left" title="Supprimer" type="button" class="btn btn-sm btn-danger">
        //                             <i class="bi bi-trash3-fill"></i>
        //                         </button>
        //                         <button data-bs-toggle="modal" data-bs-target="#edit-'.$user->id.'" data-toggle="tooltip" data-placement="left" title="Modifier" type="button" class="btn btn-sm btn-success text-white">
        //                             <i class="bi bi-pencil-square"></i>
        //                         </button>
        //                       </div>'
        //     ];
        // }

        // if($request->ajax()){
        //     return response()->json(['data' => $data]);
        //     // return Response::json($data);
        // }
        return view("dashboard.home", compact("users", "roles", "memberships", "profiles"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadCsv(Request $request)
    {
        try {
                    // Validate the input 
        $request->validate(
            [ 'file' => 'required|mimes:csv,txt|max:2048' ],
            [ 
                'file.required' => 'Téléverser un fichier', 
                'file.mimes' => 'Téléverser un fichier de type :csv , :txt',
                'file.max' => 'Téléverser un fichier de taille max < :max'
            ]
        );


        if ($request->hasFile('file')) {
            // Get the file from the request
            $file = $request->file('file');
    
            // Open the file for parsing
            $handle = fopen($file, 'r');
    
            // Loop through the rows in the file
            while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                // Create a new user
                $user = new User;

                $user->email = $row[0];
                $user->password = $row[1];
                $user->place = $row[2];
                $user->name = $row[3];
                $user->save();
    
                // Create a new profile for the user
                $profile = new Profile;
              
                $profile->phone = $row[4];
                $user->profile()->save($profile);
            }
    
            // Close the file
            fclose($handle);
    
            // Redirect back with a success message
            return back()->with('success', 'Fichier Téléversé avec succés.');
        }else{
            return back()->with('danger', 'Aucun fichier n\'est téléversé.');
        }
        } catch (Exception $e) {
            return back()->with('danger', 'Aucun fichier n\'est téléversé.');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         // Handle File Upload
         if($request->hasFile('photo')){
            // Get filename with the extension
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('photo')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;

            $img = Image::make($request->file('photo')->getRealPath());
            $img->resize(120, 120);
            
            // Upload Image
            $path = $request->file('photo')->storeAs('public/users/', $fileNameToStore);
            // dd(is_writable($path . $filename));

            $img->save('storage/users/'.$fileNameToStore);

        }else{
            $fileNameToStore = '/storage/users/profile.png';
        }

        // Validate inputs
        $validatedData = $request->validate([
            'name' => 'required',
            'place' => 'required',
            'membership' => 'required',
            'role' => 'required',
            'job' => 'required',
            // 'photo' => 'required|image|max:2048', // max size 2MB
        ], [
            'name.required' => 'Le champ nom est obligatoire',
            'place.required' => 'Le champ direction régionale est obligatoire.',
            'membership.required' => 'Le champ type de membre est obligatoire.',
            'role.required' => 'Le champ emploi est obligatoire.',
            'job.required' => 'Le champ emploi est obligatoire.',
            // 'photo.required' => 'Veuillez choisir un fichier à télécharger.',
            // 'photo.image' => 'Veuillez télécharger uniquement des fichiers images.',
            // 'photo.max' => 'Le fichier ne doit pas être supérieur à :max kilobytes (2M).'
        ]);

        $user = User::findOrFail($id);

        $user->name = $validatedData["name"];
        $user->place = $validatedData["place"];
        $user->role = $validatedData["role"];
        $user->job = $validatedData["job"];
        $user->photo = $fileNameToStore;
        $user->save();
    
        return redirect()->back()->with('success', 'Utilisateur modifiée avec succés.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user->role !== "admin"){

            if($user->file !== null){
                // Delete Image
                Storage::delete('public/users/'.$user->photo);
            }
            $user->delete();
            return redirect()->back()->with('success', 'Utilisateur supprimé avec succès.');
        }else {
            return redirect()->back()->with('danger', 'Impossible de supprimer cet utilisateur.');
        }
    }
}
