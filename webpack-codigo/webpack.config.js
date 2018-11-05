var path = require("path");

var HtmlWebpackPlugin = require('html-webpack-plugin');
const ExtractTextPlugin = require("extract-text-webpack-plugin");

const extractCSS = new ExtractTextPlugin('[name]-one.css');
const extractLESS = new ExtractTextPlugin('[name]-two.css');

var webpack = require("webpack");

module.exports = function (env) {
    var isProd = false;

    if (env != null && env.production) {
        isProd = true;
    }

    var configUseCssDev = ["style-loader", "css-loader"];
    var configUseCssProd = extractCSS.extract({
        fallback: "style-loader",
        use: "css-loader"
    })

    var configUseCss = isProd ? configUseCssProd : configUseCssDev;

    var configUseScssDev = ["style-loader", "css-loader", "sass-loader"];
    var configUseScssProd = extractLESS.extract({
        fallback: "style-loader",
        use: ["css-loader", "sass-loader"]
    })

    var configUseScss = isProd ? configUseScssProd : configUseScssDev;

    return {
        context: path.resolve(__dirname, "src"),
        entry: {
            app: './app.js',
            mobile: './mobile.js',
            vendor: ['react', 'react-dom', 'rxjs']
        },
        output: {
            filename: './[name]-bundle.js',
            path: path.resolve(__dirname, 'dist')
        },
        module: {
            rules: [
                {
                    test: /\.css$/,
                    use: configUseCss
                },
                {
                    test: /\.scss$/,
                    use: configUseScss
                },
                {
                    test: /\.js$/,
                    exclude: /node_modules/,
                    loader: "babel-loader"/*,
                options: {
                    "presets": ["env", "react"]
                }*/
                },
                {
                    test: /\.(gif|png|jpe?g|svg)$/i,
                    loaders: [
                        'file-loader',
                        {
                            loader: 'image-webpack-loader',
                            query: {
                                progressive: true,
                                optimizationLevel: 7,
                                interlaced: false,
                                pngquant: {
                                    quality: 50,
                                    speed: 4
                                },
                                mozjpeg: {
                                    quality: 50
                                }
                            }
                        }
                    ]
                }            
                /*{
                    test: /\.(jpg|png)$/,
                    loader: "file-loader?name=app/images/[name].[ext]&publicPath=/assets/"
                }*/
            ]
        },
        devServer: {
            contentBase: path.join(__dirname, "dist"),
            compress: true,
            publicPath: "/assets/",
            hot: true,
            //quiet: true,
            //stats: "errors-only",
            port: 9000
        },
        plugins: [
            extractCSS,
            extractLESS,
            new HtmlWebpackPlugin({
                title: 'My App',
                filename: './admin.html',
                hash: true,
                chunks: ['commons', 'vendor', 'app'],
                template: './my-index.ejs'
            }),
            new HtmlWebpackPlugin({
                title: 'My App Mobile',
                filename: './mobile.html',
                hash: true,
                chunks: ['commons', 'vendor', 'mobile'],
                template: './my-index-mobile.ejs'
            }),
            new webpack.optimize.CommonsChunkPlugin({
                name: ['commons', 'vendor']
            }),
            new webpack.HotModuleReplacementPlugin(),
            new webpack.NamedModulesPlugin(),
        ]
    }
}