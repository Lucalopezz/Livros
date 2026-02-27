<?php

use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // criando algumas permissões a serem utilizadas pela aplicação
        Permission::firstOrCreate(['name' => 'grad']);
        Permission::firstOrCreate(['name' => 'posgrad']);
        Permission::firstOrCreate(['name' => 'academica']);
        Permission::firstOrCreate(['name' => 'financeira']);
        Permission::firstOrCreate(['name' => 'administrativa']);

        // criando role e tribuindo permissões a ela
        $role = Role::firstOrCreate(['name' => 'diretoria']);
        $role->givePermissionTo(['academica', 'financeira', 'administrativa']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // removendo as permissões criadas
        Permission::whereIn('name', ['grad', 'posgrad', 'academica', 'financeira', 'administrativa'])->delete();
        Role::where('name', 'diretoria')->delete();
    }
};
