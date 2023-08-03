/**
 * Webpack configuration.
 */

const path = require( 'path' );
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );
const { CleanWebpackPlugin } = require( 'clean-webpack-plugin' );
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const cssnano = require('cssnano'); 
const UglyJsPlugin = require('uglifyjs-webpack-plugin')

// JS Directory path.
const JS_DIR = path.resolve( __dirname, 'src/js' );
const IMG_DIR = path.resolve( __dirname, 'src/img' );
const BUILD_DIR = path.resolve( __dirname, 'build' );

const entry = {
	main: JS_DIR + '/main.js',
	single: JS_DIR + '/single.js',
	editor: JS_DIR + '/editor.js'
};

const output = {
	path: BUILD_DIR,
	filename: 'js/[name].js'
};

const rules = [
	{
		test: /\.js$/,
		include: [ JS_DIR ],
		exclude: /node_modules/,
		use: 'babel-loader'
	},
	{
		test: /\.scss$/,
		exclude: /node_modules/,
		use: [
			MiniCssExtractPlugin.loader,
			'css-loader',
			'sass-loader',
		]
	},
	{
		test: /\.(png|jpg|svg|jpeg|gif|ico)$/,
		use: 
			{
				loader: 'file-loader',
				options: {
					name: '[path][name].[ext]',
					publicPath: 'production' === process.env.NODE_ENV ? '../' : '../../'
				}
			}
		
	},
	{
		test: /\.(ttf|otf|eot|svg|woff(2)?)(\?[a-z0-9]+)?$/,
		exclude: [ IMG_DIR, /node_modules/ ],
		use: {
			loader: 'file-loader',
			options: {
				name: '[path][name].[ext]',
				publicPath: 'production' === process.env.NODE_ENV ? '../' : '../../'
			}
		}
	}
];

/**
 * Note: argv.mode will return 'development' or 'production'.
 */
const plugins = ( argv ) => [
	new CleanWebpackPlugin( {
		cleanStaleWebpackAssets: ( 'production' === argv.mode  ) // Automatically remove all unused webpack assets on rebuild, when set to true in production. ( https://www.npmjs.com/package/clean-webpack-plugin#options-and-defaults-optional )
	} ),

	new MiniCssExtractPlugin( {
		filename: 'css/[name].css'
	} ),
];

module.exports = ( env, argv ) => ({

	entry: entry,
	output: output,
	/**
	 * A full SourceMap is emitted as a separate file ( e.g.  main.js.map )
	 * It adds a reference comment to the bundle so development tools know where to find it.
	 * set this to false if you don't need it
	 */
	devtool: 'source-map',
	module: {
		rules: rules,
	},
	optimization: {
		minimizer: [
            new OptimizeCssAssetsPlugin({
				cssProcessor: cssnano,
			}),
			new UglyJsPlugin({
				cache: false,
				parallel: true,
				sourceMap: false
			})
		]
	},
	plugins: plugins( argv ),

	externals: {
		jquery: 'jQuery'
	}
});