# project-repo-brogrammers

Project Name: Job Portal
Absolute URL: https://arunswaminathanr.com/PHP/Project/Views/User/Index.php

-----------------------------------------------------------------------------------------------------------------------------
<h2>Team Member: Arun Swaminathan Rathinam </h2>

<h3>Feature: Job Search</h3> 

<h4>Absoulte URL: 1. https://arunswaminathanr.com/PHP/Project/Views/User/Index.php 
                  2. https://arunswaminathanr.com/PHP/Project/Views/User/Search.php
</h4>

<h5>
Description: 
The search feature is used to search for the list of jobs from the Jobs table. 
Once the user searches for a job in the search box its goes to the Search.php page where the results are displayed. 

Once user clicks any of these jobs, an AJAX request is sent to data.php which gets all the details of the job from the database and displays it on the column right side of the search result. 

On the left side the user has a set of filters which can be used to narrow down the search results. The code also calculates the number of days before which the job was posted. And on the top, there’s another small search bar which the user can use to submit another search request. 
</h5>

<table>
  <tr>
    <th><h4>Pages</h4> </th>
    <th><h4>Feature on the page.</h4> </th>
  </tr>
  <tr>
    <td>Views/User/Index.php</td>
    <td>Worked on Search bar and styling the page</td>
  </tr>
  <tr>
    <td>Views/User/Search.php  </td>
    <td>Worked on Search Results, Filters for search, AJAX Request to fetch Job details from DB when user clicks a Job posting, without loading the entire page. </td>
  </tr>
  <tr>
    <td>Database/JobDb.php </td>
    <td>Job Database class which contains functions to retrieve date from the Jobs table</td>
  </tr>
  <tr>
    <td>Database/data.php</td>
    <td>AJAX page which loads the data from the DB and sends the response back to the AJAX call. </td>
  </tr>
  <tr>
    <td>Database/Database.php</td>
    <td>Database file which contains the DB details.</td>
  </tr>
  <tr>
    <td>Models/Job.php</td>
    <td>Model to store and retrieve data for Job table.</td>
  </tr>
  <tr>
    <td>Styles/Style_Index_Search.css</td>
    <td>Contains styling for Index.php and Search.php</td>
  </tr>
  <tr>
    <td>Scripts/Script_Index_Search.css</td>
    <td>Contains script (AJAX code) for Index.php and Search.php</td>
  </tr>
  <tr>
    <td>Includes/Header.php</td>
    <td>Header template for the entire website</td>
  </tr>
  <tr>
    <td>Includes/Footer.php</td>
    <td>Footer template for the entire website</td>
  </tr>
</table>

Pages                             | Feature on the page. 
Views/User/Index.php              - Worked on Search bar and styling the page 
Views/User/Search.php             - Worked on Search Results, Filters for search, AJAX Request to fetch Job details from DB                                       when user clicks a Job posting, without loading the entire page. 
Database/JobDb.php                - Job Database class which contains functions to retrieve date from the Jobs table
Database/data.php                 - AJAX page which loads the data from the DB and sends the response back to the AJAX call. 
Database/Database.php             - Database file which contains the DB details. 
Models/Job.php                    - Model to store and retrieve data for Job table. 
Styles/Style_Index_Search.css     - Contains styling for Index.php and Search.php
Scripts/Script_Index_Search.css   - Contains script (AJAX code) for Index.php and Search.php
Includes/Header.php               - Header template for the entire website
Includes/Footer.php               - Footer template for the entire website

-----------------------------------------------------------------------------------------------------------------------------
<h2>Team Member: Madhusudhan Reddy Kambham</h2>

<h3>Feature: Login and Registration</h3>

<h4>Absoulte URL:</h4> https://arunswaminathanr.com/PHP/Project/Views/User/Register.php 

<h4>Description:</h4> Created and developed a Login and Registration Feature for the job portal website.
 
<h4>Registration:</h4>
In order to use the system user must register with his username, email and password. Upon registration user will receive an email with an activation link. Only after user visits the link the account will be activated to use.

<h4>Login:</h4> after activating the account user can login to the system and use it. If the user had registered and not activated the system will refuse access and asks user to activate the account.


<h4>Changing password:</h4>  if user at any chance forgets their password, one can visit the forgot password page and can enter their email to get the instruction to reset their password. If the email is existing in the system then the user will be sent a link where they can reset his password.


<table>
  <tr>
    <th><h4>Pages</h4> </th>
    <th><h4>Feature on the page.</h4> </th>
  </tr>
  <tr>
    <td>Views/User/Register.php </td>
    <td> Programmed registration functionality where users can register into the system.</td>
  </tr>
  <tr>
    <td>Views/User/ActivteUser.php </td>
    <td> Created a page to activate user based on the link received to the users email..</td>
  </tr>
  <tr>
    <td>Views/User/Login.php</td>
    <td> Created a page for an user to login to the system.</td>
  </tr>
  <tr>
    <td>Views/User/ForgotPassword.php</td>
    <td>Programmed a page where user can enter thier email nad get a link to reset thier password.</td>
  </tr>
   <tr>
    <td>Views/User/ChangePassword.php</td>
    <td> Programmed a page to reset the passsowrd based on the link received to thier email.</td>
  </tr>
  </table>
 <hr>  

 <h3>Feature: User Profile</h3>
 
 <h4>Absoulte URL:</h4>
 
 <h4>Description:</h4> Developed user profile feature where user can show case their profile to job posters or employers.
 I have used 4 database tables to store users details accordingly 
 <ol> profile</ol>
 <ol>education</ol>
 <ol>experience</ol>
 <ol>skills</ol>
 each table can be used to store multiple education ,experience and skills.
 Also,user can interact with the profile, they can add delete and update any of the education ,experience and skills.
 <table>
  <tr>
    <th><h4>Pages</h4> </th>
    <th><h4>Feature on the page.</h4> </th>
  </tr>
  <tr>
    <td>Views/User/UserProfile.php </td>
    <td> developed and designed user profile where users can showcase their profile</td>
  </tr>
  <tr>
    <td>Views/User/UpdatePersonalDetails.php </td>
    <td> developed and designed a form where users can update their person details in profile</td>
  </tr>
  <tr>
    <td>Views/User/AddEducation.php </td>
    <td> developed and designed a form where users can add thier education details to profile</td>
  </tr>
   <tr>
    <td>Views/User/UpdateEducation.php </td>
    <td> developed and designed a form where users can update thier education details to profile</td>
  </tr>
   <tr>
    <td>Views/User/DeleteEducation.php </td>
    <td> developed and designed a functionality where users can delete thier education details from profile</td>
  </tr>
  <tr>
    <td>Views/User/AddExperience.php </td>
    <td> developed and designed a form where users can add thier experience details to profile</td>
  </tr>
   <tr>
    <td>Views/User/UpdateExperience.php </td>
    <td> developed and designed a form where users can update thier experince details to profile</td>
  </tr>
   <tr>
    <td>Views/User/DeleteExperience.php </td>
    <td> developed and designed a functionality where users can delete thier experience details from profile</td>
  </tr>
  <tr>
    <td>Views/User/UpdateSkills.php </td>
    <td> developed and designed a form where users can add and delete thier skills on profile</td>
  </tr>
</table>
  
  
  
  <h2>Team member: Zameer Chariwala<h2>
  <h3>Feature : Company reviews</h3>
  <h4> Absolute URL:/ https://arunswaminathanr.com/PHP/Project/Views/User/CompanyReviews.php</h4>
  
  <h4>Description: This feature is about submitting reviews on company. If somebody has good or bad experience about that company he/she can submit a review about that company.</h4>
  <table>
    <tr>
      <td>CompanyReviews.php</td>
      <td>This page will allow user to search for company in search box and see that company</td>
    </tr>
  <tr>
    <td>SearchReviews.php</td>
    <td>When user click on find reviews user will be redirected to this page with list of company names. User can write a review by clicking on "Write a review" or view company reviews by clicking on compnay name.</td>
  </tr>
  <tr>
    <td>WriteReview.php</td>
    <td>This page is used to submit a review.</td>
  </tr>
  <tr>
    <td>Reviewpage.php</td>
    <td>This page will show all reviews related to the company searched or company selected.</td>
  </tr>
  <tr>
    <td>DeleteReview.php</td>
    <td>This page is used to delete the selected review if user select yes than review will be deleted or if user select no it won't be deleted and redirected to CompanyReviews page</td>
  </tr>
  <tr>
    <td>UpdateReview.php</td>
    <td>When user wants to update his/her review he/she can update there review.</td>
  </tr>
  </table>  
   <hr>       
  Team member: Anshuk Aggarwal
  <h3>Feature : Job Poster Profile</h3>
  <h4> Absolute URL:/ https://arunswaminathanr.com/PHP/Project/Views/User/CompanyReviews.php</h4>
  
  <h4>Description: This feature lets a job poster create/edit a profile. The admin can perform all CRUD operations for this feature</h4>
  <table>
    <tr>
      <td>Index.php</td>
      <td>This page is the admin interface and lets the admin access different components</td>
    </tr>
  <tr>
    <td>ListProfiles.php</td>
    <td>This page list all the job poster profiles for the admin. This page has a search functionality.</td>
  </tr>
  <tr>
    <td>CompanyProfile.php</td>
    <td>This page is used to add a new profile</td>
  </tr>
  <tr>
    <td>ViewProfile.php</td>
    <td>This page gives details for a specific profile</td>
  </tr>
  <tr>
    <td>DeleteProfile.php</td>
    <td>This page is used to delete the selected profile. It does not delete it from the DB but chnages the status to inactive. </td>
  </tr>
  <tr>
    <td>UpdateProfile.php</td>
    <td>This page is used to update a profile</td>
  </tr>
  <tr>
    <td>ViewCompanyProfile.php</td>
    <td>This page is used to view a specific profile on the user side.</td>
  </tr>
  
  <tr>
    <td>EditCompanyProfile.php</td>
    <td>This page is used to edit a specific profile on the user side.</td>
  </tr>
  </table>
<hr>       
  Team member: Anshuk Aggarwal
  <h3>Feature : Website Reviews</h3>
  <h4> Absolute URL:/ https://arunswaminathanr.com/PHP/Project/Views/User/Index.php</h4>
  
  <h4>Description: This feature allows a user to leave a review for the website. The user can view/edit/delete all reviews left by him.  The admin can perform all CRUD operations for this feature</h4>
  <table>
    <tr>
      <td>Index.php</td>
      <td>Added top 5 review to the index.php page</td>
    </tr>
  <tr>
    <td>WriteWebsiteReviews.php</td>
    <td>This page gives the user the option to add a review for the website</td>
  </tr>
  <tr>
    <td>ViewWebsiteReviews.php</td>
    <td>This page shows the reviews left by a specific user.</td>
  </tr>
  <tr>
    <td>EditWebsiteReviews.php</td>
    <td>This page gives the user the ability to edit for a specific review addded by him</td>
  </tr>
  <tr>
    <td>DeleteWebsiteReviews.php</td>
    <td>This page is used to delete a specific review.</td>
  </tr>
  <tr>
    <td>ListWebsiteReviews.php</td>
    <td>This page is for the admin to view all the website reviews</td>
  </tr>
  <tr>
    <td>ViewWebsiteReview.php</td>
    <td>This page is used to view a specific website review.</td>
  </tr>
  
  <tr>
    <td>UpdateWebsiteReview.php</td>
    <td>This page is used to edit a specific review on the admin side.</td>
  </tr>
  
  <tr>
    <td>DeleteWebsiteReview.php</td>
    <td>This page is used to delete a specific review on the admin side.</td>
  </tr>
  </table>
