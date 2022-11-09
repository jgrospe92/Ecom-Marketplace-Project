Feature: checkout
  In order to checkout a product
  As a buyer
  I need to be able to checkout the products in my shopping cart

  Scenario: check out a products
    Given I have the "widget" product that costs "100$" and has the "This is a widget" description
    And I am on "/Catalog"
    And I click "widget"
    When I click "add to cart"
    And I see "added to cart" message
    When I l click "cart" icon
    Then I am on /"buyer/cart"
    And I see order number "1234"
    And I see "1" item on the cart
    And I see "$100" total price
    When I click "pay"
    Then I see "Confirm payment"
    And I click "yes"
    And I see "order received" alert
    And I see "0" item on the cart
    And I see "Empty cart" message
   
    