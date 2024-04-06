<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $user = new User;
        $user->name = 'David Dupont        ';
        $user->email = 'david@gmail.com';
        $user->password = Hash::make('exemple');
        $user->save();

        $user1 = new User;
        $user1->name = 'Martin Dupont';
        $user1->email = 'martin@gmail.com';
        $user1->password = Hash::make('exemple1');
        $user1->save();

        $user2 = new User;
        $user2->name = 'Marie Dubois';
        $user2->email = 'marie@gmail.com';
        $user2->password = Hash::make('exemple2');
        $user2->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('default_user');
    }
};
