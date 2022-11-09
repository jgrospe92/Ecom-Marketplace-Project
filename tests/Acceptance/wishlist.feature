Feature: wishlist
  In order to add or remove a product from my wishlist
  As a buyer
  I need to be able to add or remove product from my wishlist

  Scenario: add a selected product to my wishlist
    Given that I log in with my "buyer" account
    And I click log in with  username "jeffrey" with password "1234"
    And I see a "login successful"
    Then I am redirected to the marketplace "/home"
    And I click the search bar
    And I type in a product name "ecom book"
    And I see the product matched with the name "ecom book"
    And I see the "add to wishlist" button
    And I click "add to wishlist" button
    And I see a message "successfully added to your wishlist" alert
    And I click  "profile" icon on the navigation bar
    Then I am on "/buyer/profile"
    And I click "my wishlist" button
    Then I am on "/buyer/profile/wishlist"
    And I see the product "ecom booK"

  
  Scenario: remove a selected product from my wishlist
    Given that I log in with my "buyer"
    And I click log in with username "jeffrey" with password "1234"
    And I see a "login successful"
    Then I am redirected to the marketplace "/home"
    And I click on the search bar
    And I type in a product name "gaming keyboard"
    And I see the product matched with the name "gaming keyboard"
    And I see the "add to wishlist" button
    And I click "add to wishlist" button
    And I see a message "successfully added to your wishlist"
    And I click on my profile icon on the navigation bar
    Then I am on "/buyer/profile"
    And I click the "my wishlist" button
    Then I am on "/buyer/profile/wishlist"
    And I see the product "gaming keyboard"
    And I click "remove" button
    And I see "successfully removed from your wishlist" alert
    And I do not see "gaming keyboard"

