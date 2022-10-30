Feature: promotion
  In order to buy discounted product
  As a buyer
  I need to be able to buy discounted product

  Scenario: buy discounted product
    Given I purchase a product with $600 price
    And I add the discount code for $50
    When I go to the checkout process
    Then I should see that the total number of products is 1
    And my order amount is $550
