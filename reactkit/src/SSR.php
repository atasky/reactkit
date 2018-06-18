<?php

namespace Reactkit;

use Exception;

class SSR {
    /**
     * SSR options.
     *
     * @var array
     */
    protected $options = '';

    /**
     * SSR construct.
     *
     * @param array $options
     */
    public function __construct( array $options ) {
        $this->options = $options;
        $this->client = new \GuzzleHttp\Client();
    }

    /**
     * Load component.
     *
     * @param  \Reactkit\Component $component
     *
     * @return string
     */
    public function load( $component ) {
        try {
            $res = $this->client->request( 'POST', $this->options['url'], [
                'body' => json_encode( [
                    'name'  => $component->name(),
                    'props' => $component->props()
                ] ),
                'timeout' => 20
            ] );

            return $res->getBody();
        } catch (Exception $e) {
            return sprintf('Reackit error: %s', $e->getMessage());
        }
    }
}
