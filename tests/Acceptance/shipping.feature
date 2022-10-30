Feature: shipping
  In order to mark an order completed
  As a vendor
  I need to be able mark an order completed

  Scenario: shipping a product
    Given I have an order
    When the order is received by the buyer
    Then I should be able to mark the order completed
  
  Scenario: change expected delivery date
    Given An order is delayed
    When I update the expected delivery date
    Then the buyer should see the new expected delivery date
