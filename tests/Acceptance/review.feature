Feature: review
  In order to write or delete a review to a product
  As a buyer
  I need to be able to write or delete my comment to a product that I purchased

Scenario: write my comment
  Given I have the "widget" product that costs "100$" and has the "This is a widget" description
  And I am on "/Catalog"
  And I click "widget"
  And I click "add to cart"
  And I check out my cart
  And I see order number "1234"
  And I click "order history" 
  When I am on "/buyer/profile/order_history"
  ANd I see order number "1234" with a product "widget" 
  And I click "widget"
  And I click "write review"
  And I enter "Great product" in the "comment" input
  And I click "Send!"
  And I am on "/Catalog"
  And I click "widget"
  Then I see "Reviews:"
  And I see "Great product"
  
Scenario: remove a comment
  Given I purchase the "widget" product that costs "100$" and has the "This is a widget" description
  And Im on "/buyer/profile"
  And I click "order history"
  Then Im on "/buyer/profile/order_history"
  And I see order number "1234" with a product "widget"
  When I click "widget"
  Then see "Reviews:"
  And I see my comment "Great product"
  Then I click "delete" icon
  And I see "comment successfully delete" alert
  And I click "Catalog" button
  And I am on "/Catalog"
  And I click "widget"
  Then I see "Reviews:"
  And I do not see my comment "Great product"

Scenario: edit a comment
  Given I purchase the "widget" product that costs "100$" and has the "This is a widget" description
  And Im on "/buyer/profile"
  And I click "order history"
  Then Im on "/buyer/profile/order_history"
  And I see order number "1234" with a product "widget"
  When I click "widget"
  Then see "Reviews:"
  And I see my comment "Great product"
  Then I click "edit" icon
  And I enter "I need a refund, bad quality" in the "comment" input 
  And I see "comment successfully updated" alert
  And I click "Catalog" button
  And I am on "/Catalog"
  And I click "widget"
  Then I see "Reviews:"
  And I  see my comment "I need a refund, bad quality"
