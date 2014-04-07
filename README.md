online_trading
==============

1. The structure of project(main folders)
      1. css folder- contain all css files(ready made+ made by us)
          1. custom folder- contains all css files made by us
      2. js folder-contains all js files(ready made+ made by us)
          1. custom folder- contains all js files made by us
      3. files folder- contains all php/html files
      4. doc folder- all doccuments for the project
      5. config folder- contains all config files

2. template.php- inside files folder - All php files which will be used for front-end will be of this format. It contains basic layout of the website. Try opening this file in browser. When you start your module, copy code from this file so that we have same structure on all pages of website.

3. class.MySQL.php- inside files folder - This is the class for mysql. Don't write quries directly,rather use this class.. this will ensure
      1. Proper error handling. We can improve the error handling at just one place and it will be improved everywhere in the project.
      2. Generality- If we need to change the database we just need to change it in one place. Also if the mysql provided with php gets upgraded we just have to upgrade at one place(happened with mysql to mysqli).

4. check_session.php - inside files folder- Include it in your code and it will redirect the user to login page if he  is not already logged in. This can be used in case where you need user authentication.

5. header.php - inside files folder- It is responsibe for the header of website.

6. config.php - inside config folder- contains the config variables for the website.

7. Do not edit the above mentioned files(template,class.MySQL,check_session,header,config)- as these files will be used by everyone so it will cause problems. If you want some additions in these files we can do them during group meets.

8. For a guide on class.MySQL.php look in the doc folder- database.md

9. Now how to use the repo
    1. One member from each module will do the management of repo. So choose one among your sub-team.
    2. Create one branch for your module.
    3. Always work on your module branch,until the module is complete.
    4. After the module is complete we will merge everything in master branch.
10. Users
      1. Profile- Rishi
      2. Auction- Shubhakar
      3. search- shubham
      4. cart-vrinda
      5. bulk order- praveen
      6. Recommendation- Swapnil
