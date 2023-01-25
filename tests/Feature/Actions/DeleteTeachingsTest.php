<?php

use App\Actions\Teaching\DeleteTeaching;
use App\Models\Teaching;

test('DeleteTeaching action deletes the given teaching', function () {
   
    Teaching::factory()->create(['title'=>'To be Deleted']);
    $teaching = Teaching::where('title','To be Deleted')->first();
    
    $this->assertDatabaseHas('teachings', [
        'title' => 'To be Deleted',
    ]);
    
    DeleteTeaching::handle($teaching);

    $this->assertDatabaseMissing('teachings', [
        'title' => 'To be Deleted',
    ]);
});
