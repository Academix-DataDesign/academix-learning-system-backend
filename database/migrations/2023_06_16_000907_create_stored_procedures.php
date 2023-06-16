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
        // Check if the stored procedures exist before creating them
        $procedureExists = DB::select("SHOW PROCEDURE STATUS WHERE Db = DATABASE() AND Name IN ('GetUserByID', 'EnrollStudent')");

        $existingProcedures = collect($procedureExists)->pluck('Name')->all();

        $proceduresToCreate = [
            'GetUserByID' => "
                CREATE PROCEDURE GetUserByID (IN userID INT)
                BEGIN
                    SELECT * FROM users WHERE id = userID;
                END
            ",
            'EnrollStudent' => "
                CREATE PROCEDURE EnrollStudent (IN studentID INT, IN courseID INT)
                BEGIN
                    INSERT INTO enrollments (student_id, course_id, enrolled_at, created_at, updated_at)
                    VALUES (studentID, courseID, NOW(), NOW(), NOW());
                END
            "
        ];

        foreach ($proceduresToCreate as $procedureName => $procedureCode) {
            if (!in_array($procedureName, $existingProcedures)) {
                // Create the stored procedure
                DB::statement($procedureCode);
            }
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
