<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Division;
use App\Models\Divison;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DivisonController
 */
final class DivisonControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $divisons = Divison::factory()->count(3)->create();

        $response = $this->get(route('divisons.index'));

        $response->assertOk();
        $response->assertViewIs('division.index');
        $response->assertViewHas('divisions');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('divisons.create'));

        $response->assertOk();
        $response->assertViewIs('division.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DivisonController::class,
            'store',
            \App\Http\Requests\DivisonStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $title = $this->faker->sentence(4);
        $status = $this->faker->randomElement(/** enum_attributes **/);

        $response = $this->post(route('divisons.store'), [
            'title' => $title,
            'status' => $status,
        ]);

        $divisons = Division::query()
            ->where('title', $title)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $divisons);
        $divison = $divisons->first();

        $response->assertRedirect(route('division.index'));
        $response->assertSessionHas('division.title', $division->title);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $divison = Divison::factory()->create();

        $response = $this->get(route('divisons.show', $divison));

        $response->assertOk();
        $response->assertViewIs('division.show');
        $response->assertViewHas('division');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $divison = Divison::factory()->create();

        $response = $this->get(route('divisons.edit', $divison));

        $response->assertOk();
        $response->assertViewIs('division.edit');
        $response->assertViewHas('division');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DivisonController::class,
            'update',
            \App\Http\Requests\DivisonUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $divison = Divison::factory()->create();
        $title = $this->faker->sentence(4);
        $status = $this->faker->randomElement(/** enum_attributes **/);

        $response = $this->put(route('divisons.update', $divison), [
            'title' => $title,
            'status' => $status,
        ]);

        $divison->refresh();

        $response->assertRedirect(route('division.index'));
        $response->assertSessionHas('division.id', $division->id);

        $this->assertEquals($title, $divison->title);
        $this->assertEquals($status, $divison->status);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $divison = Divison::factory()->create();
        $divison = Division::factory()->create();

        $response = $this->delete(route('divisons.destroy', $divison));

        $response->assertRedirect(route('division.index'));

        $this->assertModelMissing($divison);
    }
}
