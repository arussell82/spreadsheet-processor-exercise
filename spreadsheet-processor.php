<?php

class SpreadsheetProcessor
{

    private $totalMonthlyPayment = 0;

    // Constructor method
    public function __construct() {
        
        // employees list array
        $employeesList1 = 
        [
            [
                "id" => 4,
                "name" => "Wilcox Nielsen",
                "monthlyPayment" => -456.21,
                "isActive" => false
            ],
            [
                "id" => 5,
                "name" => "Colleen Horton",
                "monthlyPayment" => 230.31,
                "isActive" => true
            ],
            [
                "id" => 2,
                "name" => "Cecelia Skinner",
                "monthlyPayment" => 111.41,
                "isActive" => true
            ],
            [
                "id" => 1,
                "name" => "Patel Alford",
                "monthlyPayment" => -753.11,
                "isActive" => false
            ],
            [
                "id" => 3,
                "name" => "Mcmahon Harmon",
                "monthlyPayment" => 273.36,
                "isActive" => true
            ],
            [
                "id" => 2,
                "name" => "Kerr Crawford",
                "monthlyPayment" => 723.79,
                "isActive" => false
            ],
            [
                "id" => 9,
                "name" => "Joan Cox",
                "monthlyPayment" => -96.5,
                "isActive" => false
            ]
        ];
        $this->assertEquals($employeesList1, 615.08);

        $employeesList2 = [
            [
            "id" => 8,
            "name" => "Opal Merritt",
            "monthlyPayment" => 255,
            "isActive" => true
            ],
            [
            "id" => 10,
            "name" => "Eliza Gallagher",
            "monthlyPayment" => -10.58,
            "isActive" => false
            ]
        ];
        $this->assertEquals($employeesList2, 615.08);

        $employeesList3 = [
            [
            "id" => 7,
            "name" => "Constance Foster",
            "monthlyPayment" => 366.58,
            "isActive" => true
            ],
            [
            "id" => 8,
            "name" => "Latonya Burch",
            "monthlyPayment" => -300.72,
            "isActive" => false
            ],
            [
            "id" => 0,
            "name" => "Pierce Kline",
            "monthlyPayment" => -638.94,
            "isActive" => false
            ],
            [
            "id" => 1,
            "name" => "Geneva Hodges",
            "monthlyPayment" => 408.35,
            "isActive" => true
            ],
            [
            "id" => 7,
            "name" => "Vonda House",
            "monthlyPayment" => 75.73,
            "isActive" => false
            ]
        ];
        $this->assertEquals($employeesList3, 615.08);
    }

    // read employee list with validations
    private function readEmployeesList($employeesList)
    {
        foreach ($employeesList as $employee) {
            if ($employee['isActive']) {

                if (!is_float($employee['monthlyPayment'])) { // employee monthly payment is a float
                    return  "The employee monthly payment is not a float number.";
                }
                elseif ($employee['monthlyPayment'] < 0) { // employee monthly payment is negative
                    return  "The employee monthly payment is negative.";
                }         
                elseif (!is_int($employee['id'])) { // employee id is an int
                    return  "The employee id is not an integer number.";
                } 
                elseif ($employee['id'] <= 0) { // employee id is 0 or negative
                    return  "The employee id is equal to 0 or negative.";
                } 
                elseif (!isset($employee['name']) || empty(trim($employee['name']))) { // employee name is null or empty
                    return  "The employee name is empty.";
                } 
                else {            
                    $this->setTotalMontlyPayment($employee['monthlyPayment']);
                }
                        
            }
        }

        return $this->getTotalMonthlyPayment($employeesList);
    }

    // total monthly payment getter
    private function getTotalMonthlyPayment()
    {
        return $this->totalMonthlyPayment;
    }

    // total monthly payment setter
    private function setTotalMontlyPayment($employeePayment) {
        $this->totalMonthlyPayment += $employeePayment;
    }

    // tester function
    private function assertEquals($employeesList, $expectedTotal)
    {
        $actualTotal = $this->readEmployeesList($employeesList);

        if($actualTotal == $expectedTotal) {
            echo  "SUCCESS: The total payment is " . $actualTotal . PHP_EOL;
        } else {
            echo  "FAILURE: The expected total payment is " . $expectedTotal . ' but got "' . $actualTotal .'"'. PHP_EOL;
        }
        
    }
}

// Create a new SpreadsheetProcessor object and call the constructor
$employees = new SpreadsheetProcessor();