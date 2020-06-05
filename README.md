# Wordpress FOUNDRY Starter Theme with Underscores, and Webpack 4

This is a Wordpress Starter Theme initially based on Underscores and built with Webpack 4.

### Prerequisites

You will need the latest version of Node.js (https://nodejs.org/) to get started.

### Prerequisites

From your projects root run:

```
npm install
```

### Config (src/build/config-default.json)

Includes a `config-default.json` file. You can make changes directly to this file.

Currently, only the revisioning and local dev server url are configured here. Change the devUrl to your own local url.

### Building

```
npm run dev
```

Will compile scss and js with sourcemaps and copy from "src" to "dist."

```
npm run start
```

Will launch browsersync and watch changes in php, scss and js files. Note: `Be sure to change your local dev url in src/build/config-default.json and have a local server up and running`

```
npm run build
```

Will minify all the files and remove sourcemaps and copy to the "dist" directory. Images in assets will be optimized. Main.js and Main.css will be asset hashed for cachebusting if set. Note: Depending on how many images you have it may take awhile on first run.

By default revisioning/cachebusting is set to false. If you want it go to `src/build/config-default.json' and set to true.`

## Built With

- Underscores (https://underscores.me/) - Initial Kickstart
- Webpack (https://webpack.js.org/) - Asset bundling
