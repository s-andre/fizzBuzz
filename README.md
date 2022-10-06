# FizzBuzz

Code Challenge

Prints the numbers from 1 to 100.

But for multiples of three prints Fizz instead of the number and for the multiples of five prints Buzz.

For numbers which are multiples of both three and five print FizzBuzz.

## Installation

Install [docker and docker-compose](https://docs.docker.com/get-docker/).

## Usage

On your terminal run:

```bash
docker-compose up -d

# this will output the numbers from 1 to 100
docker exec fizzBuzz-php php bin/console print-numbers-fizz-buzz

# if you want to use different intervals you can run (2 is the start and 50 is the end):
docker exec fizzBuzz-php php bin/console print-numbers-fizz-buzz 2 50
```

If you have already a local php environment, you can skip docker and run:

```bash
cd fizzBuzz

composer install

# this will output the numbers from 1 to 100
php bin/console print-numbers-fizz-buzz

# if you want to use different intervals you can run (2 is the start and 50 is the end):
php bin/console print-numbers-fizz-buzz 2 50
```