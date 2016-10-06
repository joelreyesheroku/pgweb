# PGWeb for Heroku Private Spaces Postgres

Web-based PostgreSQL database browser written in Go...but modified to deploy Heroku Postgres within Heroku Private Spaces. I recommend you implement proper authentication to this app...don't just use the current method of a CONFIG_VAR for auth. Feel free to use
[Heroku's Auth0 Add-On](https://elements.heroku.com/addons/auth0) and configure it to authorize only Heroku-SSO users within your Enterprise Org (PGWeb auth = Auth0 which = Heroku SSO which uses SAML-based) 

## Overview

PGWeb is a web-based database browser for PostgreSQL, written in Go and works
on Heroku Postgres for Common and Private instances. Main idea behind using Go for backend development
is to utilize ability of the compiler to produce zero-dependency binaries for 
multiple platforms. PGWeb was created as an attempt to build very simple and portable
application to work with Heroku PostgreSQL databases.

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

Visit [WIKI](https://github.com/baliles/pgweb/pgweb/wiki) for more details

## Installation: Deploy on Heroku to Private Spaces

[![Heroku Deploy](https://www.herokucdn.com/deploy/button.png)](https://heroku.com/deploy?template=https://github.com/herokumx/pgweb)

Make sure you have PostgreSQL server running on the same Heroku App that you're deploying this to (you can add Postgres after you've deployed this if you're putting the Cart before the proverbial Horse ie (yourPrivateSpaces_postgresserver.herokuapp.com:5432)

Plan Name	Provisioning Name	        Cache Size	Storage Limit	Connection Limit
Private 0	heroku-postgresql:private-0	1 GB	        64 GB	        120	
Private 2	heroku-postgresql:private-2	3.5 GB	        256 GB	        400	
Private 4	heroku-postgresql:private-4	15 GB	        512 GB	        500	
Private 5	heroku-postgresql:private-5	30 GB	        1 TB	        500	
Private 6	heroku-postgresql:private-6	60 GB	        1 TB	        500	
Private 7	heroku-postgresql:private-7	120 GB	        1 TB	        500	

## Configure it for Heroku Private-Postgres

Make sure you've configured (or added manually) the two Heroku Config VARs below: 

`AUTH_USER = username` is the one you'll use to hit this app, not your Private-Postgres username
`AUTH_PASS = password` is the one you'll use to hit this app, not your Private-Postgres password

Your Procfile (create blank file called Procfile, no extension) will look like this:

`web: pgweb --url=$DATABASE_URL --listen=$PORT --bind=0.0.0.0 --auth-user=$AUTH_USER --auth-pass=$AUTH_PASS`

## Testing

Before running tests, make sure you have PostgreSQL server running on the same Heroku App that you're deploying this to (you can add Postgres after you've deployed this if you're putting the Cart before the proverbial Horse 

For example:

`yourPrivateSpaces_postgresserver.herokuapp.com:5432`

## Contribute

- Fork this repository
- Create a new feature branch for a new functionality or bugfix
- Commit your changes
- Push your code and open a new pull request
- Use [issues](https://github.com/herokumx/pgweb/issues) for any questions
- Check [wiki](https://github.com/herokumx/pgweb/wiki) for extra documentation

## Contact

**For PGWeb on Heroku Private Spaces, contact
- David Baliles
- [david@heroku.com](mailto:david@heroku.com)

**For PGWeb, contact Dan Sosedoff
- Dan Sosedoff
- [dan.sosedoff@gmail.com](mailto:dan.sosedoff@gmail.com)
- [http://twitter.com/sosedoff](http://twitter.com/sosedoff)

## License

The MIT License (MIT)

Copyright (c) 2014-2016 Dan Sosedoff, <dan.sosedoff@gmail.com>
