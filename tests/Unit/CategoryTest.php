<?php

namespace Tests\Unit;
use App\Models\categories;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create_category()
    {
        $category=categories::factory()->create();
        $this->assertDatabaseHas('categories',['cat_name'=>$category->cat_name]);

    }
    public function test_edit_category()
    {
        $category=categories::factory()->create();
        $name=$category->cat_name="hello";
        $this->assertDatabaseHas('categories',['cat_name'=>$name]);

    }
}
