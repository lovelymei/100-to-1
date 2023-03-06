const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
    mode: 'development',
    entry: "./src/index.tsx",
    devtool: "source-map",
    output: {
        path: path.resolve(__dirname, 'public/dist'),
        filename: 'bundle.js',
        publicPath: '/'
    },
    module: {
        rules: [
          /* {
                test: /\.js?$/,
                use: {
                    loader: "babel-loader",
                    options: {
                         presets: ["@babel/preset-env", "@babel/preset-react"]
                     }
                },
            },*/
            {
                test: /\.tsx?$/,
                use: {
                    loader: "ts-loader",
                },
                exclude: /node_modules/,
            },
            {
                test: /\.css$/i,
                use: [MiniCssExtractPlugin.loader, 'css-loader'],
            },
            {
                test: /\.scss$/i,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    'sass-loader'
                ],
            },
        ]
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: 'styles.css'
        }),
    ],
    resolve: {
        extensions: ['.tsx', '.ts', '.js']
    }
};