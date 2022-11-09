Feature: dashboard
  In order to see vendor income report
  As a vendor
  I need to be able to see income report monthly or annually

  Scenario: view monthly report
    Given I log in with my "vendor" account
    And I have username "vendor3000" with password "2222"
    And I see a "login successful"
    Then I am redirected to the marketplace "/home"
    And I click "profile" icon on the navigation bar
    Then I am on "/vendor/profile"
    And I click "dashboard"
    When I click "sales"
    And I selected "monthly" on the filter by dropdown option
    And I see that for the month of "January" I have total profit of "$3000"
    And I see that for the month of "February" I have total profit of "$2000"
    And I see that for the month of "March" I have total profit of "$1000"

  Scenario: view annual report
    Given I log in with my "vendor" account
    And I have username "vendor3000" with password "2222"
    And I see a "login successful"
    Then I am redirected to the marketplace "/home"
    And I click "profile" icon on the navigation bar
    Then I am on "/vendor/profile"
    And I click "dashboard"
    When I click "sales"
    And I selected "annually" on the filter by dropdown option
    And I see that for the year of "2021" I have total profit of "$70000"
    And I see that for the year of "2020" I have total profit of "$60000"
    And I see that for the year of "2019" I have total profit of "$90000"
