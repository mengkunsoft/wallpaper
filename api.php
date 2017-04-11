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