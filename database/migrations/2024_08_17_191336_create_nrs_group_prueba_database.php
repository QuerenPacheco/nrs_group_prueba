<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateNrsGroupPruebaDatabase extends Migration
{
    /**
     * Ejecuta las migraciones.
     *
     * @return void
     */
    public function up()
    {
        $databaseName = 'nrs_group_prueba';

        $databases = DB::select('SHOW DATABASES');
        $databaseExists = collect($databases)->contains(function ($db) use ($databaseName) {
            return $db->Database === $databaseName;
        });

        if (!$databaseExists) {
            DB::statement("CREATE DATABASE {$databaseName}");
        }
    }

    /**
     * Revierte las migraciones.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP DATABASE IF EXISTS nrs_group_prueba_database');
    }
}