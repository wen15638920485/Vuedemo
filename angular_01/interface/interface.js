var host = "";
var urlPrefix = "http://127.0.0.1/vue_angular01/public/";//本地接口
var imagePrefix = "http://127.0.0.1/vue_angular01/";//本地接口图片
//var urlPrefix = "http://s-349969.gotocdn.com/project/artist/api/public/";//外网接口
//var imagePrefix = "http://s-349969.gotocdn.com/project/artist/api/";//外网接口图片
var mainListUrl = urlPrefix+"index.php?m=main&a=list";//首页数据
var readListUrl = urlPrefix+"index.php?m=read&a=list";//阅读列表
var readDetailUrl = urlPrefix+"index.php?m=read&a=detail";//阅读详情
var musicListUrl = urlPrefix+"index.php?m=music&a=list";//音乐列表
var musicDetailUrl = urlPrefix+"index.php?m=music&a=detail";//音乐详情
var movieListUrl = urlPrefix+"index.php?m=movie&a=list";//视频列表
var movieDetailUrl = urlPrefix+"index.php?m=movie&a=detail";//视频详情
var loginUrl = urlPrefix+"index.php?m=user&a=login";//登录
var getFavoriteUrl = urlPrefix+"index.php?m=favorite&a=getFavorite";//获取收藏
var saveFavoriteUrl = urlPrefix+"index.php?m=favorite&a=saveFavorite";//写入收藏
var searchUrl = urlPrefix+"index.php?m=search&a=search";//搜索