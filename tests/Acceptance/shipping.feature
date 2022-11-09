Feature: shipping
  In order to mark an order completed
  As a vendor
  I need to be able to mark an order completed

  Scenario: shipping a product
    Given I log in with my "vendor" account
    And I have username "vendor3000" with password "2222"
    And I see a "login successful"
    Then I am redirected to the marketplace "/home"
    And I click "profile" icon on the navigation bar
    Then I am on "/vendor/profile"
    And I click "check orders" button
    And I see a list of "order"
    And I click filter by "shipping status"
    And I see the order number "03321" with shipping status "delivered"
    And I see the order number "03321" has an order status of "In progress"
    And I click the dropdown option
    And I select "completed"
  