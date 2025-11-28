<?php
namespace App\Http\Controllers;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller {
    public function index(){ return response()->json(auth()->user()->profiles); }
    public function store(Request $r){
        $data = $r->validate(['name'=>'required|string','password'=>'nullable|string']);
        $data['user_id'] = auth()->id();
        if(!empty($data['password'])){ $data['password_hash'] = hash('sha256',$data['password']); unset($data['password']); }
        $profile = Profile::create($data);
        return response()->json($profile,201);
    }
    public function show(Profile $profile){
        $this->authorize('view',$profile);
        return response()->json($profile);
    }
    public function update(Request $r, Profile $profile){
        $this->authorize('update',$profile);
        $data = $r->only(['name','settings']);
        $profile->update($data);
        return response()->json($profile);
    }
    public function destroy(Profile $profile){
        $this->authorize('delete',$profile);
        $profile->delete();
        return response()->json(null,204);
    }
}