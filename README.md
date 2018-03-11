# Slim Application

A PHP Application (Starter) build with Slim Framework.

**Stacks:**
* Language: PHP 7.2+
* Framework: Slim Framework
* Test: Codeception
* Containerisation: Docker CE

### Directory Structure

* The `bootstrap` Directory
* The `config` Directory
* The `docker` Directory
* The `public` Directory
* The `routes` Directory
* The `src` Directory
* the `tests` Directory

### Setup Development / Test Environment

**With Docker**

* Make sure you have `Docker` and `Docker Compose` installed.
* Clone the Repository.
* Run `make up` from app root directory. It could take few more minutes for `building Images` and `composer install`, please make sure `acme_composer` is finished before you move to next step.
* Modify `/etc/hosts` accordingly. default is (127.0.0.1 api.example).
* Open `http://api.example/api/v1` in your web browser.

### Run Test

**With Docker**

* Make sure you have all the `containers` up and running (see above).
* Run `make test` from app root directory. it will run `phpcs`, `unit test` and `acceptance test` for you.

### Contributing
Feedback is welcome.
