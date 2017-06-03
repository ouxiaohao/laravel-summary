<?php

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