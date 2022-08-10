# LeadDesk Assignment

This project is the implementation of the LeadDesk assignment and it used this repo https://github.com/microsoft/vscode-remote-try-php as development container in visual studio code

## Description

This project will provide the Utils class which provides these functions:

1. contiguous which has input is in array of integer and return the maximum sum of sub arrays

Example: 

[-1, 1, 5, -6, 3] => maximum contiguous sum is 6 (1+5)

[1] => 1

[] => throw InvalidArgumentException for empty array

2. isAnagram which has 2 inputs (word1 and word2), and it will return true if they are the anagram of each other. Otherwise it return false

Example:

('CAT','RAT') => false

('SILENT','LISTEN') => true

('ABCD', 'ABCC') => false

## Getting Started


### Dependencies

* PHP 7.4
* PhpUnit 9

### Testing

```
php ./vendor/bin/phpunit --colors=always -c phpunit.xml 
```

## Authors
[Phong Ly] <lyquocphong@gmail.com>

## Version History

* 0.1
    * Initial Release