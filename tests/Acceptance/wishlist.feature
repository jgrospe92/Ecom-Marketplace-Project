Feature: wishlist
  In order to add or remove product to my wishlist
  As a buyer
  I need to be able to add a selected product to my wishlist

  Scenario: add a selected product to my wishlist
    Given I find a product that I like
    When I click add to wishlist button
    Then I should see that product on my wishlist
  
  Scenario: remove a selected product from my wishlist
    Given I added a product to my wishlist
    When I click the remove button
    Then I should not see that product on my wishlist

