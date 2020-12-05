<?php

namespace InstagramFollowers\Internal\Models;

class IGImageModel {
    protected $source_width;
    protected $source_height;
    protected $zoom_ratio = 0;
    protected $qe_hash_reserved;

    /**
     * @param int $source_width
     */
    public function setSourceWidth($source_width) {
        $this->source_width = $source_width;
    }

    /**
     * @param int $source_height
     */
    public function setSourceHeight($source_height) {
        $this->source_height = $source_height;
    }

    /**
     * @param int $zoom_ratio
     */
    public function setZoomRatio($zoom_ratio) {
        $this->zoom_ratio = $zoom_ratio;
    }

    /**
     * @return int
     */
    public function getSourceWidth() {
        return $this->source_width;
    }

    /**
     * @return int
     */
    public function getSourceHeight() {
        return $this->source_height;
    }

    /**
     * @return int
     */
    public function getZoomRatio() {
        return $this->zoom_ratio;
    }




}
