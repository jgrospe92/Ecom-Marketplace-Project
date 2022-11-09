Feature: advertise
  In order to advertise my products
  As a vendor
  I need to be able to advertise my products

Scenario: advertise my product
  Given I am logged in a as "admin" with the password "adminpass"
  And I have the "widget" product that costs "100$" and has the "This is a widget" description
  And I have "10000" amount balance
  When I click "advertise"
  And I see "100.00$"
  And I click "pay"
  Then I am on "/Profile"
  And I see "Balance: 9900.00$"
  And I am logged in a as "user" with the password "userpass"
  And I see "Promotion"
  And I see "widget"
  And I see "100.00$"
    