<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProfileTest extends TestCase
{
    public function test_profile_feature_is_not_part_of_temu(): void
    {
        $this->assertFalse(
            \Illuminate\Support\Facades\Route::has('profile.edit')
        );
    }
}
