<?php
/**
 * @name Service_Page_Task_Index
 * @desc service_page_task_index
 * @author 冯新(fengxin@taihe.com)
 */
class Service_Page_Task_Index {

    private $dataServiceObj;

    public function __construct(){
        $this->dataServiceObj = new Service_Data_Task();
    }
    
    public function execute($params = []){

        Bd_Log::debug(__CLASS__ . ' page service called');
        $errnoConf = Bd_Conf::getAppConf('errno');
        $errno = $errnoConf['errno'];

        if (!isset($params['appends']['offset'], $params['appends']['size']))
        {
            return [
                'errno' => $errno['param_error'],
            ];
        }

        $info = $this->dataServiceObj->getListInfo($params);

        return [
            'errno' => $errno['success'],
            'data' => [
                'list' => $info['list'],
                'count' => $info['count'],
            ],
        ];
    }

    public function getTaskList($params = []){
        Bd_Log::debug(__CLASS__ . ' page service called');
        return $this->dataServiceObj->getList($params);
    }
}
