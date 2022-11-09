Feature: advertise
  In order to advertise my products
  As a vendor
  I need to be able to advertise my products

Scenario: advertise my product
  Given I am logged in a as "vendor" with the password "v3ndor"
  And I have the "widget" product that costs "100$" and has the "This is a widget" description
  And I have "10000" amount balance
  When I click "advertise"
  And I see "100.00$" service fee
  And I click "pay"
  And I see "transaction completed" alert
  Then I am on "/Profile"
  And I see "Balance: 9900.00$"
  When I click "home"
  Then I am on marketplace "/home"
  And I click "ads"
  And I see the "widget" product that costs "100$" and has the "This is a widget" description
  