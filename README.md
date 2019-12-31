#Project RESSOURCE

### a personal project to take with me for a long time. 
#####It's a tool about collect links and resume them from tuto, news and good practices discovered on internet.
#####Each recording can be linked with one or more topic.s and one or more keyword.s. It includes subject, link on web, author, description, further informations, topic and keywords.  
#####You can filter recordings by topic or keyword. You can create and modify topics and keywords.
#####Each recording has his own date of creation.


##Method and Language
- a Symfony project in PHP7.3 & Symfony 4.4 
- database with doctrine in Symfony
- scss / bootstrap / fontawesome

##Share
#####If you want to use it and adapt it to your own purpose, you can.
In order to install the project, after a git clone :
```shell script
yarn install
composer require encore
```
create your .env.local with your login and password to connect the database `ressource`
#####and before run this project on a browser :
- yarn encore dev --watch
- php bin/console server:run
- at the first time, you need to create your database (`ressource`) with `Doctrine` and a schema update. You can use the insert.sh to create items in tables `keyword` and `category`. 

## Author
A project by [Delphine Belet](https://apsuma.github.io/delphinebelet/) - student at Wild Code School Nantes from sept 19'.
personal project made in december 2019.
 