# Product discounter

An API layer to apply discounts to products with discount bundles.

## Getting Started

### Installing

You can use docker-compose to build a container network with all requirements:
```
$ docker-compose up -d
```

This will run three containers with:
 - the main web application
 - a MongoDB database
 - a swagger-ui container for documentation
 
The web container will also execute migrations to provide products and bundles, along with a test user.

### Documentation
Available endpoints are fully documented with OpenAPI 3.0.

Swagger UI is available at http://localhost:8081

## Running the tests

To run unit tests simply run from the project root:
```
$ vendor/bin/phpunit
```

Integration and End2end tests are not run by default. To run them:
```
$ vendor/bin/phpunit --testsuite end2end
```

## Disclaimer
This is a case study and it's not meant for production! Even though basic security and validation is provided, this code is not suitable for a production environment.

### Todos and omissions
- DiscountPercentage, ProductSku, ProductPrice are probably too important for this domain to be primitive types, and should therefore be upgraded to value objects;
- also, float is not good for prices, a generic Money class to wrap that is needed;
- API public interface misses some useful endpoints like GET users and DELETE carts/products/{productId}
- API misses pagination and navigability/hateoas
- it’s been assumed that one user can have only one cart. Still, creating a cart before adding products to it (POST carts/) is a viable and more RESTful option;
- API endpoints miss some syntax validation on parameters, i.e. 400 Bad Request cases; however some basic syntax validation along with some semantic validation (e.g. product/cart existence check) is provided;
- OrderController does many things; even though that's not SO bad for a controller, it's somehow messy: introduce an OrderService or similar to reduce that noise and help with order finalization;
- implement an async job to process orders and send a resume email to the user.

## Built With
* PHP 7
* [Slim v3](http://www.slimframework.com/) - For the http layer and DI
* [MongoDB](https://www.mongodb.com/) - For persistence

## Authors
* **Davide Carbone** - *Initial work* - [Davide Carbone](https://github.com/davidecarbone)

## License
This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
