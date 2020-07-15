<?php

namespace ProductDiscounter\Tests\Unit\Bundle;

use PHPUnit\Framework\TestCase;
use ProductDiscounter\Bundle\Bundle;

class BundleTest extends TestCase
{
    /** @test */
    public function can_be_built_from_persistence()
    {
        $bundle = Bundle::fromPersistence([
	        'id' => '1',
	        'productSkus' => ['TEST-1', 'TEST-2'],
	        'discountPercentage' => 10
        ]);

        $this->assertInstanceOf(Bundle::class, $bundle);
    }
}
