<?php

namespace LeadDeskTests;

use LeadDesk\Utils;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;

/**
 * @covers LeadDesk\Utils
 */
class IsAnagramFunctionTest extends TestCase
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
     * @covers ::isAnagram
     * @testdox Test the functionality of isAnagram
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
