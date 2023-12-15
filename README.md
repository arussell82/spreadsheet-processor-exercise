# spreadsheet-processor-exercise
This is an exercise for creating a spreadsheet processor that implements a method to get the total payment for an employees list.

## Input format
The current code already has 3 examples of nested arrays with the proper structure\
If  you need to add additional test, you can add the following line of code inside the class constructor

- $this->assertEquals($inputArray, $expectedTotal);

Where the *$inputArray* is a neested array with the information or structure below and the *$expectedTotal* is a float number with the sum of the monthly payment for all the employees.

### Employee structure:
-	id (integer)
-	name (string)
-	monthlyPayment (float)
-	isActive (bool)

### Example nested array:
[\
	[\
		"id" => 1,\
		"name" => "Geneva Hodges",\
		"monthlyPayment" => 408.35,\
		"isActive" => true\
	],\
	[\
		"id" => 7,\
		"name" => "Vonda House",\
		"monthlyPayment" => 75.73,\
		"isActive" => false\
	]\
]


## How to execute the code
This code was written in PHP, in order to execute this code please follow the following instruccions

1. Open [Coderpad SandBox](https://coderpad.io/languages/php/) using the PHP Online IDE & Code Editor
2. Copy the code inside the "spreadsheet-processor.php" file
3. Paste the code in the coderpad editor (left section)
4. Click the "Run" button
5. The code output will appear in the coderpad right section

## Expected results
- SUCCESS: The total payment is X

- FAILURE: The expected total payment is X but got Y