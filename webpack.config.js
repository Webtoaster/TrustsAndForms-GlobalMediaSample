const Encore = require('@symfony/webpack-encore');

const path = require('path');
// require("dotenv").config(); // line to add
// const BrowserSyncPlugin = require("browser-sync-webpack-plugin"); // line to add

// Manually configure the runtime environment if not already configured yet by the "encore" command.
// It's useful when you use tools that rely on webpack.config.js file.
if (!Encore.isRuntimeEnvironmentConfigured()) {
	Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

// const path = require('path');

Encore
	// directory where compiled assets will be stored
	.setOutputPath('public/build/')
	// public path used by the web server to access the output path
	.setPublicPath('/build')
	// only needed for CDN's or sub-directory deploy
	//.setManifestKeyPrefix('build/')

	/*
	 * ENTRY CONFIG
	 *
	 * Each entry will result in one JavaScript file (e.g. footer.js)
	 * and one CSS file (e.g. app.css) if your JavaScript imports CSS.
	 */
	.addEntry('app', './assets/app.js')
	.addEntry('app_footer', './assets/footer.js')


	.addStyleEntry('app_style', './assets/styles/app.scss')

	// enables the Symfony UX Stimulus bridge (used in assets/bootstrap.js)
	.enableStimulusBridge('./assets/controllers.json')


	.splitEntryChunks()

	.configureSplitChunks(function (splitChunks) {
		// change the configuration
		splitChunks.minSize = 0;
	})


	// will require an extra script tag for runtime.js
	// but, you probably want this, unless you're building a single-page app
	.enableSingleRuntimeChunk()
	//.disableSingleRuntimeChunk()

	/*
	 * FEATURE CONFIG
	 *
	 * Enable & configure other features below. For a full
	 * list of features, see:
	 * https://symfony.com/doc/current/frontend.html#adding-more-features
	 */
	.cleanupOutputBeforeBuild()
	.enableBuildNotifications()
	.enableSourceMaps(!Encore.isProduction())

	// enables hashed filenames (e.g. app.abc123.css)
	.enableVersioning(Encore.isProduction())

	// enables @babel/preset-env polyfills
	.configureBabel(() => {
	}, {
		useBuiltIns: 'usage',
		corejs: 3
	})

	// enables Sass/SCSS support
	//.enableSassLoader()


	// enables Sass/SCSS support
	.enableSassLoader((options) => {
		options.sourceMap = true;
		options.sassOptions = {
			outputStyle: options.outputStyle,
			sourceComments: !Encore.isProduction(),
		};
		delete options.outputStyle;
	}, {})



	.enablePostCssLoader()

	.copyFiles({
		from: './assets/images',
		to: 'images/[path][name].[ext]'
	})



	// uncomment to get integrity="..." attributes on your script & link tags
	// requires WebpackEncoreBundle 1.4 or higher
	//.enableIntegrityHashes()

	// uncomment if you're having problems with a jQuery plugin
	.autoProvidejQuery()

	.autoProvideVariables({
		$: 'jquery',
		jQuery: 'jquery',
		'window.jQuery': 'jquery',
	})

	// uncomment if you use API Platform Admin (composer req api-admin)
	//.enableReactPreset()
	//.addEntry('admin', './assets/js/admin.js')


	.configureWatchOptions(watchOptions => {
		watchOptions.poll = 250; // check for changes every 250 milliseconds
	})

	.configureDevServerOptions(options => {
		options.allowedHosts = 'all';
		// options.https = {
		// 	pfx: path.join(process.env.HOME, '.symfony/certs/default.p12'),
		// };
	})


if (!Encore.isProduction()) {
	Encore.setPublicPath('http://cdn.trusts.test');

	// guarantee that the keys in manifest.json are *still*
	// prefixed with build/
	// (e.g. "build/dashboard.js": "https://my-cool-app.com.global.prod.fastly.net/dashboard.js")
	Encore.setManifestKeyPrefix('build/');
}


;


module.exports = Encore.getWebpackConfig();