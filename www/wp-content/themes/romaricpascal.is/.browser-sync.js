module.exports = {
	proxy: {
		target: 'localhost:8080',
		proxyReq: [function (proxyReq, req, res, options) {
			proxyReq.setHeader('Host', req.headers.host);
		}],
		proxyRes: [function (proxyRes, req, res) {
			Object.keys(proxyRes.headers).forEach(function (headerName) {
				res.setHeader(headerName, proxyRes.headers[headerName]);
			})
		}]
	},
	files: ['style.css', 'main.js', '**/*.php'],
	open: false
}