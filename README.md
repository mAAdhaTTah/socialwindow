# Socialwindow

Socialwindow is a theme designed to integrate with [SocialDen](https://github.com/mAAdhaTTah/socialden) to highlight its features in a simple, easy-to-use way. Based on [Gromf](https://github.com/schikulski/gromf), it displays each of the post formats and their associated info, like links, quotes, videos and others, clean and beautifully. This theme will develop along with SocialDen and will eventually remove the bundled plugins in exchange for SocialDen's functionality.

This is not currently for public consumption. Future development will add theme options to make Socialwindow properly customizable. You can see Socialwindow in action at [JamesDiGioia.com](http://jamesdigioia.com). Future development will make the theme customizable.

![Socialwindow](screenshot.png "Socialwindow on JamesDiGioia.com")

## Features

Because SocialDen is still in development, Socialwindow comes bundled with thse plugins:

* [Custom Post Formats UI](https://github.com/crowdfavorite/wp-post-formats)
* [Social](https://github.com/crowdfavorite/wp-social)
* [Social Native Broadcasts](https://github.com/crowdfavorite/wp-social-native-broadcasts)

It also uses [Embedly](http://embed.ly) to fetch information about supplied links.

### Additional features

Install the [Soil](https://github.com/roots/soil) plugin to enable additional features:

* Root relative URLs
* Nice search (`/search/query/`)
* Cleaner output of `wp_head` and enqueued assets markup
* Image captions use `<figure>` and `<figcaption>`

## Installation

### Via the WordPress Dashbaord

1. Download the bundled `.zip` from the [releases](https://github.com/mAAdhaTTah/socialwindow/releases) page.
2. Upload the `.zip` at Appearance -> Themes -> Add New -> Upload Theme.
3. Activate the theme.
4. ???
5. Profit!

### Via Composer

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/maadhattah/socialwindow",
    }
  ],
  "require": {
    "maadhattah/socialwindow": "0.3.0",
  }
}
```

## Credits

Socialwindow is developed by [James DiGioia](http://jamesdigioia.com/) and is heavily inspired by [Favepersonal](https://crowdfavorite.com/favepersonal/). Grompf is maintained by [Simen Schikulski](https://github.com/schikulski). Thanks to the [Roots](http://roots.io) team for their amazing work.
