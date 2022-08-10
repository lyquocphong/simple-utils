<?php

namespace LeadDeskTests;

use LeadDesk\Utils;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;

/**
 * @author Phong Ly <lyquocphong@gmail.com>
 * @covers LeadDesk\Utils::isAnagram
 */
class IsAnagramFunctionTest extends TestCase
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
     * @covers ::isAnagram
     * @testdox Test the functionality of isAnagram
     *
     * @return void
     */
    public function testFunctionality(): void
    {
        $word1 = 'SILENT';
        $word2 = 'LISTEN';
        $actual = $this->utils->isAnagram($word1, $word2);        
        $this->assertTrue($actual);

        $word1 = 'ANAGRAM';
        $word2 = 'NAGARAM';
        $actual = $this->utils->isAnagram($word1, $word2);        
        $this->assertTrue($actual);
    }

    /**
     * @covers ::isAnagram
     * @testdox Test isAnagram with 2 words has difference length
     *
     * @return void
     */
    public function testWithDifferenceLength(): void
    {
        $word1 = 'ABC';
        $word2 = 'ABCD';
        $actual = $this->utils->isAnagram($word1, $word2);
        $expected = false;
        $this->assertFalse($actual);

        $word1 = 'RAT';
        $word2 = 'CAR';
        $actual = $this->utils->isAnagram($word1, $word2);
        $expected = false;
        $this->assertFalse($actual);
    }

    /** 
     * @covers ::isAnagram
     * @testdox Test the function isAnagram with 2 words with is difference character appearance
     *
     * @return void
     */
    public function testWithDifferenceCharacterOccur(): void
    {
        $word1 = 'ABCE';
        $word2 = 'ABCC';
        $actual = $this->utils->isAnagram($word1, $word2);
        $expected = false;
        $this->assertFalse($expected, $actual);
    }
}
