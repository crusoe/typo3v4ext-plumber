<?php

class Tx_SandstormmediaPlumber_TimeTrack {

	protected $run;

	protected $tsLabelStack = array();

	protected $timerIdentifiers = array(
		'Front End user initialized' => 'FE User: Initialization',

		'Back End user initialized' => 'BE User: Initialization',
		'beUserLogin' => 'BE User: Login',

		'Process ID' => 'Page ID',
		'fetch_the_id initialize/' => 'Page ID: initialize/',
		'fetch_the_id domain/' => 'Page ID: domain/',
		'fetch_the_id rootLine/' => 'Page ID: rootLine/',

		'Get Compressed TC array' => 'TypoScript: Get Compressed TC Array',

		'Start Template' => 'Template: Start',
		'Parse template' => 'Template: Parse',

		'Get Page from cache' => 'Cache: Get Page from cache',

		'Setting the config-array' => 'Page Generation: Prepare (set config array)',
		'Setting language and locale' => 'Page Generation: Prepare (set language and locale)',
		'Page generation' => 'Page Generation',
		'pagegen.php, initialize' => 'Page Generation: Initialize',
		'pagegen.php, render' => 'Page Generation: render',
		'page' => 'Page Generation: render PAGE object',


	);

	public function __construct($run) {
		$this->run = $run;
	}

	/**
	 * "Constructor"
	 * Sets the starting time
	 *
	 * does nothing
	 *
	 * @return	void
	 */
	public function start() {
	}

	/**
	 * Pushes an element to the TypoScript tracking array
	 *
	 * does nothing
	 *
	 * @param	string		Label string for the entry, eg. TypoScript property name
	 * @param	string		Additional value(?)
	 * @return	void
	 */
	public function push($tslabel, $value = '') {
		$timerIdentifier = $tslabel;
		if (isset($this->timerIdentifiers[$tslabel])) {
			$timerIdentifier = $this->timerIdentifiers[$tslabel];
		}

		$this->tsLabelStack[] = $timerIdentifier;
		$this->run->startTimer($timerIdentifier, array('value' => $value));
	}

	/**
	 * Pulls an element from the TypoScript tracking array
	 *
	 * does nothing
	 *
	 * @param	string		The content string generated within the push/pull part.
	 * @return	void
	 */
	public function pull($content = '') {
		$this->run->stopTimer(array_pop($this->tsLabelStack));
	}

	/**
	 * Set TSselectQuery - for messages in TypoScript debugger.
	 *
	 * does nothing
	 *
	 * @param	array		Query array
	 * @param	string		Message/Label to attach
	 * @return	void
	 */
	public function setTSselectQuery(array $data, $msg = '') {
	}

	/**
	 * Logs the TypoScript entry
	 *
	 * does nothing
	 *
	 * @param	string		The message string
	 * @param	integer		Message type: 0: information, 1: message, 2: warning, 3: error
	 * @return	void
	 */
	public function setTSlogMessage($content, $num = 0) {
	}

	/**
	 * Print TypoScript parsing log
	 *
	 * does nothing
	 *
	 * @return	string		HTML table with the information about parsing times.
	 */
	public function printTSlog() {
	}

	/**
	 * Increases the stack pointer
	 *
	 * does nothing
	 *
	 * @return	void
	 */
	public function incStackPointer() {
	}

	/**
	 * Decreases the stack pointer
	 *
	 * does nothing
	 *
	 * @return	void
	 */
	public function decStackPointer() {
	}

	/**
	 * Gets a microtime value as milliseconds value.
	 *
	 * @param	float		$microtime: The microtime value - if not set the current time is used
	 * @return	integer		The microtime value as milliseconds value
	 */
	public function getMilliseconds($microtime = NULL) {
	}

}

?>