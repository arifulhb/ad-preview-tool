# Ad Preview Tool

This **Ad _(Advertisement)_ Preview Tool** allow user to 
- Register in the system, 
- Creaet sample Ad, e.g. GoogleTextAd
- Publish the Ad and Share with others.
- User can log into the system later and find previously created ads.

Benifit of this tool is, you can **simulate the Online Advertisement** Before you create with your ad publisher, 
e.g. _Google_, _Facebook_, etc.

## Installation

This tool is hosted in Github as Open Source Project. You can clone the github repo as

```
git clone git@github.com:arifulhb/ad-preview-tool.git
```

After cloing the repo, you need to **install** and **configure** the application.
**Install**
```
cd ad-preview-tool
composer install
```
**Configure**
If your `.env` file is not generated by composer, please follow this instruction.
```
cp .env.example .env
```
**Update your .env file**
Update the following fields in your `.env` file.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

ADMIN_EMAIL=
ADMIN_PASSWORD=
```
This `ADMIN_URL` and `ADMIN_PASSWORD` will be used to seed your initial admin user.

**Database Migration & Seed**
Once you added your database name, user and password in step above, you can run the migration and seed.
```
php artisan migrate
php artisan db:seed
```
You should be all good to run the site.

## Development
For development, on top of above installation instructions, you need to install `NPM` packages.
```
npm install
npm run dev \\ for compiling react sources for development
npm run watch \\ compile and run react sourcces
npm run prod \\ for production css & javascript files
```

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
