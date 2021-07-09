<?php

namespace Tests\Unit;

use App\Models\categories;
use App\Models\images;
use App\Models\procat;
use App\Models\Product;
use App\Models\sizes;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_product_is_inserted()
    {
        $product=Product::factory()->create();
        $size=sizes::factory()->create();
        $image=images::factory()->create();
        categories::factory()->create();
        $procat=procat::factory()->create();
        $this->assertDatabaseHas('products',['name'=>$product->name,'price'=>$product->price,'description'=>$product->description]);
        $this->assertDatabaseHas('sizes',['product_id'=>$size->product_id,'size'=>$size->size,'sku'=>$size->sku]);
        $this->assertDatabaseHas('images',['product_id'=>$image->product_id,'image'=>$image->image]);
        $this->assertDatabaseHas('procats',['product_id'=>$procat->product_id,'category_id'=>$procat->category_id]);
    }
}
