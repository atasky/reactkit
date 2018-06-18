<?php

namespace Reactkit;

class Component {

    protected $name = '';

    protected $data = [];

    protected $identifier = '';

    public function __construct( $name, array $data = [] ) {
        $this->name = $name;
        $this->data = $data;
        $this->identifier = sprintf('%s_%s', strtolower($this->name), uniqid());
    }

    public function json() {
        return json_encode($this->data);
    }

    public function props() {
        return $this->data;
    }

    public function setData( $data ) {
        $this->data = $data;
    }

    public function name() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function identifier() {
        return $this->identifier;
    }
}
