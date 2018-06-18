<?php

namespace Reactkit;

class Reactkit {

    /**
     * React Components.
     *
     * @var array
     */
    protected $components = [];

    /**
     * SSR instance.
     *
     * @var \Reactkit\SSR
     */
    protected $ssr = null;

    /**
     * Reactkit options.
     *
     * @var array
     */
    protected $options = [
        'url'  => ''
    ];

    /**
     * Reactkit construct.
     */
    public function __construct( $options ) {
        if (is_array($options)) {
            $this->options = array_merge($this->options, $options);
        } else if (is_string($options)) {
            $this->options['url'] = $options;
        }

        $this->ssr = new SSR( $this->options );
    }

    /**
     * Render React component.
     *
     * @param string $name
     * @param array  $props
     */
    public function render( $name, $props ) {
        $component = new Component( $name, $props );
        $this->components[] = $component;
        $html = $this->ssr->load( $component );
        echo sprintf(
            '<div id="%s" data-reactkit="%s">%s</div>',
            $component->identifier(),
            $component->name(),
            $html
        );
    }

    /**
     * Render React hydrate code.
     */
    public function hydrate() {
        ?>
        <script>
            <?php foreach ( $this->components as $component ): ?>
                ReactDOM.hydrate(
                    React.createElement(<?php echo $component->name(); ?>, <?php echo $component->json(); ?>),
                    document.getElementById('<?php echo $component->identifier(); ?>')
                );
            <?php endforeach; ?>
        </script>
        <?php
    }
}
