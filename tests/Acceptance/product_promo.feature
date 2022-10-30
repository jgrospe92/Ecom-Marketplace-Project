Feature: product_promo
  In order to add or remove discount to a product
  As a vendor
  I need to be able to list a discounted product

  Scenario: add a discount to a product
    Given I have a product with $500 price
    When I add a discount code for $50 off
    Then A buyer should see the new price of $450 

  Scenario: Limited discount
    Given I have a product with $500 price
    Given I applied $50 off discount
    When the discount promotion is over
    Then A buyer should see the original price of $500 
    
