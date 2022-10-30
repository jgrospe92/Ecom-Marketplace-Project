Feature: review
  In order to write or delete a review to a product
  As a buyer
  I need to be able to write or delete my comment to a product that I purchased

  Scenario: write my comment
    Given I purchased a product
    And I want to write a comment
    When I click review button
    Then I should be able to write my comment
    And other user should see my comment
  
  Scenario: remove a comment
    Given I wrote a comment to a product
    And I want to delete my comment
    When I click the delete button
    Then I should be able to delete my comment
    And other user should not see my comment

  Scenario: edit a comment
    Given I wrote a comment to a product
    And I want to edit my comment
    When I click the edit button
    Then I should be able to edit my comment
    And other user should see my updated comment
