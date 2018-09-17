<?php

namespace Oliinyk\Weather\Cron;
;
 
class Update {
    
    protected $_logger;

    /**
     * @var \Magento\Framework\HTTP\Client\Curl
     */
    protected $_curl;
 
    public function __construct(
        \Oliinyk\Weather\Model\GridFactory $weatherFactory,
        \Psr\Log\LoggerInterface $logger,
        \Magento\Framework\HTTP\Client\Curl $curl
    ) {
        $this->_weatherFactory = $weatherFactory;
        $this->_logger = $logger;
        $this->_curl = $curl;
    }
    
    /**
     * Method executed when cron runs in server
     */
    public function execute() {
        $this->_logger->debug('Running Cron from Update class');

        $url = "http://api.openweathermap.org/data/2.5/weather?q=lublin&appid=aaeee63c9459c6490851d18091d73f28&units=metric";
        $this->_curl->get($url);
        //response will contain the output in form of JSON string
        $response = $this->_curl->getBody();
        if($response){
            $response_array = json_decode($response, true);

            $model = $this->_weatherFactory->create();
            $model->addData([
                "city_id" => $response_array['id'],
                "name" => $response_array['name'],
                "temp" => floatval($response_array['main']['temp']),
                "temp_max" => floatval($response_array['main']['temp_max']),
                "temp_min" => floatval($response_array['main']['temp_min'])
                ]);
            $saveData = $model->save();
            if($saveData){
                // tutaj mozemy zapisac succsess message! :)
                $this->_logger->debug('Cron dodal pogode!');
                // $this->messageManager->addSuccess( __('Insert Record Successfully !') );
            }
        }

        return $this;
    }
}