<?php

namespace LeadDeskTests;

use LeadDesk\Utils;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;

/**
 * @author Phong Ly <lyquocphong@gmail.com>
 * @covers LeadDesk\Utils::contiguous
 */
class ContiguosFunctionTest extends TestCase
{
    /** 
    * @var Utils
    */
    protected $utils;

    /**
     * The setup function, run before each test
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->utils = new Utils();
    }
    
    
    /**     
     * @testdox Test the functionality of contiguous
     *
     * @return void
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
     * @testdox Test contiguos function will return the value of first item
     * in case the input array has only one item
     *
     * @return void
     */
    public function testWithArrayHasOneItem(): void
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
     * @testdox Test the function contiguous throw exception when input is empty array
     *
     * @return void
     */
    public function testThrowExceptionWhenInputIsEmpty(): void
    {
        $input = [];
        $this->expectException(InvalidArgumentException::class);
        $this->utils->contiguous($input);
    }
}
