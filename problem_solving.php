<?php
declare(strict_types=1);
/*
Problem 1:
Given a list of integers, find the minimum of their absolute values. 
Note: 'Absolute values' means the non-negative value without regard to its sign. For example, the Absolute value of 123 is 123, and the Absolute value of -123 is also 123. 
*/


  
function minAbsValue(string $integerList){

    function arrayFilter($array, $callback){
        $filteredArray=[];
        foreach($array as $item){
          if($callback($item)){
            $filteredArray[] = (int)$item;
          }
        }
        return $filteredArray;
      }
    // case1: eleminate elements other than integer.
    $inputValues = explode(' ', $integerList);
    $numbers = arrayFilter($inputValues, function($n){
        return filter_var($n, FILTER_VALIDATE_INT) !== false;
    });


    // case2: handling no value.
    if(count($numbers)<1){
        return null;
    }
    $minNum = $numbers[0];
    foreach($numbers as $intNum){
        if(abs($intNum)< $minNum){
        $minNum = abs($intNum);
        }
    }

    return $minNum;

}


echo "Minimum Abs value is: ". minAbsValue("2 -1.q. 3 5 -1");

echo "\n";


/*
Problem 2:
Given a few paragraphs in a file, read the file and count how many words are there. 
For example, if there is a file with the following contents:
Nunc ex lorem, ullamcorper ut eleifend ac, pellentesque non dolor.  
You need to output: 10
*/

function wordCountFromFile($filename){
    $word_counter = 0;
    // Checking if the file exists
    if (!file_exists($filename)) {
        return "File not found.";
    }
    // Reading the contents of the file
    $content = trim(file_get_contents($filename));
    $words = preg_split('/[\s\p{P}]+/', $content);

    foreach ($words as $word) {
        if(strlen($word)>0){
            $word_counter++;
        }
    }

    return $word_counter;
}

echo "Word count in file: " . wordCountFromFile("text_file.txt");

echo "\n";

/*
Problem 3:
Given a sentence, keep the order of the words same, but reverse the characters of each word. 
For example, if the given sentence is: ‘I love programming’ 
The result should be: ‘I evol gnimmargorp’
Here the order of the words is the same as the given sentence, but the order of the characters in the words is reversed. 
*/

function reverseWords(string $sentence):string{

    // Trim leading and trailing spaces
    $sentence = trim($sentence);
    
    $reversedSentence=[];
    $sentenceArray = explode(" ", $sentence);
    for($i=0; $i<count($sentenceArray); $i++) {
        $reversedWord = ""; 
        for ($j=strlen($sentenceArray[$i])-1; $j >=0 ; $j--) { 
            $reversedWord .= $sentenceArray[$i][$j];
        }
        $reversedSentence[] = $reversedWord;
    }

    return join(" ", $reversedSentence);
}


echo "Words Reversed:" . reverseWords("I love programming");

echo "\n";


/*
Problem 4:
Print the following pattern based on the given number n (can be any number). 
Sample input: 5 
Sample output: 
    *
   ***
  *****
 *******
*********
*/ 

function printTriangle(int $rows=5){

    // Case1: value less than 2: no triangle will be visualizable. 
    if($rows<2){
        echo "Please enter at least '2' to visualize the triangle.";
        return;
    }
    for ($i = 1; $i <= $rows; $i++) {
        // Printing spaces
        for ($j = $i; $j < $rows; $j++) {
            echo " ";
        }
        // Printing stars
        for ($k = 1; $k <= (2 * $i - 1); $k++) {
            echo "*";
        }
        echo "\n";
    }
}

printTriangle(6);


/*
Problem 5:
Given an integer n, find the sum of the digits of the integer.
Sample input 1: 62343
Sample output 1: 18
*/ 

function digitSum(int $value){
    
    // Check if the input is a valid integer
    if (!is_int($value)) {
        echo"The input must be an integer.";
    }
    // Handle negative numbers by converting them to positive
    $value = abs($value);
    $sum = 0;
    while($value>0){
        $lastDigit = $value % 10;
        $value = (int)($value/10);
        $sum +=$lastDigit;
    }
    
    return $sum;
}

echo "Sum of the digits: ". digitSum(11290);

?>