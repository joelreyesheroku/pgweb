# PGWeb for Heroku Private Spaces

Web-based PostgreSQL database browser written in Go...but modified to deploy Heroku Postgres within Heroku Private Spaces. I recommend you implement proper authentication to this app...don't just use the current method of a CONFIG_VAR for auth. Feel free to use
[Heroku's Auth0 Add-On](https://elements.heroku.com/addons/auth0) and configure it to authorize only Heroku-SSO users within your Enterprise Org (PGWeb auth = Auth0 which = Heroku SSO which uses SAML-based) 

## Overview

PGWeb is a web-based database browser for PostgreSQL, written in Go and works on Heroku Postgres for Common and Private instances. Main idea behind using Go for backend development is to utilize ability of the compiler to produce zero-dependency binaries for multiple platforms. PGWeb was created as an attempt to build very simple and portable application to work with Heroku PostgreSQL databases.

## Features

- Cross-platform support OSX/Linux/Windows 32/64-bit 
*(but you're on your own with sosedoff/pgweb as this has only been modified enough to get it running against Heroku Private Spaces Postgres)*
- Simple installation (distributed as a single binary)
- Zero dependencies
- Works with PostgreSQL 9.1+
- SSH Connections
- Multiple database sessions
- Simple database browser
- Execute and analyze custom SQL queries
- Table and query data export to CSV/JSON/XML
- Query history
- Server bookmarks

## Easy Deploy: 

Simply click the Heroku Button and we'll provision a Heroku Postgres Private-0 database instance and attach it to this app. We will also set a default `AUTH_USER` and `AUTH_PAS`S which you can change through the CONFIG_VAR of the deployed app. 

**Note:** *after deploying, it will take a few minutes for PGWeb to spin up in the Private Space before it is functional. Don't get too impatient or you'll think the app isn't working. Look at the logs and you'll see once web.1 has spun up and is working*

**Before you click the Heroku Button**
*Once you've provisioned PGWeb using the Heroku Button (and waited to verify it's running per the above), you'll only see the* `public` *schema when you log in...with some random* `insufficient priviledges` *showing. If you want to see real data, do the following:*

```
- Add the Heroku Connect Add-On
- Configure Heroku Connect to use your Salesforce Org
- Map a single Salesforce Object to sync (like Contact)
- Now refresh PGWeb and you'll see the newly-created Salesforce schema, with the Contact table in it
```

*...now feel free to proceed with the Heroku Button-based deploy*

[![Heroku Deploy](https://www.herokucdn.com/deploy/button.png)](https://heroku.com/deploy?template=https://github.com/herokumx/pgweb)

## Installation: Manual Deploy on Heroku with Private-Postgres

Make sure you have PostgreSQL server running on the same Heroku App that you're deploying this to (you can add Postgres after you've deployed this if you're putting the Cart before the proverbial Horse 

ie. `yourPrivateSpaces_postgresserver.herokuapp.com:5432`

###Postgres for Private Spaces:

Provisioning Name	should be one of the following:
```
- heroku-postgresql:private-0
- heroku-postgresql:private-2	
- heroku-postgresql:private-4
- heroku-postgresql:private-5	
- heroku-postgresql:private-6
- heroku-postgresql:private-7	
```

## Manual Config for Heroku Private-Postgres

Make sure you've configured (or added manually) the two Heroku Config VARs below: 

`AUTH_USER = username` is the one you'll use to hit this app, not your Private-Postgres username
`AUTH_PASS = password` is the one you'll use to hit this app, not your Private-Postgres password

Your Procfile (create blank file called Procfile, no extension) will look like this:

`web: pgweb --url=$DATABASE_URL --listen=$PORT --bind=0.0.0.0 --auth-user=$AUTH_USER --auth-pass=$AUTH_PASS`

## Deploy to Heroku and Test

Publish your modified local code to your Heroku app using:

`git add .`
`git commit -am "Updating PGWeb to be my own"`
`git push heroku master`
`heroku open`

You should now be prompted for your `AUTH_USER` and `AUTH_PASS` you configured earlier. Once you provide those, you should see your PGWeb Dashboard and it should be connected to your Heroku Private Spaces-based Private Postgres database


## Contribute

- Fork this repository
- Create a new feature branch for a new functionality or bugfix
- Commit your changes
- Push your code and open a new pull request
- Use [issues](https://github.com/herokumx/pgweb/issues) for any questions
- Check [wiki](https://github.com/herokumx/pgweb/wiki) for extra documentation

## Contact

For PGWeb on Heroku Private Spaces, contact
- David Baliles
- [david@heroku.com](mailto:david@heroku.com)

For PGWeb, contact Dan Sosedoff
- Dan Sosedoff
- [dan.sosedoff@gmail.com](mailto:dan.sosedoff@gmail.com)
- [http://twitter.com/sosedoff](http://twitter.com/sosedoff)

## License

The MIT License (MIT)

Copyright (c) 2014-2016 Dan Sosedoff, <dan.sosedoff@gmail.com>
