<?php

declare(strict_types=1);

namespace Tests\Support;

/**
 * Inherited Methods
 * @method void wantTo($text)
 * @method void wantToTest($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause($vars = [])
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    /**
     * Define custom actions here
     */
        /**
     * @Given I am on :arg1
     */
    public function iAmOn($url)
    {
        $this->amOnPage($url); //
    }

   /**
    * @When I enter :arg1 ,:arg2, :arg3, :arg4, :arg5 in the register page
    */
    public function iEnterInTheRegisterPage($username, $firstName, $lastName, $location, $password)
    {
        $this->fillField('username',$username);
        $this->fillField('first_name',$firstName);
        $this->fillField('last_name',$lastName);
        $this->fillField('location',$location);
        $this->fillField('password_hash',$password);
    }

   /**
    * @When I click :arg1 button
    */
    public function iClickButton($loginButton)
    {
        $this->click($loginButton);
    }

   /**
    * @Then I should be redirected to the login page
    */
    public function iShouldBeRedirectedToTheLoginPage()
    {
        $this->seeInCurrentUrl('/User/login'); //verify if the redirection was completed
    }

   /**
    * @When I enter :arg1 and :arg2 in the login form
    */
    public function iEnterAndInTheLoginForm($username, $password)
    {
       $this->fillField('username',$username);
       $this->fillField('password',$password);
    }

   /**
    * @Then I should be redirected to the Home Page
    */
    public function iShouldBeRedirectedToTheHomePage()
    {
        $this->seeInCurrentUrl('/home'); //verify if the redirection was completed
    }

    /**
     * @When I enter invalid username :arg1 and invalid password :arg2 in the login form
     */
    public function iEnterInvalidUsernameAndInvalidPasswordInTheLoginForm($invalidUsername, $invalidPassword)
    {
        $this->fillField('username',$invalidUsername);
        $this->fillField('password',$invalidPassword);
    }

   /**
    * @Then I should stay in the login page
    */
    public function iShouldStayInTheLoginPage()
    {
        $this->seeInCurrentUrl('/User/login');
    }

     /**
     * @Given I am logged in
     */
    public function iAmLoggedIn()
    {
        $this->amOnPage('http://localhost/User/profile'); //test to see if the user can access an authenticated page
    }

   /**
    * @Then I should see the login form
    */
    public function iShouldSeeTheLoginForm()
    {
        $this->see('Login'); //make sure that the user is presented with the login form
    }

      /**
     * @When I select :arg1 and :arg2
     */
    public function iSelectAnd($cityName, $provinceName)
    {
        $this->selectOption("city",$cityName);
        $this->selectOption("province",$provinceName);
    }

   /**
    * @Then I should see the results of my search
    */
    public function iShouldSeeTheResultsOfMySearch()
    {
       $this->see('Results of your search'); 
    }
   /**
    * @Then I should see a :arg1 successfull message
    */
    public function iShouldSeeASuccessfullMessage($message)
    {
      $this->see($message);
    }

    /**
     * @When I click :arg1 button on :arg2
     */
    public function iClickButtonOn($deleteButton, $itemName)
    {
        $this->click($deleteButton, '#' . $itemName . '-delete-button'); // Assuming each item has a unique ID and delete button with an ID like 'item1-delete-button'
    }

   /**
    * @Then I should not see :arg1 saved anymore
    */
    public function iShouldNotSeeSavedAnymore($itemName)
    {
        $this->cantSee($itemName);
    }
   /**
    * @Then I should see all my saved items
    */
    public function iShouldSeeAllMySavedItems()
    {
        $this->see('All your bookmarks');
    }

    /**
     * @When I create a new recipe with title :arg1 and ingredients :arg2
     */
    public function iCreateANewRecipeWithTitleAndIngredients($title, $ingredients)
    {
        $this->click('Create Recipe');
        $this->fillField('Title', $title);
        $this->fillField('Ingredients', $ingredients);
        $this->click('Save Recipe');
    }

    /**
     * @Then the recipe :arg1 should be created successfully
     */
    public function theRecipeShouldBeCreatedSuccessfully($recipeTitle)
    {
        $this->see($recipeTitle);
    }

    /**
     * @Given I have a recipe titled :arg1 with cooking instructions :arg2
     */
    public function iHaveARecipeTitledWithCookingInstructions($title, $instructions)
    {
        $this->click('Edit Recipe');
        $this->fillField('Cooking Instructions', $instructions);
        $this->click('Save Recipe');
    }

    /**
     * @When I update the cooking instructions of the recipe :arg1 to :arg2
     */
    public function iUpdateTheCookingInstructionsOfTheRecipeTo($title, $instructions)
    {
        $this->click('Edit Recipe');
        $this->fillField('Cooking Instructions', $instructions);
        $this->click('Save Recipe');
    }

    /**
     * @Then the cooking instructions for the recipe :arg1 should be updated successfully
     */
    public function theCookingInstructionsForTheRecipeShouldBeUpdatedSuccessfully($recipeTitle)
    {
        $this->see('Cooking instructions updated successfully for ' . $recipeTitle);
    }

    /**
     * @When I view the recipes
     */
    public function iViewTheRecipes()
    {
        $this->click('View Recipes');
    }

    /**
     * @Then I should see a list of recipes
     */
    public function iShouldSeeAListOfRecipes()
    {
        $this->seeElement('.recipe');
    }

    /**
     * @When I view my profile
     */
    public function iViewMyProfile()
    {
        $this->click('My Profile');
    }

    /**
     * @Then I should see only my own recipes
     */
    public function iShouldSeeOnlyMyOwnRecipes()
    {
        $this->see('My Recipes');
    }

    /**
     * @Given there are recipes available
     */
    public function thereAreRecipesAvailable()
    {
        $this->seeElement('.recipe');
    }

    /**
     * @When I filter recipes by date created
     */
    public function iFilterRecipesByDateCreated()
    {
        $this->selectOption('Sort By', 'Date Created');
    }

    /**
     * @Then I should see recipes sorted by date created
     */
    public function iShouldSeeRecipesSortedByDateCreated()
    {
        $this->see('Sorted by Date Created');
    }

    /**
     * @When I filter recipes by price
     */
    public function iFilterRecipesByPrice()
    {
        $this->selectOption('Sort By', 'Price');
    }

    /**
     * @Then I should see recipes sorted by price
     */
    public function iShouldSeeRecipesSortedByPrice()
    {
        $this->see('Sorted by Price');
    }

    /**
     * @When I search for :arg1
     */
    public function iSearchFor($searchQuery)
    {
        $this->fillField('Search', $searchQuery);
        $this->executeJS("document.querySelector('#search-field').dispatchEvent(new KeyboardEvent('keydown', {key: 'Enter'}));");
    }
    

    /**
     * @Then I should see relevant recipes
     */
    public function iShouldSeeRelevantRecipes()
    {
        $this->see('Search Results');
    }

    /**
     * @When I delete the recipe :arg1
     */
    public function iDeleteTheRecipe($recipeTitle)
    {
        $this->click('Delete Recipe');
    }

    /**
     * @Then the recipe :arg1 should be deleted successfully
     */
    public function theRecipeShouldBeDeletedSuccessfully($recipeTitle)
    {
        $this->dontSee($recipeTitle);
    }

    /**
     * @Given there is a recipe titled :arg1
     */
    public function thereIsARecipeTitled($recipeTitle)
    {
        $this->click('View Recipes');
        $this->see($recipeTitle);
    }

    /**
     * @When I view the current price of the recipe :arg1
     */
    public function iViewTheCurrentPriceOfTheRecipe($recipeTitle)
    {
        $this->click('View Recipe');
        $this->click('View Price');
    }

    /**
     * @Then I should see the total price of ingredients per store
     */
    public function iShouldSeeTheTotalPriceOfIngredientsPerStore()
    {
        $this->see('Total Price per Store');
    }

}
