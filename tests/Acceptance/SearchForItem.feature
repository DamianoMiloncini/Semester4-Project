Feature: SearchForItem
  In order to Search for an Item
  As a Visitor or logged in User
  I need to input search terms on the Pricewave searchbar on the homepage and get matching results back

  Scenario: try SearchForItem "milk"
        Given I am on "http://localhost/home"
        When I enter "milk" in the search bar
        And click Search
        Then I am redirected to "http://localhost/items/milk"
        And I see an array of "item" whose attribute "name" contains "milk"

  Scenario: try SearchForItem "nckaj"
        Given I am on "http://localhost/home"
        When I enter "nckaj" in the search bar
        And click Search
	Then I am redirected to "http://localhost/items/nckaj"
        And I see a message displaying "No item matched the search query"
