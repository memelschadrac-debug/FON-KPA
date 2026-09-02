<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\OptionChoice;
use App\Models\OptionGroup;
use App\Models\Product;
use Database\Seeders\CatalogSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CatalogDataTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(CatalogSeeder::class);
    }

    public function test_categories_are_seeded_correctly(): void
    {
        $this->assertDatabaseCount('categories', 8);

        $this->assertDatabaseHas('categories', [
            'slug' => 'garba',
            'name' => 'Garba',
            'is_active' => true,
        ]);

        $this->assertDatabaseHas('categories', [
            'slug' => 'poulet-braise',
            'name' => 'Poulet Braisé',
            'is_active' => true,
        ]);
    }

    public function test_products_are_seeded_with_valid_relations(): void
    {
        $this->assertDatabaseCount('products', 16);

        $product = Product::where('slug', 'garba-royal')->first();
        $this->assertNotNull($product);
        $this->assertEquals('Garba Royal', $product->name);
        $this->assertEquals(3500.00, $product->price);
        $this->assertTrue($product->is_featured);
        $this->assertTrue($product->is_available);

        // Relation catégorie
        $this->assertEquals('Garba', $product->category->name);

        // Relation images & media
        $this->assertGreaterThanOrEqual(1, $product->productImages()->count());
        $primaryImage = $product->productImages()->where('is_primary', true)->first();
        $this->assertNotNull($primaryImage);
        $this->assertNotNull($primaryImage->media);
        $this->assertNotEmpty($primaryImage->media->path);
    }

    public function test_option_groups_and_choices_are_correctly_linked(): void
    {
        $product = Product::where('slug', 'poulet-braise-alloco')->first();
        $this->assertNotNull($product);

        $groups = $product->optionGroups;
        $this->assertGreaterThanOrEqual(3, $groups->count());

        $sideGroup = $groups->firstWhere('name', 'Accompagnement au choix');
        $this->assertNotNull($sideGroup);
        $this->assertTrue($sideGroup->is_required);
        $this->assertEquals(1, $sideGroup->min_choices);
        $this->assertEquals(1, $sideGroup->max_choices);

        $choices = $sideGroup->optionChoices;
        $this->assertGreaterThanOrEqual(4, $choices->count());
        $this->assertTrue($choices->contains('name', 'Attiéké'));
        $this->assertTrue($choices->contains('name', 'Alloco'));
        $this->assertTrue($choices->contains('name', 'Riz blanc parfumé'));
    }

    public function test_category_has_products_relation(): void
    {
        $category = Category::where('slug', 'poulet-braise')->first();
        $this->assertNotNull($category);
        $this->assertGreaterThanOrEqual(2, $category->products()->count());
    }
}
