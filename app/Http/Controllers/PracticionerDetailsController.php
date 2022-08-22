<?php

namespace App\Http\Controllers;

use App\Models\FieldOfKnowledge;
use App\Models\Practicioner;
use App\Models\PracticionerFieldOfKnowledge;
use App\Models\PracticionerRole;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use \Auth;

class PracticionerDetailsController extends Controller
{


    public function getShow($userID) {

        $user_first_name = DB::table('practicioners')
            ->select(DB::raw('first_name'))
            ->where('id', '=', $userID)
            ->value('first_name');
        $user_last_name = DB::table('practicioners')
            ->select(DB::raw('last_name'))
            ->where('id', '=', $userID)
            ->value('last_name');
        $user_phone = DB::table('practicioners')
            ->select(DB::raw('phone'))
            ->where('id', '=', $userID)
            ->value('phone');
        $user_email = DB::table('practicioners')
            ->select(DB::raw('email'))
            ->where('id', '=', $userID)
            ->value('email');
        $user_hourly_rate = DB::table('practicioners')
            ->select(DB::raw('hourly_rate'))
            ->where('id', '=', $userID)
            ->value('hourly_rate');
        $user_availability = DB::table('practicioners')
            ->select(DB::raw('availability'))
            ->where('id', '=', $userID)
            ->value('availability');

        $user_know = DB::table('field_of_knowledges')
            ->join('practicioner_field_of_knowledge', 'field_of_knowledges.id', '=', 'practicioner_field_of_knowledge.field_of_knowledge_id')
            ->join('practicioners', 'practicioner_field_of_knowledge.practicioner_id', '=', 'practicioners.id')
            ->select(DB::raw('field_of_knowledges.name'))
            ->where('practicioner_field_of_knowledge.practicioner_id', '=', $userID)
            ->value('name');

        $user_role = DB::table('practicioner_roles')
        ->select(DB::raw('practicioner_roles.id, start_date, finish_date, name'))
        ->where('practicioner_id', $userID)
        ->get();
        $user_role2= json_decode($user_role, true);

        $user_exp = DB::table('practicioner_experiences')
            ->join('practicioners', 'practicioner_experiences.practicioner_id', '=', 'practicioners.id')
        ->join('universities', 'practicioner_experiences.university_id','=','universities.id')
        ->join('field_of_knowledges', 'practicioner_experiences.field_of_knowledge_id','=','field_of_knowledges.id')
        ->select(DB::raw('practicioner_experiences.id as pid, practicioner_experiences.start_date, practicioner_experiences.finish_date, universities.name, field_of_knowledges.name as name2'))
        ->where('practicioner_experiences.practicioner_id','=',$userID)
        ->get();
        $user_exp2 = json_decode($user_exp, true);

        $user_emp = DB::table('practicioner_employments')
            ->join('field_of_studies', 'practicioner_employments.field_of_study_id','=','field_of_studies.id')
            ->join('practicioners', 'practicioner_employments.practicioner_id', '=', 'practicioners.id')
            ->join('subjects','practicioner_employments.subject_id','=','subjects.id')
            ->select(DB::raw('practicioner_employments.id as pid,    field_of_studies.name, subjects.name as name2, semester, year'))
            ->where('practicioner_employments.practicioner_id','=',$userID)
            ->get();
        $user_emp2 = json_decode($user_emp, true);


        $data = array(
            'first_name' => $user_first_name,
            'last_name' => $user_last_name,
            'phone' => $user_phone,
            'email' => $user_email,
            'hourly_rate' => $user_hourly_rate,
            'availability' => $user_availability,
            'know' => $user_know,

        );

        return view('PracticionerDetails')
            ->with('data', $data)
            ->with('user_role2', $user_role2)
            ->with('user_exp2', $user_exp2)
            ->with('user_emp2', $user_emp2)
            ->with('user_id', $userID);
    }
    public function deleteRole(Request $request){
        DB::table("practicioner_roles")->where('id','=',$request->input('id'))->delete();
    }
    public function deleteExperience(Request $request){
        DB::table("practicioner_experiences")->where('id','=',$request->input('id'))->delete();
    }
    public function deleteZatrudnienie(Request $request){
        DB::table("practicioner_employments")->where('id','=',$request->input('id'))->delete();
    }
    public function storeRole(Request $request){
        $fd=null;
        if($request->data_do!=null) $fd = $request->data_do;
        DB::insert("insert into practicioner_roles (practicioner_id,start_date,finish_date,name) values (?,?,?,?)",[$request->pid,$request->data_od,$fd,$request->nazwa]);
        return response()->json([
            'status' => 200
        ]);
    }

    public function storeExp(Request $request){

        $university_name = $request -> uczelnia;
        $knowledge_name = $request -> zakres;

        DB::table('universities')->updateOrInsert([
            'name' => $university_name
        ]);
        DB::table('field_of_knowledges')->updateOrInsert([
            'name' => $knowledge_name
        ]);
        $university_id = DB::table('universities')
            ->select(DB::raw('universities.id'))
            ->where('universities.name', '=', $university_name)
            ->value('id');
        $knowledge_id = DB::table('field_of_knowledges')
            ->select(DB::raw('field_of_knowledges.id'))
            ->where('field_of_knowledges.name', '=', $knowledge_name)
            ->value('id');

        DB::table('practicioner_experiences')->updateOrInsert([
            'practicioner_id' => $request -> pid,
            'start_date' => $request ->data_od,
            'finish_date' => $request -> data_do,
            'university_id' => $university_id,
            'field_of_knowledge_id' => $knowledge_id
        ]);

        return response()->json([
            'status' => 200,
        ]);
    }
    public function storeEmp(Request $request){

        $study_name = $request -> zakres;
        $subject_name = $request -> przedmiot;

        DB::table('field_of_studies')->updateOrInsert([
            'name' => $study_name
        ]);
        DB::table('subjects')->updateOrInsert([
            'name' => $subject_name
        ]);

        $study_id = DB::table('field_of_studies')
            ->select(DB::raw('field_of_studies.id'))
            ->where('field_of_studies.name', '=', $study_name)
            ->value('id');

        $subject_id = DB::table('subjects')
            ->select(DB::raw('subjects.id'))
            ->where('subjects.name', '=', $subject_name)
            ->value('id');

        DB::table('practicioner_employments')->updateOrInsert([
            'field_of_study_id' => $study_id,
            'practicioner_id' => $request -> pid,
            'subject_id' => $subject_id,
            'semester' => $request -> semestr,
            'year' => $request -> rok

        ]);

        return response()->json([
            'status' => 200,
        ]);
    }
    public function editRole(Request $request) {
        $id = $request->id;
        $pid = $request->pid;

        $role_start = DB::table('practicioner_roles')
            ->select(DB::raw('practicioner_roles.start_date'))
            ->where('practicioner_roles.id', '=', $id)
            ->value('start_date');
        $role_finish = DB::table('practicioner_roles')
            ->select(DB::raw('practicioner_roles.finish_date'))
            ->where('practicioner_roles.id', '=', $id)
            ->value('finish_date');
        $role_name2 = DB::table('practicioner_roles')
            ->select(DB::raw('practicioner_roles.name'))
            ->where('practicioner_roles.id', '=', $id)
            ->value('name');

        return response()->json([
            'id' => $id,
            'pid' => $pid,
            'poczatek' => $role_start,
            'koniec' => $role_finish,
            'rola' => $role_name2
        ]);
    }
    public function updateRole(Request $request) {



        DB::table('practicioner_roles')
            //->where('practicioner_roles.id', $request->id)
            ->updateOrInsert(
                ['id' => $request->id],
                ['practicioner_id' => $request->pid, 'start_date'=>$request->poczatek, 'finish_date'=>$request->koniec,'name'=>$request->rola]
            );


        return response()->json([
            'status' => 200,
        ]);
    }

}
