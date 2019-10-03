<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class DBSupportController extends Controller
{
    public function createPerson(){
        Schema::create('persons', function($table){
            $table->increments('id'); //Truong id tu dong tang
            $table->string('name', 50); //Truong name kieu varchar(50), mac dinh 255
            $table->timestamps(); //Tao hai truong created_at va updated_at
        });
    }
}
