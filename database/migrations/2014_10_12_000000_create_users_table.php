<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('type');
            $table->unsignedBigInteger('branch_id');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign("branch_id")->references("id")->on("branches")->onDelete("cascade");
        });

        foreach (
            [
                [
                    "name" => "Admin",
                    "email" => "admin@gmail.com",
                    "password" => "admin123",
                    "type" => "admin",
                    "branch_id" => 1
                ],
                [
                    "name" => "Broker",
                    "email" => "broker@gmail.com",
                    "password" => "broker123",
                    "type" => "broker",
                    "branch_id" => 1
                ],
                [
                    "name" => "Underwriting",
                    "email" => "under@gmail.com",
                    "password" => "under123",
                    "type" => "underwriting",
                    "branch_id" => 1
                ],
                [
                    "name" => "Policy Processor",
                    "email" => "policy@gmail.com",
                    "password" => "policy123",
                    "type" => "policy",
                    "branch_id" => 1
                ]
            ] as $data
        ) {
            User::create([
                "name" => $data["name"],
                "email" => $data["email"],
                "password" => Hash::make($data["password"]),
                "type" => $data["type"],
                "branch_id" => $data["branch_id"]
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('users');
    }
};
