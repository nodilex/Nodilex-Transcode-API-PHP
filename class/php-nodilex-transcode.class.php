<?php

/**
 * Nodilex Transcode API
 *
 * @package		API v1
 * @author		Nodilex
 * @link		https://www.nodilex.com/product/transcoding/
 *
 */
 
class Nodilex_Transcode {
	public function __construct($token = false) {
		$this->url = 'http://transcode.api.nodilex.com/v1';
		$this->token = $token;
	}
	
	private function send_request($method = false, $params=array()) {
		$params['token'] = $this->token;
		
		$curl_handle = curl_init();
		curl_setopt($curl_handle, CURLOPT_URL, $this->url.$method);  
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl_handle, CURLOPT_POST, count($params));
		curl_setopt($curl_handle, CURLOPT_POSTFIELDS, http_build_query($params, '', '&'));
		
		$buffer = curl_exec($curl_handle);
		$response_code = curl_getinfo($curl_handle, CURLINFO_HTTP_CODE);
		curl_close($curl_handle);
		
		return ($response_code == 200) ? json_decode($buffer) : false;
	}
	
	public function jobs_all() {
		$data = $this->send_request('/jobs/all');
		return $data;
	}
	
	public function jobs_info($id = 0) {
		$params = array('id' => $id);
		
		$data = $this->send_request('/jobs/info', $params);
		return $data;
	}
	
	public function jobs_progress($id = 0) {
		$params = array('id' => $id);
		
		$data = $this->send_request('/jobs/progress', $params);
		return $data;
	}
	
	public function jobs_cancel($id = 0) {
		$params = array('id' => $id);
		
		$data = $this->send_request('/jobs/cancel', $params);
		return $data;
	}
	
	public function jobs_create($params = array()) {
		$data = $this->send_request('/jobs/create', $params);
		return $data;
	}
}