
# gherkin_feature_for_wordpress.feature

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
