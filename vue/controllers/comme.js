function GetQueryString(name)
{
	var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
	var r = window.location.search.substr(1).match(reg);
	if(r!=null)return  unescape(r[2]); return null;
}
//上面是获取参数
//下面是图片路径和接口路径

var imgUrl='http://127.0.0.1/project/artist/api/';
var dataUrl='http://127.0.0.1/project/artist/api/public/index.php';

/*var imgUrl='http://s-349969.gotocdn.com/project/artist/api/';
var dataUrl='http://s-349969.gotocdn.com/project/artist/api/public/index.php';
*/