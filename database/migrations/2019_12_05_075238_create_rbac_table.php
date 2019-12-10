<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateRbacTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username')->comment('管理员名称');
            $table->string('email')->nullable()->unique()->comment('邮箱');
            $table->string('mobile_phone')->unique()->comment('手机号');
            $table->string('password');
            $table->rememberToken();
            $table->integer('created_at')->unsigned();
            $table->integer('updated_at')->nullable()->unsigned();
        });
        DB::statement("ALTER TABLE admin comment'管理员表'");

        Schema::create('role', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50)->comment('角色名称');
            $table->tinyInteger('status')->default(1)->comment('状态，1启用、2关闭');
            $table->integer('created_at')->unsigned();
            $table->integer('updated_at')->nullable()->unsigned();
        });
        DB::statement("ALTER TABLE role comment'角色表'");

        Schema::create('permission', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50)->comment('权限名称');
            $table->string('code', 100)->comment('标识编号');
            $table->integer('module')->nullable()->comment('模块组');
            $table->integer('created_at')->unsigned();
            $table->integer('updated_at')->nullable()->unsigned();
        });
        DB::statement("ALTER TABLE permission comment'权限表'");

        Schema::create('admin_role', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('admin_id')->comment('管理员id');
            $table->integer('role_id')->comment('角色id');
            $table->integer('created_at')->unsigned();
            $table->integer('updated_at')->nullable()->unsigned();
        });
        DB::statement("ALTER TABLE admin_role comment'管理员角色表'");

        Schema::create('role_permission', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('role_id')->comment('角色id');
            $table->integer('permission_id')->comment('权限id');
            $table->integer('created_at')->unsigned();
            $table->integer('updated_at')->nullable()->unsigned();
        });
        DB::statement("ALTER TABLE role_permission comment'角色权限表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rbac');
    }
}
