Feature: dashboard
  In order to see income report
  As a vendor
  I need to be able to see income report monthly or annually

  Scenario: view monthly report
    Given I have sold $300 for the first week of the month
    And I have sold $600 for the second week of the month
    And I have sold $100 for the third week of the month
    And I have sold $0 for the fourth week of the month
    When I go my dashboard
    And I click monthly report
    Then I should see my total income for this month is $1000

  Scenario: view annual report
    Given I have sold $40000 for the year 2019
    And I have sold $60000 for the year 2020
    And I have sold $80000 for the year 2021
    When I go my dashboard
    And I click monthly report
    Then I should see my total income for last month is $1000
