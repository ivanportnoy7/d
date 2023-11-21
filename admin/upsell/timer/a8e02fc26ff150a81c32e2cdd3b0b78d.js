(function () {
	var _id = "a8e02fc26ff150a81c32e2cdd3b0b78d";
	while (document.getElementById("timer" + _id)) _id = _id + "0";
	document.write("<b id='timer" + _id + "' style='min-width:52px;height:20px;'></b>");
	var _t = document.createElement("script");
	_t.src = "upsell/timer/timer.min.js"/*tpa=http://i7s.top99.su/upsell/timer/upsell/timer/timer.min.js*/;
	var _f = function (_k) {
		var l = new MegaTimer(_id, {
			"view": [0, 0, 1, 1],
			"type": {
				"currentType": "2",
				"params": {
					"startByFirst": true,
					"days": "0",
					"hours": "0",
					"minutes": "20",
					"utc": 0
				}
			},
			"design": {
				"type": "text",
				"params": {
					"number-font-family": {
						"family": "Roboto",
						"link": "<link href='http://fonts.googleapis.com/css?family=Roboto&subset=latin,cyrillic' rel='stylesheet' type='text/css'>"
					},
					"number-font-size": "20",
					"number-font-color": "#ff0000",
					"separator-margin": "0",
					"separator-on": true,
					"separator-text": ":",
					"text-on": false,
					"text-font-family": {
						"family": "Roboto",
						"link": "<link href='http://fonts.googleapis.com/css?family=Roboto&subset=latin,cyrillic' rel='stylesheet' type='text/css'>"
					},
					"text-font-size": "12",
					"text-font-color": "#434343"
				}
			},
			"designId": 1,
			"theme": "white",
			"width": 52,
			"height": 20
		});
		if (_k != null) l.run();
	};
	_t.onload = _f;
	_t.onreadystatechange = function () {
		if (_t.readyState == "loaded") _f(1);
	};
	var _h = document.head || document.getElementsByTagName("head")[0];
	_h.appendChild(_t);
}).call(this);