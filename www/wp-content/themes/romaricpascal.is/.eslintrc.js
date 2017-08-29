module.exports = {
	"extends": "defaults",
	"env": {
		"browser": true,
		"es6": true,
		"commonjs": true
	},
	"parser": "babel-eslint",
	"parserOptions": {
        "ecmaVersion": 6,
        "sourceType": "module",
        "ecmaFeatures": {
            "jsx": true
        }
    },
    "rules": {
    	// This will be handled by production compression
    	"no-console": 0
    }
}