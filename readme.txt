
# Caramel Theme for Wordpress

Website: tbd

## About

Caramel is a simple and clean Portfolio-Theme for Wordpress, aming for a slick looking site, set up in minutes and not depanding on any Pagebuilders to achive that.



## Basic Features

- Caramel is build on Understrap and is making use of gulp to make the dev process a lot smother

## Development
- Run: `$ npm install`
- Run: `$ gulp watch` or
- Run with Browser-Sync:
- First change the browser-sync options to reflect your environment in the file `/gulpconfig.json` in the beginning of the file:
```javascript
{
    "browserSyncOptions" : {
        "proxy": "localhost/theme_test/", // <----- CHANGE HERE
        "notify": false
    },
    ...
};
```
- then run: `$ gulp watch-bs`


## Style
- Caramel is using BEM

## WIP
- Uncluttering all the no needed features of Understrap, Caramel should stay minimalistc, also regarding the used files in Wordpress-Hierarchy
- At some point getting rid of jQuery, and switching to Bootstrap-Components