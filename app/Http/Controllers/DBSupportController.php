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
    public function addEmailColumn(){
        Schema::table('persons', function ($table){
            $table->string('email', 255);
        });
    }

    public function renameColumn(){
        Schema::table('persons', function ($table){
            $table->renameColumn('email', 'phonenumber');
        });
    }
    //Add
    //Schema::table($tablename, function($table){
    //$table->dataType('columnName');
    //});

    //Drop
    //Schema::drop('tableName');
    //Schema::dropIfExists('tableName';

    //Rename
    //Schema::rename('oldName', 'newName');

    public function createPosts(){
        Schema::create('posts', function ($table){
            $table->increments('id');
            $table->string('title',255);
            $table->text('content');
            $table->integer('p_id')->unsigned();
            $table->timestamps();
            $table->foreign('p_id')->references('id')->on('persons')->onDelete('cascade');
        });
    }

}
