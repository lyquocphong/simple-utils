<?php

namespace LeadDeskTests;

use LeadDesk\Utils;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;

/**
 * @covers LeadDesk\Utils
 */
class ContiguosFunctionTest extends TestCase
{
    /** 
    * @var Utils
    */
    protected $utils;

    protected function setUp(): void
    {
        parent::setUp();
        $this->utils = new Utils();
    }
    
    
    /**
     * @covers ::contiguous
     * @testdox Test the functionality of contiguous
     */
    public function testFunctionality(): void
    {
        $input = [-1, 1, 5, -6, 3];        
        $actual = $this->utils->contiguous($input);
        $expected = 6;
        $this->assertEquals($expected, $actual);

        $input = [-2, 1, -3, 4, -1, 2, 1, -5, 4];        
        $actual = $this->utils->contiguous($input);
        $expected = 6;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers ::contiguous
     * @testdox Test the functionality of contiguous
     */
    public function testWithArrayHasOneValue(): void
    {
        $input = [5];        
        $actual = $this->utils->contiguous($input);
        $expected = 5;
        $this->assertEquals($expected, $actual);

        $input = [2];        
        $actual = $this->utils->contiguous($input);
        $expected = 2;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers ::contiguous
     * @testdox Test the function contiguous throw exception when input is empty array
     */
    public function testThrowExceptionWhenInputIsEmpty(): void
    {
        $input = [];
        $this->expectException(InvalidArgumentException::class);
        $this->utils->contiguous($input);
    }
}
