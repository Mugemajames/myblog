# Klab Blog app

> In this assignment, we are going to create a small platform where authors can write and publish articles just like [hackernoon](https://hackernoon.com/),The objective of this project is to master laravel eloquent ORM, building relationships between database tables, and the use of middleware.
> Do not edit the readme and never push any code on development and main branch.

## Assignment

Build an application, that allows a user with an account to create articles and publish them, all necessary data must be stored in the database, hint: there is no limitation of database to use, as long as is a relational database like MySql or PostgreSQL.

### User has

- User name
- email

```
  username is required, should contain only alphabets
  email should be email format
```

### Article has

- title
- content
- Perfom all CRUD operations

  ```
  title
    - is required
    - is <= 75 caracter

  ```
       Content
      - Is required

## Models and relationships

- A user can create many articles, there is no limitation.
- An article can be published by one user.

## Pages to create and UI

- Home page for user Sign up/log in
- User articles list
- User article page
- <strong>Go to thumb folder on the root of this project to see the UI suggestion, follow the flow from 1 to 3</strong>
- Pages are not complete those three are the main, add others you may think are necessary, like page to add article,...
  
> N.B: Although the front-end is not our main purpose, it has to be signficant, you can use any library or vanilla CSS.

## App auth

- Authenticated User can view all users,
- Authenticated User can visit other users' articles
- Unauthenticated User tyring to visit unthourized pages should be redirected to the homepage with an alert.



