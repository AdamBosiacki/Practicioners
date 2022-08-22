<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Practicioner;
use App\Models\FieldOfKnowledge;
use App\Models\PracticionerFieldOfKnowledge;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class PracticionerController extends Controller
{
    public function __construct(){
        $this->middleware(["auth","moderator"]);
    }
    public function index() {
        return view('practicioners');
    }

    public function fetchAll() {
        $practicioners = Practicioner::all();
        $output = '';
        if ($practicioners->count() > 0) {
            $output .= '<table class="table table-striped table-sm text-center align-middle">
            <thead>
              <tr>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Telefon</th>
                <th>Email</th>
                <th>Stawka</th>
                <th>Dostępność</th>
                <th>Kontakt</th>
                <th>Wiedza</th>
                <th>Action</th>
                <th>Więcej</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($practicioners as $emp) {



                $id_prac = $emp->id;
                $route="PracticionerDetails/".$id_prac;
                $prac_know = DB::table('field_of_knowledges')
                    ->join('practicioner_field_of_knowledge', 'field_of_knowledges.id', '=', 'practicioner_field_of_knowledge.field_of_knowledge_id')
                    ->join('practicioners', 'practicioner_field_of_knowledge.practicioner_id', '=', 'practicioners.id')
                    ->select(DB::raw('field_of_knowledges.name'))
                    ->where('practicioner_field_of_knowledge.practicioner_id', '=', $id_prac)
                    ->value('name');
                $output .= '<tr>

                <td>' . $emp->first_name . '</td>
                <td>' . $emp->last_name . '</td>
                <td>' . $emp->phone . '</td>
                <td>' . $emp->email . '</td>
                <td>' . $emp->hourly_rate . '</td>
                <td>' . $emp->availability . '</td>
                <td>' . $emp->contact_source . '</td>
                <td>' . $prac_know . '</td>
                <td>
                  <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editPracticionerModal"><i class="bi-pencil-square h4"></i></a>

                  <a href="#" id="' . $emp->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
                <td><a href="'.$route.'">Więcej info</a> </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }
    }

    public function store(Request $request, Practicioner $practicioner,PracticionerFieldOfKnowledge $practicionerieldfnowledge, FieldOfKnowledge $fieldofknowledge) {

        $practicioner->create(['first_name' => $request->first_name, 'last_name' => $request->last_name, 'phone' => $request->phone, 'email' => $request->email, 'hourly_rate' => $request->hourly_rate, 'availability' => $request->availability, 'contact_source' => $request->contact_source]);

        if(isset($request->field_of_knowledges)){
        $know_name = $request -> field_of_knowledges;
        $prac_name = $request -> email;

        DB::table('field_of_knowledges')->updateOrInsert([
            'name' => $know_name
        ]);

        $know_id = DB::table('field_of_knowledges')
            ->select(DB::raw('field_of_knowledges.id'))
            ->where('field_of_knowledges.name', '=', $know_name)
            ->value('id');

        $prac_id = DB::table('practicioners')
            ->select(DB::raw('practicioners.id'))
            ->where('practicioners.email', '=', $prac_name)
            ->value('id');

        DB::table('practicioner_field_of_knowledge')->updateOrInsert([
            'practicioner_id' => $prac_id,
            'field_of_knowledge_id' => $know_id
        ]);}

        return response()->json([
            'status' => 200,
        ]);
    }

    public function edit(Request $request) {
        $id = $request->id;

        $prac_first_name = DB::table('practicioners')
            ->select(DB::raw('practicioners.first_name'))
            ->where('practicioners.id', '=', $id)
            ->value('first_name');

        $prac_last_name = DB::table('practicioners')
            ->select(DB::raw('practicioners.last_name'))
            ->where('practicioners.id', '=', $id)
            ->value('last_name');

        $prac_phone = DB::table('practicioners')
            ->select(DB::raw('practicioners.phone'))
            ->where('practicioners.id', '=', $id)
            ->value('phone');

        $prac_email = DB::table('practicioners')
            ->select(DB::raw('practicioners.email'))
            ->where('practicioners.id', '=', $id)
            ->value('email');

        $prac_hourly_rate = DB::table('practicioners')
            ->select(DB::raw('practicioners.hourly_rate'))
            ->where('practicioners.id', '=', $id)
            ->value('hourly_rate');

        $prac_availability = DB::table('practicioners')
            ->select(DB::raw('practicioners.availability'))
            ->where('practicioners.id', '=', $id)
            ->value('availability');

        $prac_cur_company = DB::table('practicioners')
            ->select(DB::raw('practicioners.cur_company'))
            ->where('practicioners.id', '=', $id)
            ->value('cur_company');

        $prac_cur_position = DB::table('practicioners')
            ->select(DB::raw('practicioners.cur_position'))
            ->where('practicioners.id', '=', $id)
            ->value('cur_position');

        $prac_contact_source = DB::table('practicioners')
            ->select(DB::raw('practicioners.contact_source'))
            ->where('practicioners.id', '=', $id)
            ->value('contact_source');

        $prac_know2 = DB::table('field_of_knowledges')
            ->join('practicioner_field_of_knowledge', 'field_of_knowledges.id', '=', 'practicioner_field_of_knowledge.field_of_knowledge_id')
            ->join('practicioners', 'practicioner_field_of_knowledge.practicioner_id', '=', 'practicioners.id')
            ->select(DB::raw('field_of_knowledges.name'))
            ->where('practicioner_field_of_knowledge.practicioner_id', '=', $id)
            ->value('name');

        return response()->json([
            'id' => $id,
            'first_name' => $prac_first_name,
            'last_name' => $prac_last_name,
            'phone' => $prac_phone,
            'email' => $prac_email,
            'hourly_rate' => $prac_hourly_rate,
            'availability' => $prac_availability,
            'cur_company' => $prac_cur_company,
            'cur_position' => $prac_cur_position,
            'contact_source' => $prac_contact_source,
            'field_of_knowledges' => $prac_know2
        ]);
    }

    public function update(Request $request, Practicioner $practicioner,PracticionerFieldOfKnowledge $practicionerieldfnowledge, FieldOfKnowledge $fieldofknowledge) {

        /*$emp = Practicioner::find($request->id);
        $empData = ['first_name' => $request->first_name, 'last_name' => $request->last_name, 'phone' => $request->phone, 'email' => $request->email, 'hourly_rate' => $request->hourly_rate, 'availability' => $request->availability, 'contact_source' => $request->contact_source];
        $emp->update($empData);
        return response()->json([
            'status' => 200,
        ]);*/

        $practicioner2 = Practicioner::find($request->id);
        $empData = ['first_name' => $request->first_name, 'last_name' => $request->last_name, 'phone' => $request->phone, 'email' => $request->email, 'hourly_rate' => $request->hourly_rate, 'availability' => $request->availability, 'contact_source' => $request->contact_source];
        $practicioner2->update($empData);

        if(!$request -> field_of_knowledges){
            PracticionerFieldOfKnowledge::where('practicioner_id', $request->id)->delete();
        }

        if(isset($request -> field_of_knowledges)){
            PracticionerFieldOfKnowledge::where('practicioner_id', $request->id)->delete();
        $know_name = $request -> field_of_knowledges;
        $prac_name = $request -> email;

        DB::table('field_of_knowledges')->updateOrInsert([
            'name' => $know_name
        ]);

        $know_id = DB::table('field_of_knowledges')
            ->select(DB::raw('field_of_knowledges.id'))
            ->where('field_of_knowledges.name', '=', $know_name)
            ->value('id');

        $prac_id = DB::table('practicioners')
            ->select(DB::raw('practicioners.id'))
            ->where('practicioners.email', '=', $prac_name)
            ->value('id');

        DB::table('practicioner_field_of_knowledge')->updateOrInsert([
            'practicioner_id' => $prac_id,
            'field_of_knowledge_id' => $know_id
        ]);}



        return response()->json([
            'status' => 200,
        ]);
    }

    public function delete(Request $request) {

        $id = $request->id;
        DB::table("practicioner_field_of_knowledge")->where("practicioner_id",'=',$id)->delete();
        DB::table("practicioner_roles")->where("practicioner_id",'=',$id)->delete();
        DB::table("practicioners")->where("id",'=',$id)->delete();
        return response()->json([
            'status' => 200,
        ]);
    }
}

