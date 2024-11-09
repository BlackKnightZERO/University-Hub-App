<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\District;
use App\Models\Divison;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DistrictController
 */
final class DistrictControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $districts = District::factory()->count(3)->create();

        $response = $this->get(route('districts.index'));

        $response->assertOk();
        $response->assertViewIs('district.index');
        $response->assertViewHas('districts');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $districts = District::factory()->count(3)->create();

        $response = $this->get(route('districts.create'));

        $response->assertOk();
        $response->assertViewIs('district.create');
        $response->assertViewHas('divisions');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DistrictController::class,
            'store',
            \App\Http\Requests\DistrictStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $title = $this->faker->sentence(4);
        $status = $this->faker->randomElement(/** enum_attributes **/);
        $divison = Divison::factory()->create();

        $response = $this->post(route('districts.store'), [
            'title' => $title,
            'status' => $status,
            'divison_id' => $divison->id,
        ]);

        $districts = District::query()
            ->where('title', $title)
            ->where('status', $status)
            ->where('divison_id', $divison->id)
            ->get();
        $this->assertCount(1, $districts);
        $district = $districts->first();

        $response->assertRedirect(route('district.index'));
        $response->assertSessionHas('district.title', $district->title);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $district = District::factory()->create();

        $response = $this->get(route('districts.show', $district));

        $response->assertOk();
        $response->assertViewIs('district.show');
        $response->assertViewHas('district');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $district = District::factory()->create();
        $districts = District::factory()->count(3)->create();

        $response = $this->get(route('districts.edit', $district));

        $response->assertOk();
        $response->assertViewIs('district.edit');
        $response->assertViewHas('divisons');
        $response->assertViewHas('district');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DistrictController::class,
            'update',
            \App\Http\Requests\DistrictUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $district = District::factory()->create();
        $title = $this->faker->sentence(4);
        $divison = Divison::factory()->create();
        $status = $this->faker->randomElement(/** enum_attributes **/);

        $response = $this->put(route('districts.update', $district), [
            'title' => $title,
            'divison_id' => $divison->id,
            'status' => $status,
        ]);

        $district->refresh();

        $response->assertRedirect(route('district.index'));
        $response->assertSessionHas('district.title', $district->title);

        $this->assertEquals($title, $district->title);
        $this->assertEquals($divison->id, $district->divison_id);
        $this->assertEquals($status, $district->status);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $district = District::factory()->create();

        $response = $this->delete(route('districts.destroy', $district));

        $response->assertRedirect(route('district.index'));

        $this->assertModelMissing($district);
    }
}
