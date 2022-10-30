Feature: checkout
  In order to buy a product
  As a buyer
  I need to be able to checkout the products in my shopping cart

  Scenario: order several products
    Given I have a product with $200 price
    And I have a product with $300 price
    When I go to the checkout process
    Then I should see that the total number of products is 2
    And my order amount total is $500
