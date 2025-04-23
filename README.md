# Reproducer Repository

This repository is intended for having a reproducer that showcases an S3 API Compatibility issue with Cloudflare's R2 API.

Whenever you're calling `listObjectsV2`, the Cloudflare R2 API will return an HTTP 501 Not Implemented error, despite a full compatibility flag with no remarks, according to [the docs](https://developers.cloudflare.com/r2/examples/aws/aws-sdk-php/).

## Steps to reproduce

1. Clone this repository.
2. Run `composer update` to install the dependencies.
3. Enter your R2 bucket data inside `src/index.php` at the top of the file.
4. Run `php src/index.php` to execute the script. The error will be displayed right in your terminal.
