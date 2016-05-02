<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Hobby;
use Auth;

class HobbyController extends Controller
{
    protected function createHobby(array $data)
    {
        return Hobby::create([
            'name' => $data['hobby'],
            'user_id' => Auth::user()->id,
        ]);
    }

    public function addHobby(Request $request){
        $this->createHobby($request->all());
        return response()->json();
    }

    
    public function destroy( $id, Request $request ) {
	    $hobby = Hobby::findOrFail( $id );

	    if ( $request->ajax() ) {
	        $hobby->delete( $request->all() );

	        return response(['msg' => 'Hobby deleted', 'hobby_id' => $id, 'status' => 'success']);
	    }
	    return response(['msg' => 'Failed deleting the hobby', 'status' => 'failed']);
	}

    public function resHobby(Request $request){
        $id = $request->get('user_id');
        $hobby = User::find($id)->hobbies()->get();
        return response()->json($hobby);
    }
}
