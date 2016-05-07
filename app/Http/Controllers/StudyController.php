<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Study;
use App\User;
use Auth;

class StudyController extends Controller
{
    protected function createStudy(array $data)
    {
        return Study::create([
            'name' => $data['study-name'],
            'description' => $data['study-description'],
            'publication_date' => $data['study-date'],
            'user_id' => Auth::user()->id,
        ]);
    }

    public function addStudy(Request $request){
        $this->createStudy($request->all());
        return response()->json();
    }

    
    public function destroy( $id, Request $request ) {
	    $study = Study::findOrFail( $id );

	    if ( $request->ajax() ) {
	        $study->delete( $request->all() );

	        return response(['msg' => 'Study deleted', 'study_id' => $id, 'status' => 'success']);
	    }
	    return response(['msg' => 'Failed deleting the study', 'status' => 'failed']);
	}

    public function resStudy(Request $request){
        $id = $request->get('user_id');
        $study = User::find($id)->studies()->orderBy('publication_date', 'desc')->get();
        return response()->json($study);
    }
}
