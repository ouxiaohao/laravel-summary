<?php

/**
 * 自定义函数
 */
function p ($data){
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}
/**
 * 返回iso、Android、ajax的json格式数据
 * @param  array  $data           需要发送到前端的数据
 * @param  string  $message 成功或者错误的提示语
 * @param  integer $result    状态码： 1：成功  0：失败
 * @return string                 json格式的数据
 */
function ajax_return($data='',$message='成功',$result=1,$next_page=''){
    $versions = RUNTIME_CONF=='online' ? '' : VERSIONS;
    $all_data=array(
        'result'=>$result,
        'message'=>$message.$versions,
        'next_page'=>$next_page,
    );
    if ($next_page==='') unset($all_data['next_page']);
    if ($data!=='') {
        $all_data['data']=$data;
        // app 禁止使用和为了统一字段做的判断
        $reserved_words=array('id','title','price','product_title','product_id','product_category','product_number');
        foreach ($reserved_words as $k => $v) {
            if (array_key_exists($v, $data)) {
                echo 'app不允许使用【'.$v.'】这个键名 —— 此提示是function.php 中的ajax_return函数返回的';
                die;
            }
        }

//        $all_data['data'] = array_merge($all_data['data'],['current_time'=>time()]);
    }
    // 如果是ajax或者app访问；则返回json数据 pc访问直接p出来
    if(php_sapi_name() != 'cgi'){
        addlog($all_data,'api-'.ACTION_NAME,'返回数据:');
        $call_back = I('param.callback');
        if (!empty($call_back)) {
            echo $call_back.'('. json_encode($all_data) . ')';
        }else{
            echo json_encode($all_data);
        }
        exit(0);
    }else{
        return $all_data;
    }
}
/**
 * @extension ffmpeg
 * @param $video_url 视频路径
 * @param $width 图片宽度
 * @param $height 图片高度
 * @param $output 输出路径[相对于又拍云]
 */
function upload_video_image($video_url,$width,$height,$file_name)
{
//    服务器临时路径
    $temp_path = 'Upload/temp/'. $file_name;
//    又拍云上传路径
    $u_path = '/video_image/'.date('Ymd'). '/'. $file_name;

//    截取视频帧到服务器
    exec("ffmpeg -i {$video_url} -y -f image2 -t 0.003 -vframes 1 -s {$width}x{$height} {$temp_path}",$output,$return_val);
//    上传到又拍云
//    $client = new \Org\Sl\UpYun('himalayaimg','himalaya','ypyimg2016');
//    $file = fopen($temp_path, 'r');
//    $res = $client->writeFile($u_path,$file,True);
    $res = [];
    if (!$res['x-upyun-height'] ||  !$res['x-upyun-width']) return false;
//    删除服务器文件
    unlink($temp_path);

    return true;
}
/**
 * 创建时间格式化
 */
function create_time_format($timestamp)
{
    $time_diff = time() - $timestamp;
//    发帖日期/天
    $create_day = date('ymd',$timestamp);
//    今天/天
    $now_day = date('ymd');
//    昨天/天
    $before_day = date("ymd",strtotime("-1 day"));

    switch (true) {
        case ($create_day == $before_day) :
            $string = '昨天';
            break;
        case $time_diff <60 :
            $string = '刚刚';
            break;
        case 60 <= $time_diff && $time_diff <60 * 60 :
            $string = intval($time_diff/60). '分钟前';
            break;
        case (60*60 <= $time_diff) && ($create_day == $now_day) :
            $string = intval($time_diff/(60*60)). '小时前';
            break;
        case (24*60*60 <= $time_diff) && ($create_day != $before_day) && ($time_diff < 30*24*60*60) :
            $string = intval($time_diff/(24*60*60)). '天前';
            break;
        case (30*24*60*60 <= $time_diff) && ($time_diff < 365*24*60*60) :
            $string = intval($time_diff/(30*24*60*60)). '个月前';
            break;
        case (365*24*60*60 <= $time_diff) :
            $string = intval($time_diff/(365*24*60*60)). '年前';
            break;
        default:
            $string = date('Y-m-d',$timestamp);
            break;
    }
    return $string;
}
/**
 * 图片路径处理
 * @param string $path 路径
 * @param string $format 压缩格式
 * @param string 图片完整路径
 */
function image_path_deal($path,$format='')
{
    return !empty($path) ? C('YUN_IMG_URL'). $path. $format : '';

}
/*
 * 天气预报
 * @param string $city 城市名称
 */
function daily_forecast($city){
    $url = 'https://free-api.heweather.com/v5/weather';
    // 参数
    $data = array(
        'city' => $city,
        'key' => C('WEATHER_KEY'),
    );
    // 处理参数
    $o="";
    foreach ($data as $key => $value) {
        $o.= "$key=".urlencode($value)."&";
    }
    $data = substr($o, 0,-1);
    // 发送post请求
    $response = post_curl($data,$url);
    $result = str_replace("\"", '"', $response);
    $result = json_decode($response);

    return $result->HeWeather5[0]->daily_forecast;
}
/**
 * 获取随机字符串
 * @param int $length 字符串长度
 * @param int $type   字符串类型 0字母+数字  1数字
 */
function rand_str($length, $type=false){
    $str = '';
    if ($type) {
        $char = '1234567890';
    }else{
        $char = "ABCDEFGH45353IJKLMNOPQRS56313TUVWXYZ0123456789abcdefghijklmnopq976745rstuvwxyz";
    }
    $max = strlen($char)-1;
    for($i=0;$i<$length;$i++){
        $str.=$char[mt_rand(0,$max)];
    }
    return $str;
}
/**
 * 发送post请求
 * @param $post_data string
 * @param $url
 * @param int $second
 * @return bool|mixed
 */
function post_curl($post_data,$url,$second=0){
    //初始化curl
    $ch = curl_init();
    //超时时间
    curl_setopt($ch,CURLOPT_TIMEOUT,$second);
    //这里设置代理，如果有的话
    //curl_setopt($ch,CURLOPT_PROXY, '8.8.8.8');
    //curl_setopt($ch,CURLOPT_PROXYPORT, 8080);
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
    //设置header
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    //要求结果为字符串且输出到屏幕上
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    //post提交方式
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    //运行curl
    $data = curl_exec($ch);
    //返回结果
    if($data)
    {
        curl_close($ch);
        return $data;
    }
    else
    {
        $error = curl_errno($ch);
        echo "curl出错，错误码:$error"."<br>";
        echo "<a href='http://curl.haxx.se/libcurl/c/libcurl-errors.html'>错误原因查询</a></br>";
        curl_close($ch);
        return false;
    }
}
/**
 * 处理时间戳
 * @param $time 时间戳
 * @param $type 类型 默认1--格式  2//格式
 * @return 格式化时间
 */
function deal_empty_time($time,$type=1){
    if ($type==1) {
        return $time==0 ? '' : date('Y-m-d H:i:s',$time);
    }else{
        return $time==0 ? '' : date('y/m/d H:i:s',$time);
    }
}
/**
 * add log
 * @param $arr
 * @param $name
 * @param $description
 * @return bool
 */
function addlog($arr,$name,$description){
    return error_log ($description.':'.date('Y-m-d H:i:s').'----'.var_export($arr,true).PHP_EOL,3,RUNTIME_PATH.'/Logs/Api/'.date('Y-m-d')."-".$name.".log");
}

/**
 * 匹配手机号正则
 * @param $mobile
 * @return int
 */
function preg_mobile($mobile)
{
    return preg_match('/^(0|86|17951)?(13[0-9]|15[012356789]|18[0-9]|14[57]|17[0-9]|19[0-9])[0-9]{8}$/', $mobile);

}
function createRedisObj()
{
    vendor('Redis.RedisClient','','.class.php');
    return RedisClient::getInstance(C('REDIS_CONF'));
}

/**快递 100
 * @param $param
 * @return array|mixed|void
 */
function sldc_express($param){
    // 调用快递100接口获取物流信息
    $param = json_encode($param);
    vendor('KuaiDi.KuaiDi');
    $kuaidi = new \KuaiDi;
    $result = $kuaidi->queryDo($param);
    $result = object_to_array($result);
    return $result;
}