<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateStoredProcedures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $queries = [
            // Create stored procedure to get user by ID
            "
            CREATE PROCEDURE GetUserByID (IN userID INT)
            BEGIN
                SELECT * FROM users WHERE id = userID;
            END
            ",

            // Create stored procedure to enroll a student in a course
            "
            CREATE PROCEDURE EnrollStudent (IN studentID INT, IN courseID INT)
            BEGIN
                INSERT INTO enrollments (student_id, course_id, enrolled_at, created_at, updated_at)
                VALUES (studentID, courseID, NOW(), NOW(), NOW());
            END
            "
        ];

        foreach ($queries as $query) {
            DB::statement($query);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $procedures = ['GetUserByID', 'EnrollStudent'];

        foreach ($procedures as $procedure) {
            DB::statement("DROP PROCEDURE IF EXISTS $procedure");
        }
    }
}
