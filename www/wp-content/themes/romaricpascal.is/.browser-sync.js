module.exports = {
	proxy: {
		target: 'localhost:8080',
		proxyReq: [function (proxyReq, req, res, options) {
			proxyReq.setHeader('Host', req.headers.host);
		}]
	},
	files: ['style.css', 'main.js', '**/*.php'],
	open: false
}