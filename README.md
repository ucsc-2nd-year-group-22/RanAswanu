# mvc-ui-embeded
This is the repository for implementing actual system with real UIs

GitHub has replaced their keyword 'master' with 'main'. Then the master branch will become main branch now onwards.

# Desiered working progress
1. clone the dev branch of this repository using 'git clone' command (make sure to clone into your htdocs folder).
2. make your own local development repository (ex:- if your name is Nimal make a branch such as nimalDev or something entends the username).
3. continue your part within the dev branch created at the obove step (ex:- nimalDev).
4. after a successful commit please make sure to pull from the dev branch of the original repo using 'git pull origin dev' command.
5. please fix any conflict error exists.
6. then push it to your own origin dev branch using 'git push origin yourDevBranchName' command (ex:- git push origin nimalDev).

# Be aware

* Don't try to work in others' branches.
* Never work/push with tha main branch (master branch) without informing group members

**! Please update following list of Models, Views, Controllers each time you make changes

## Controllers & Methods

- admin
    - index => Empty
    
- dashboard
    - index
    - xhrInsert
    - xhrGetListings
    - xhrDeleteListing
    
- error
    - contructor only
    
- help (Used to demonstrate passing data array to views, no relation to this project)
    - index
    - other
    - vcon (array passing to view)
  
- index (default controller)
    - index => Rendors index/index method
  
- user
    - index
    - create
    - edit
    - editSave
    - delete
    - login
    - loginusr
    - logout
  
- vendor
    - index
    - register
    - create
    - viewVendor


## Views
- header.php 
- footer.php

- admin 
    - index
    
- dashboard
    - js/default.js
    - index
    
- error  
    - 404.php
    - index.php

- help  
    - con.php
    - index.php
    
- index
    - index.php => welcome message
    
- user  
    - edit.php
    - index.php
    - login.php
    
- vendor
    - index.php
    - register.php
    - view.php

