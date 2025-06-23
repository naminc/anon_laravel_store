<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('first_name')->after('user_id');
            $table->string('last_name')->after('first_name');
            $table->string('email')->after('last_name');
            $table->string('phone')->after('email');
            $table->string('address')->after('phone');
            $table->string('address2')->nullable()->after('address');
            $table->string('city')->after('address2');
            $table->string('state')->after('city');
            $table->string('zip')->after('state');
            $table->string('country')->after('zip');
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'first_name',
                'last_name',
                'email',
                'phone',
                'address',
                'address2',
                'city',
                'state',
                'zip',
                'country'
            ]);
        });
    }
};