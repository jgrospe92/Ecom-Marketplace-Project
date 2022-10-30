Feature: advertise
  In order to promote my products
  As a vendor
  I need to be able to promote my products

  Scenario: advertise my product
    Given I have a product
    Given I have $10000 amount balance
    When I click advertise
    And I pay $100 for the service
    Then users should see my ads from the main page of the marketplace
    and my new amount balance is $9900 
