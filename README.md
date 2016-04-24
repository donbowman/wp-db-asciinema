# wp-db-asciinema
Embed asciinema-created videos into your wordpress blog (local storage)

# Usage

    [asciinema video=url [,theme=name] [,title=] [,autoplay=true|false] [,loop=true|false] [speed=#] ]

The only required parameter is the url, e.g. /wp-content/uploads/2016-04/foo.json

The upload file should have been created with

    asciinema rec foo.json

# Build
Fetch asciinema-player.css and asciinema-player.js from
https://github.com/asciinema/asciinema-player

# Install
Copy this directory including the css and js file to
/wp-content/plugins/wp-db-asciinema on your wordpress site



