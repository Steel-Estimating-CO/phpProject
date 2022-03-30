<?php

class Alerts
{
    private $type = null;
    private $message = null;
    public function __construct($type,$message)
    {
        if (!empty($message) && in_array($type, ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'])) {
            $this->type = $type;
            $this->message = $message;
        }
    }

    /**
     * return an alert HTML
     *
     * @param String $type
     * @param String $message
     * @return void
     */
    public function fire_alert()
    {
        if($this->message && $this->type)
            return '<div class="alert alert-' . $this->type . '" role="alert">
                ' . $this->message . '
            </div>';
        return '';
    }
}
