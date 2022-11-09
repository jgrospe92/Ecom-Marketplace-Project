Feature: sales
  In order to add or remove discount to a product
  As a vendor
  I need to be able to add or remove discount to a product

  Scenario: add a discount to a product
    Given I log in with my "vendor" account
    And I have username "vendor3000" with password "2222"
    And I see a "login successful"
    Then I am redirected to the marketplace "/home"
    And I click "profile" icon on the navigation bar
    Then I am on "/vendor/profile"
    And I click list products
    Then I am on "/vendor/profile/product_listing/"
    And I see "black hoodie" with "Black hoodies are the best" description and "$100" product price
    And I click "add discount"
    And I enter "10" percent in the "discount" input
    When I click "apply discount"
    And I see "discount added" alert
    And I see "black hoodie" with "Black hoodies are the best" description and "$90" product price


  Scenario: remove a discount to a product
    Given I log in with my "vendor" account
    And I have username "vendor3000" with password "2222"
    And I see a "login successful"
    Then I am redirected to the marketplace "/home"
    And I click "profile" icon on the navigation bar
    Then I am on "/vendor/profile"
    And I click list products
    Then I am on "/vendor/profile/product_listing/"
    And I see "black hoodie" with "Black hoodies are the best" description and "$90" product price
    And I see the original price is "$100"
    And I see a "On sale" tag
    When I click "remove discount"
    And I see "discount removed" alert
    And I see "black hoodie" with "Black hoodies are the best" description and "$100" product price



    
