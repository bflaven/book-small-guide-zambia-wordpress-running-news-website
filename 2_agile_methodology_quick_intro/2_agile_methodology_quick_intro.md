# 2_agile_methodology_quick_intro

**In order to make proper cut-and-pasted for each command inserted in the book. Here are the commands used in this book chapter and inserted in this readme file.**


*This plugin really existed. It was part of end-to-end exercise for crafting a WordPress plug-in from mock-up to field-name description, going through coding and even including a gherkin feature in order to offer the best user experience. Check <a href="https://github.com/bflaven/PluginWordpressForFun/tree/master/check_news" target="_blank">https://github.com/bflaven/PluginWordpressForFun/tree/master/check_news</a>*


These are features written for an existing API made with Node @<a href="https://github.com/bflaven/a-quick-journey-through-api-testing">https://github.com/bflaven/a-quick-journey-through-api-testing</a>

"From Node Application to Postman best practices through Gherkin features".<br>
The book can be found on Amazon at this address: <a href="https://www.amazon.fr/dp/B07MH81L1X/" rel="nofollow">A quick journey through API Testing. From Node Application to Postman best practices through Gherkin features (English Edition)</a>


```gherkin
Feature: Testing countries REST API FlagApi

  Background: 
  * url demoBaseUrl
  
  # 01_testing_get_the_country_flag
  Feature: Flagapi Searching by countries by flag
  As a user, I want to search in Flagapi, so that I can find flag for each country.
  
  Scenario: Get the country by flag
    Given I have started Flagapi
     When I send and accept JSON
      And I send a GET request to "/api/v2/flag/" with the value "<guid>"
     Then the response status should be "200"
      And the JSON response should contain the field "flag"
      And the JSON response should have "$..flag[0]" with the value "<guid>"
      And the JSON response should include "<name>"
      And the JSON response should include "<url>"
  
    Examples: Flags
      | guid | name        | url                                 | 
      | AF   | Afghanistan | http://localhost:3000/images/af.png | 
      | XX   | CountryName | FlagUrl                             | 
  
  # 02_testing_get_the_country_capital
  Feature: Flagapi Searching by countries by capital
  As a user, I want to search in Flagapi, so that I can find the capital for each country.
  
  Scenario: Get the country by capital
    Given I have started Flagapi
     When I send and accept JSON
      And I send a GET request to "/api/v2/capital/" with the value "<guid>"
     Then the response status should be "200"
      And the JSON response should contain the field "capital"
      And the JSON response should have "$..capital" with the value "<guid>"
  
    Examples: Capitals
      | guid        | 
      | Kabul       | 
      | CapitalName | 
  
  # 03_testing_get_the_country_language
  Feature: Flagapi Searching by countries by language
  As a user, I want to search in Flagapi, so that I can find the language for each country.
  
  Scenario: Get the country by language
    Given I have started Flagapi
     When I send and accept JSON
      And I send a GET request to "/api/v2/language/" with the value "<guid>"
     Then the response status should be "200"
      And the JSON response should contain the field "nativeLanguage"
      And the JSON response should have "$..nativeLanguage" with the value "<guid>"
      And the JSON response should have "$..nativeLanguage" with a length of 3
  
    Examples: Languages
      | guid | 
      | spa  | 
      | hye  | 
  
  # 04_testing_get_the_country_tld
  Feature: Flagapi Searching by countries by tld
  As a user, I want to search in Flagapi, so that I can find the Top-level domain (tld) for each country.
  
  Scenario: Get the country by tld
    Given I have started Flagapi
     When I send and accept JSON
      And I send a GET request to "/api/v2/tld/" with the value "<guid>"
     Then the response status should be "200"
      And the JSON response should contain the field "tld"
      And the JSON response should have "$..tld" as a string and not empty
      And the JSON response should have "$..tld" with a length of 3
      And the JSON response should have "$..tld" with the value "<guid>"
  
    Examples: Top-level domains
      | guid | 
      | .ar  | 
      | .bo  | 
  
  # 05_testing_get_the_country_area
  Feature: Flagapi Searching by countries by area
  As a user, I want to search in Flagapi, so that I can find the area for each country.
  
  Scenario: Get the country by area
    Given I have started Flagapi
     When I send and accept JSON
      And I send a GET request to "/api/v2/area/" with the value "<guid>"
     Then the response status should be "200"
      And the JSON response should contain the field "area"
      And the JSON response should have "$..area" as a string and not empty
      And the JSON response should have "$..area" with the value "<guid>"
  
    Examples: Top-level domains
      | guid     | 
      | 17098242 | 
  
  # 06_testing_get_the_country_borders
  Feature: Flagapi Searching by countries by borders
  As a user, I want to search in Flagapi, so that I can find the area for each country.
  
  Scenario: Get the country by area
    Given I have started Flagapi
     When I send and accept JSON
      And I send a GET request to "/api/v2/area/" with the value "<guid>"
     Then the response status should be "200"
      And the JSON response should contain the field "area"
      And the JSON response should have "$..area" with the value "<guid>"
  
    Examples: Top-level domains
      | guid     | 
      | 17098242 | 
```



```gherkin
Feature: WordPress ClaimReview Article
WordPress post should be easy to convert into ClaimReview post

  Background: 
  Scenario Outline:
    Given WordPress is installed at <site_url>
  
    Examples: 
  
      | site_url | http://superfaker.com/ | 
  
  Scenario: Saving blogname
  Scenario Outline:
    Given I go to menu item "Settings > General"
     When I fill in "blogname" with "<site_title>"
      And I press "submit"
      And I should see "Settings saved."
      And I am on the homepage
     Then I should see "<site_title>" in the "h1 a" element
  
    Examples: 
  
      | site_title | Yaya's Guide To Super Truth | 
  
  Scenario: Saving blogdescription
  Scenario Outline:
    Given I go to menu item "Settings > General"
     When I fill in "blogdescription" with "<site_description>"
      And I press "submit"
      And I should see "Settings saved."
      And I am on the homepage
     Then I should see "<site_description>" in the ".site-description" element
  
    Examples: 
  
      | site_description | What Everybody Else Does When It Comes To Truthiness And What You Should Do Different | 
  
  Scenario: Converting a post into ClaimReview post
  Scenario Outline:
    Given I am logged in as "admin"
      And I am on admin dashboard
     When I follow "Add New" within "#menu-posts"
     Then I should see "Add New Post"
     When I fill in "title" with "<title>"    
      And I fill in "content" with "<content>"
  # Fact Checked
     Then I should see "Fact Check"
     When I check the "Fact Checked Status" with "<status>"
     Then I should see "Fact Check Details"
      And I fill in "itemReviewed Author Name" with "<itemReviewed_author_name>"
      And I fill in "itemReviewed Author SameAs" with "<itemReviewed_author_sameAs>"
      And I fill in "itemReviewed Date Published" with "<itemReviewed_datePublished>"
      And I fill in "itemReviewed claimReviewed" with "<itemReviewed_claimReviewed>"
      And I fill in "reviewRating ratingValue" with "<reviewRating_ratingValue>"
      And I fill in "reviewRating alternateName" with "<reviewRating_alternateName>"
```
