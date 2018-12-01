<?php
//tags http://cdn.apc.360.cn/index.php?c=WallPaper&a=getAllCategoriesV2&from=360chrome
//new http://wallpaper.apc.360.cn/index.php?c=WallPaper&a=getAppsByOrder&order=create_time&start=【0开始】&count=【加载数】&from=360chrome
//专区 http://wallpaper.apc.360.cn/index.php?c=WallPaper&a=getAppsByCategory&cid=【分类ID】&start=【0开始】&count=【加载数】&from=360chrome

$cid = getParam('cid', '360new');

switch($cid)
{
    case '360new':  // 360壁纸 新图片
        $start = getParam('start', 0);
        $count = getParam('count', 10);
        echojson (file_get_contents("http://wallpaper.apc.360.cn/index.php?c=WallPaper&a=getAppsByOrder&order=create_time&start={$start}&count={$count}&from=360chrome"));
    break;
    
    case '360tags':
        die('{"errno":"0","errmsg":"\u6b63\u5e38","consume":"2","total":"18","data":[{"id":"36","name":"4K\u4e13\u533a","order_num":"110","tag":"","create_time":"2015-12-08 13:50:44"},{"id":"6","name":"\u7f8e\u5973\u6a21\u7279","order_num":"100","tag":"","create_time":"2011-10-29 17:49:27"},{"id":"30","name":"\u7231\u60c5\u7f8e\u56fe","order_num":"99","tag":"","create_time":"2012-11-23 10:49:25"},{"id":"9","name":"\u98ce\u666f\u5927\u7247","order_num":"98","tag":"","create_time":"2011-11-02 16:33:34"},{"id":"15","name":"\u5c0f\u6e05\u65b0","order_num":"85","tag":"","create_time":"2011-12-15 18:47:03"},{"id":"26","name":"\u52a8\u6f2b\u5361\u901a","order_num":"84","tag":"","create_time":"2012-07-27 17:17:42"},{"id":"11","name":"\u660e\u661f\u98ce\u5c1a","order_num":"83","tag":"","create_time":"2011-11-02 17:38:58"},{"id":"14","name":"\u840c\u5ba0\u52a8\u7269","order_num":"75","tag":"","create_time":"2011-12-15 18:23:27"},{"id":"5","name":"\u6e38\u620f\u58c1\u7eb8","order_num":"74","tag":"","create_time":"2011-10-29 17:49:12"},{"id":"12","name":"\u6c7d\u8f66\u5929\u4e0b","order_num":"72","tag":"","create_time":"2011-12-13 18:59:40"},{"id":"10","name":"\u70ab\u9177\u65f6\u5c1a","order_num":"70","tag":"","create_time":"2011-11-02 17:10:53"},{"id":"29","name":"\u6708\u5386\u58c1\u7eb8","order_num":"69","tag":"","create_time":"2012-11-23 09:19:54"},{"id":"7","name":"\u5f71\u89c6\u5267\u7167","order_num":"68","tag":"","create_time":"2011-11-02 15:22:39"},{"id":"13","name":"\u8282\u65e5\u7f8e\u56fe","order_num":"67","tag":"\u8282\u65e5 \u7aef\u5348 \u4e2d\u79cb \u5143\u65e6 \u5723\u8bde \u6e05\u660e \u60c5\u4eba \u6625\u8282 \u65b0\u5e74 2012","create_time":"2011-12-14 18:47:32"},{"id":"22","name":"\u519b\u4e8b\u5929\u5730","order_num":"14","tag":"","create_time":"2012-05-29 15:10:04"},{"id":"16","name":"\u52b2\u7206\u4f53\u80b2","order_num":"12","tag":"","create_time":"2011-12-30 11:37:49"},{"id":"18","name":"BABY\u79c0","order_num":"10","tag":"","create_time":"2012-03-28 23:52:39"},{"id":"35","name":"\u6587\u5b57\u63a7","order_num":"9","tag":"","create_time":"2014-09-25 18:35:57"}]}');
        echojson (file_get_contents("http://cdn.apc.360.cn/index.php?c=WallPaper&a=getAllCategoriesV2&from=360chrome"));
    break;
    
    case 'bing':
        $start = getParam('start', -1);
        $count = getParam('count', 8);
        echojson (file_get_contents("http://cn.bing.com/HPImageArchive.aspx?format=js&idx={$start}&n={$count}"));
    break;
    
    default:
        $start = getParam('start', 0);
        $count = getParam('count', 10);
        echojson (file_get_contents("http://wallpaper.apc.360.cn/index.php?c=WallPaper&a=getAppsByCategory&cid={$cid}&start={$start}&count={$count}&from=360chrome"));
        
}


/**
 * 获取GET或POST过来的参数
 * @param $key 键值
 * @param $default 默认值
 * @return 获取到的内容（没有则为默认值）
 */
function getParam($key,$default='')
{
    return trim($key && is_string($key) ? (isset($_POST[$key]) ? $_POST[$key] : (isset($_GET[$key]) ? $_GET[$key] : $default)) : $default);
}

/**
 * 输出一个json或jsonp格式的内容
 * @param $data 数组内容
 */
function echojson($data)    //json和jsonp通用
{
    // $callback = getParam('callback');
    // if($callback != "") //输出jsonp格式
    // {
    //     echo $callback."(".$data.")";
    // }
    // else
    // {
        echo $data;
    // }
}