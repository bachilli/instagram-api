<?php

namespace InstagramFollowers\Internal;

/**
 * Class NanoTime
 * @package InstagramFollowers\Internal
 */
class NanoTime {

    /**
     * @var int
     */
    protected $seconds;
    /**
     * @var float
     */
    protected $milliseconds;
    /**
     * @var int
     */
    protected $nanoTime;

    /**
     * NanoTime constructor.
     */
    public function __construct() {
        $micro = microtime();
        list($milliseconds, $seconds) = explode(" ", $micro);
        $this->seconds = $seconds;
        $this->milliseconds = substr($milliseconds, 2);
        $this->nanoTime = ($this->seconds . str_pad($this->milliseconds, 9, "0"));
    }

    /**
     * @return string
     */
    public function now() {
        $micro = microtime();
        list($milliseconds, $seconds) = explode(" ", $micro);
        return ($seconds . str_pad(substr($milliseconds, 2), 9, "0"));
    }

    /**
     * @return string
     */
    public function elapsed() {
        return $this->now() - $this->nanoTime;
    }

    public function elapsedAddMinutes($minutes) {
        $ret = $this->now() - $this->nanoTime;
        return (int)$ret + $minutes * 100000000000;
    }

    /**
     * @return int
     */
    public function getNanoTime() {
        return $this->nanoTime;
    }

}
