<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;

class CreateTypesTableTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function types_table_exists()
    {
        $this->assertTrue(Schema::hasTable('types'));
    }

    /** @test */
    public function types_table_has_columns()
    {
        $this->assertTrue(Schema::hasColumns('types', [
            'id', 'name', 'created_at', 'updated_at'
        ]));
    }
}
