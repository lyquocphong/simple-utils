<?php

namespace LeadDesk;

use LeadDeskTasks\MaxSubarray;
use InvalidArgumentException;
use LeadDeskTasks\Anagram;

/**
 * @author Phong Ly <lyquocphong@gmail.com>
 */
class Utils implements MaxSubarray, Anagram
{
    /**
     * {@inheritdoc}
     */
    public function contiguous(array $array): int
    {
        /** @var int $sumAtIndex The sum at the current index **/
        $sumAtIndex = $array[0];

        /** @var int $maxSum The maximum sum during the loop **/
        $maxSum = $array[0];

        /** @var int $count The length of the input **/
        $count = count($array);

        if ($count < 1) {
            throw new InvalidArgumentException('The input must contain at least one element');
        }

        for ($i = 1; $i < $count; $i++) {
            $sumAtIndex = max((int) $array[$i], (int) $sumAtIndex + $array[$i]);
            $maxSum = max($maxSum, $sumAtIndex);
        }

        return $maxSum;
    }

    /**
     * {@inheritdoc}
     */
    public function isAnagram(string $word1, string $word2): bool
    {
        /** @var int $word1Length The length of word 1 **/
        $word1Length = strlen($word1);

        /** @var int $word2Length The length of word 2 **/
        $word2Length = strlen($word2);

        /** If word2 is angram of word1, both should have same length */
        if ($word1Length !== $word2Length) {
            return false;
        }

        /** 
         * @var array $occurence This array will keep track how many time character occur in the string 
         * 
         * I know that there is function call char_count but I would like to use my skill to implemeted it
         * 
         */
        $occurence = [];


        /**
         * At first we need to keep track the occurrence of character in word 1
         */
        for($i = 0; $i < $word1Length; $i++) {
        	$character = $word1[$i];
            if (!isset($occurence[$character])) {
                $occurence[$character] = 0;
            }

            $occurence[$character] += 1;
        }
        

        /**
         * After that we need to check each character in word 2
         */
        for($i = 0; $i < $word2Length; $i++) {
            $character = $word2[$i];
            // In case character is not in the occurence table, it means this is not anagram
            if (!isset($occurence[$character])) {
                return false;
            }

            // We reduce the time character occur
            $occurence[$character] -= 1;

            /**
             * If the remain less than 0, it means the current character in word 2 appear more than in the word 1
             * so word 2 is not anagram of word 1
             */
            if ($occurence[$character] < 0) {
                return false;
            }
        }

        return true;
    }
}
