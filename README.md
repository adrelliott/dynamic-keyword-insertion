# Dynamic Keyword Insertion 

Creates a Dynamic Keyword Insertion on a Wordpress installation.

## Instructions

1. Add the code from the [append-to-functions.php](dynamic-keyword-insertion/append-to-functions.php) file to the bottom of your wp-content/themes/{theme-name}/functions.php file
2. It's good practice to use child themes so updates don't override this code. See (this article for more details) (https://premium.wpmudev.org/blog/how-to-create-wordpress-child-theme/]

## Usage

Full demo here: https://stealmymarketing.com/blog/dki

Use the shortcode in your posts & pages as [dynamic key='' default='']

- Key is the key/value pair you're looking for in your URL parameter. E.g. 'http://mysite.com/my-post?city=London
- Default can be left blank, but when passed will be the value outputted if no matching key is found in the URL. 

An example is best:

Ex 1: 

URL: http://mysite.com/my-page?city=London&offer=Free%20Shipping%20for%you
Post: Hello and welcome to my shop based in [dynamic key='city' default='Manchester']. You qualify for [dynamic key='offer'] shipping.
Renders as: Hello and welcome to my shop based in London. Free shipping for you

Ex 2:

URL: http://mysite.com/my-page?Offer=Free%20Shipping%20for%you
Post: Hello and welcome to my shop based in [dynamic key='city' default='Manchester']. You qualify for [dynamic key='offer'] shipping.
Renders as: Hello and welcome to my shop based in Manchester.

// Note, because the key 'offer' was 'Offer', it wasn't found. Becuase there was no 'default' set, nothing appears. 


