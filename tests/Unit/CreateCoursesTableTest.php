<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTableTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function testCoursesTableIsCreated()
    {
        // Assert that the courses table exists and has the expected columns
        $this->assertDatabaseTableHasColumns('courses', [
            'id',
            'category_id',
            'status_id',
            'language_id',
            'instructor_id',
            'level_id',
            'title',
            'description',
            'thumbnail_path',
            'duration',
            'wishes',
            'price',
            'certification',
            'bestseller',
            'created_at',
            'updated_at',
        ]);
    }

    /**
     * Assert that a database table has the expected columns.
     *
     * @param string $table
     * @param array $columns
     * @return void
     */

    /** @test */
    protected function assertDatabaseTableHasColumns(string $table, array $columns)
    {
        $this->assertTrue(Schema::hasColumns($table, $columns));
    }
}
