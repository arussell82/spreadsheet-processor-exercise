import java.text.DecimalFormat;

/**
 * SpreadsheetProcessor
 */
class Solution {

    private double totalMonthlyPayment = 0.0;

    public static void main(String[] args) {
       new Solution().run();        
    }

    public void run() {
        // employees list array
        Employee[] employeesList1 = {      
            new Employee(1, "Patel Alford", -753.11, false),
            new Employee(2, "Cecelia Skinner", 111.41, true),
            new Employee(3, "Mcmahon Harmon", 273.36, true),
            new Employee(4, "Wilcox Nielsen", -456.21, false),
            new Employee(5, "Kerr Crawford", 723.79, false),
            new Employee(6, "Joan Cox", -96.5, false),
            new Employee(7, "Colleen Horton", 230.31, true),
        };
        assertEquals(employeesList1, 615.08);

        Employee[] employeesList2 = {
            new Employee(8, "Opal Merritt", 255.05, true), 
            new Employee(10, "Eliza Gallagher", -10.58, false),
        };
        assertEquals(employeesList2, 615.08);

        Employee[] employeesList3 = {
            new Employee(7, "Constance Foster", 366.58, true), 
            new Employee(8, "Latonya Burch", -300.72, false), 
            new Employee(0, "Pierce Kline", -638.94, false), 
            new Employee(1, "Geneva Hodges", 408.35, true), 
            new Employee(7, "Vonda House", 75.73, false),
        };
        assertEquals(employeesList3, 615.08);
    }

    // read employee list with validations
    private String readEmployeesList(Employee[] employeesList)
    {
        for (Employee employee : employeesList) {
            if (employee.getIsActive()) {

                if (employee.getMontlhyPayment() < 0) { // employee monthly payment is negative
                    return "The employee monthly payment is negative.";
                } 
                else if (employee.getId() <= 0) { // employee id is 0 or negative
                    return "The employee id is equal to 0 or negative.";
                } 
                else if ((employee.getName() == null) || employee.getName().isEmpty() || employee.getName().isBlank() || (employee.getName().length() == 0)) { // employee name is null or empty
                    return "The employee name is empty.";
                } 
                else {
                    setTotalMonthlyPayment(employee.getMontlhyPayment());
                }
            }
        }
        return getTotalMonthlyPayment();
    }

    // total monthly payment getter
    private String getTotalMonthlyPayment()
    {
        DecimalFormat df = new DecimalFormat("#.##");
        String formattedValue = df.format(totalMonthlyPayment);
        return formattedValue;
    }

    // total monthly payment setter
    private void setTotalMonthlyPayment(double employeePayment) {
        totalMonthlyPayment += employeePayment;
    }

    public static boolean isDouble(String input) {
        try {
            Double.parseDouble(input);
            return true;
        } catch (NumberFormatException e) {
            return false;
        }
    }

    // tester function
    private void assertEquals(Employee[] employeesList, double expectedTotal) {

        String actualTotal = readEmployeesList(employeesList);

        if (actualTotal.equals(Double.toString(expectedTotal))) {
            System.out.println(String.format("SUCCESS: The total payment is \"%s\"", expectedTotal));
        } else {
            System.out.println(String.format("FAILURE: The expected total payment is \"%s\" but got \"%s\"", expectedTotal, actualTotal));
        }
    }
}

class Employee {
    int id;
    String name;
    double monthlyPayment;
    boolean isActive;

    public Employee(int id, String name, double monthlyPayment, boolean isActive)
    {
        this.id = id;
        this.name = name;
        this.monthlyPayment = monthlyPayment;
        this.isActive = isActive;
    }

    public int getId() {
        return id;
    }

    public String getName() {
        return name;
    }

    public double getMontlhyPayment() {
        return monthlyPayment;
    }

    public boolean getIsActive() {
        return isActive;
    }
}