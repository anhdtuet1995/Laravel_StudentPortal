<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Skill;
use Auth;
class SkillController extends Controller
{
	protected function createSkill(array $data)
    {
        return Skill::create([
            'name' => $data['skill'],
            'value' => $data['mark'],
            'user_id' => Auth::user()->id,
        ]);
    }

    public function addSkill(Request $request){
        $this->createSkill($request->all());
        return response()->json();
    }

    
    public function destroy( $id, Request $request ) {
	    $skill = Skill::findOrFail( $id );

	    if ( $request->ajax() ) {
	        $skill->delete( $request->all() );

	        return response(['msg' => 'Skill deleted', 'skill_id' => $id, 'status' => 'success']);
	    }
	    return response(['msg' => 'Failed deleting the skill', 'status' => 'failed']);
	}

    public function resSkill(Request $request){
        $id = $request->get('user_id');
        $skill = User::find($id)->skills()->get();
        return response()->json($skill);
    }
}
