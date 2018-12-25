<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->comment('用户id');
            $table->string('name')->comment('用户名');
            $table->string('phone')->nullable()->unique()->comment('手机号码');
            $table->string('email')->nullable()->unique()->comment('邮箱地址');
            $table->string('avatar')->nullable()->comment('用户头像');
            $table->text('introduction')->nullable()->comment('自我介绍');
            $table->boolean('email_verified')->default(false)->comment('邮箱激活');
            $table->string('password')->comment('用户密码');
            $table->rememberToken()->comment('记住我');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
