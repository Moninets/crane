const urlapi = require('url');
const siteUrl = 'https://bd36ade5a1.nxcli.net/', // example `http://ready-for-feedback3.com/client/project-name/`
	themeName = 'crane'; // example `project-name`
const URL = urlapi.parse(siteUrl);

module.exports = {
	"files": ["css/*.css","*.php", "parts/**/*.php", "templates/*.php", "js/global.js"],
	"proxy": siteUrl,
	"serveStatic": ["./"],

	rewriteRules: [
		{
			match: new RegExp( URL.path.substr(1) + "wp-content/themes/" + themeName + "/css" ),
			fn: function () {
				return "css"
			}
		},
		{
			match: new RegExp( URL.path.substr(1) + "wp-content/themes/" + themeName + "/css/custom.css" ),
			fn: function () {
				return "css/custom.css"
			}
		}
	],
};
