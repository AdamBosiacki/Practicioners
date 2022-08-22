<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //users
        DB::table('users')->insert([
            'name'=>'admin',
            'surname'=>'admin',
            'email'=>'admin@admin.pl',
            'password'=>Hash::make("admin"),
            'role'=>'a'
        ]);
        DB::table('users')->insert([
            'name'=>'moderator',
            'surname'=>'moderator',
            'email'=>'moderator@moderator.pl',
            'password'=>Hash::make("moderator"),
            'role'=>'m'
        ]);
        //practicioners
        DB::table("practicioners")->insert([
            'id'=>1,
            'first_name'=>'Jan',
            'last_name'=>"Kowalski",
            'phone'=>'512986071',
            'email'=>'jkowalski@gmail.com',
            'hourly_rate'=>140,
            'availability'=>'pon:15-20,pt:8-12',
            'cur_company'=>'ARP Ideas',
            'cur_position'=>'.NET Developer',
            'contact_source'=>'w'
        ]);
        DB::table("practicioners")->insert([
            'id'=>2,
            'first_name'=>'Adam',
            'last_name'=>"Nowak",
            'phone'=>'697320025',
            'email'=>'anowak2@gmail.com',
            'hourly_rate'=>175,
            'availability'=>'wt:14-18,czw:8-15',
            'cur_company'=>'Sii',
            'cur_position'=>'SQL Developer',
            'contact_source'=>'z'
        ]);
        //fields of knowledge
        DB::table('field_of_knowledges')->insert([
            'name'=>'Bazy danych',
            'id'=>1
        ]);
        DB::table('field_of_knowledges')->insert([
            'name'=>'.NET',
            'id'=>2
        ]);
        DB::table('field_of_knowledges')->insert([
            'name'=>'Aplikacja internetowe',
            'id'=>3
        ]);
        //practicioner field of knowledge
        DB::table("practicioner_field_of_knowledge")->insert([
            'practicioner_id'=>1,
            'field_of_knowledge_id'=>2
        ]);
        DB::table("practicioner_field_of_knowledge")->insert([
            'practicioner_id'=>1,
            'field_of_knowledge_id'=>3
        ]);
        DB::table("practicioner_field_of_knowledge")->insert([
            'practicioner_id'=>2,
            'field_of_knowledge_id'=>1
        ]);
        DB::table("practicioner_field_of_knowledge")->insert([
            'practicioner_id'=>2,
            'field_of_knowledge_id'=>2
        ]);
        //universities
        DB::table('universities')->insert([
            "id"=>1,
            "name"=>"Politechnika Poznańska"
        ]);
        DB::table('universities')->insert([
            "id"=>2,
            "name"=>"UAM"
        ]);
        DB::table('universities')->insert([
            "id"=>3,
            "name"=>"Wyższa Szkoła Logistyczna"
        ]);
        //-------------------------------------------
        DB::table("subjects")->insert([
            'id'=>1,
            'name'=>"Inżynieria Oprogramowania"
        ]);
        DB::table("subjects")->insert([
            'id'=>2,
            'name'=>"Wstęp do programowania"
        ]);
        DB::table("field_of_studies")->insert([
            'id'=>1,
            'name'=>'Wydział Informatyki'
        ]);
        DB::table("practicioner_employments")->insert([
            'field_of_study_id'=>1,
            'practicioner_id'=>1,
            'subject_id'=>1,
            'semester'=>"Z",
            'year'=>2018
        ]);
        DB::table("practicioner_employments")->insert([
            'field_of_study_id'=>1,
            'practicioner_id'=>2,
            'subject_id'=>2,
            'semester'=>"L",
            'year'=>2017
        ]);
        DB::table("practicioner_roles")->insert([
            'practicioner_id'=>1,
            'start_date'=>Carbon::parse("2015-03-01"),
            'finish_date'=>Carbon::parse("2018-01-01"),
            'name'=>"Koordynator praktyk na kierunku Informatyka"
        ]);
        DB::table("practicioner_roles")->insert([
            'practicioner_id'=>1,
            'start_date'=>Carbon::parse("2017-04-01"),
            'finish_date'=>Carbon::parse("2019-06-01"),
            'name'=>"Opiekun koła Game Wizards"
        ]);
        DB::table("practicioner_roles")->insert([
            'practicioner_id'=>2,
            'start_date'=>Carbon::parse("2017-09-31"),
            'name'=>"Ambasador kierunku Informatyka"
        ]);
        DB::table('practicioner_experiences')->insert([
            'practicioner_id'=>1,
            'start_date'=>Carbon::parse("2020-10-01"),
            'university_id'=>1,
            'field_of_knowledge_id'=>1
        ]);
        DB::table('practicioner_experiences')->insert([
            'practicioner_id'=>2,
            'start_date'=>Carbon::parse("2021-10-01"),
            'university_id'=>2,
            'field_of_knowledge_id'=>3
        ]);
    }
}
