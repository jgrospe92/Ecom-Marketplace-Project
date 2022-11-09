Feature: promotion
  In order to buy discounted product
  As a buyer
  I need to be able to buy discounted product using discount code

  Scenario: buy discounted product
    Given that I log in with my "buyer" account
    And I click log in with  username "jeffrey" with password "1234"
    And I see a "login successful"
    Then I am redirected to the marketplace "/home"
    And Im on "/home"
    And I see "Promotions"
    And I see "Iphone 15" product with "Latest iphone" description 
    And I see the price is "$999"
    And I click "add to cart"
    When I check out my cart
    Then I should see the total number of products is 1
    And total cost "$999"
    And I enter the "OFF-100" discount code in the "discount" input
    And I click apply discount
    Then I see my total "$899"