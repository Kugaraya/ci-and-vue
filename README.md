# Welcome #

This repository was originally made for my own personal use for convenience when writing in *PHP* with **CodeIgniter Framework** but I'll happily write up a short list of instructions about it if ever someone other than me will be using it.

> At least I can finally say this is the official v1.0.0 of this personal project

## Installation ##

1. Download this directly or use your terminal/command line to clone this with `git clone http://github.com/TK-Works/ci-and-layout`.

2. If you downloaded it directly, extract on desired directory, typically in a *www*, *htdocs*, or *any folder* where you load your PHP projects.

3. ...and after that, you're set to use it.

## About the Repository ##

> As much as simplicity is the main focus of this repo, it's simple to use as well really.
> Also, I assume you have at least an idea of how to handle MVC structured frameworks and at least a gist about it.  

- Check first the initial configurations of the following files under *application/config* folder to suit your needs:

`autoload.php`
`config.php`  
`database.php`  
`migration.php`
`routes.php`

- The main controller is set as `Main.php` under *application/controller*, check `routes.php` if you are to change this.

- Inside `Main.php` has *docblocks* and *comments* that should be sufficient enough to guide you how to write the controller methods and passing data from controller to views via server variables denoted w/ **@ symbol** ex. `@$var`

`$this->view_data = ['key' => 'value']`

Ex. `$this->view_data['title' => 'Hello World!']`

..and when used in views, simply `<?php echo @$title; ?>`

- There is an extended core file under *application/core* named `MY_controller.php`.

If you are able to modify this for your needs, feel free to do so

- There is also a preset model file under *application/models* named `MY_model.php`. This already has sufficient queries for you to do CRUD executions on your application and database.

Same as ever, feel free to modify this for your needs.

- Headers and Footers are preset under *application/views/layout* in `application.php`
The body would be loaded under `$yield` variable

- You can freely change the *assets*. This repository uses [Materialize](https://materializecss.com/ "Materialize") by default. Check them out if you're interested.
