function initialize() {
	var ds = [
		{
			"id": 1,
			"name": "A",
			"layer": 1,
			"path": "/[1]"
		},
		{
			"id": 2,
			"name": "B",
			"layer": 1,
			"path": "/[2]"
		},
		{
			"id": 3,
			"name": "A1",
			"layer": 2,
			"path": "/[1]/[3]"
		},
		{
			"id": 4,
			"name": "A2",
			"layer": 2,
			"path": "/[1]/[4]"
		},
		{
			"id": 5,
			"name": "A11",
			"layer": 3,
			"path": "/[1]/[3]/[5]"
		},
		{
			"id": 6,
			"name": "A12",
			"layer": 3,
			"path": "/[1]/[3]/[6]"
		},
		{
			"id": 7,
			"name": "A21",
			"layer": 3,
			"path": "/[1]/[4]/[7]"
		},
		{
			"id": 8,
			"name": "A22",
			"layer": 3,
			"path": "/[1]/[4]/[8]"
		},
		{
			"id": 9,
			"name": "A111",
			"layer": 4,
			"path": "/[1]/[3]/[5]/[9]"
		},
		{
			"id": 10,
			"name": "A112",
			"layer": 4,
			"path": "/[1]/[3]/[5]/[10]"
		}
	];
	
	//$.ajax({
	//	type: 'POST',
	//	url: Clips.siteUrl('/test/ld'),
	//	data: {},
	//	dataType: 'json',
	//	success: function(data) {
	//		dataSourceStore = new Clips.DataSource({
	//			type: 'data',
	//			data: data
	//		});
	//		
	//		$("ul.layer").each(function(){
	//			new Clips.Layer(dataSourceStore, this);
	//		});
	//	}		
	//});

	//dataSourceStore = new Clips.DataSource({
	//	type: 'server',
	//	ajax: {
	//		type: 'POST',
	//		url: Clips.siteUrl('/test/ld'),
	//		data: {},
	//		dataType: 'json'
	//	}
	//});
	//
	//$("ul.layer").each(function(){
	//	new Clips.Layer(dataSourceStore, this);
	//});	
	
}