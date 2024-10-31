<?php
class offerte_gas_luce_class extends WP_Widget {
	public function __construct(){
		//initializes the whole thing
		parent::__construct(
		'offerte_gas_luce',
		'Offerte Gas e Luce',
		array( 'description' => __('Mostra le offerte Gas e Luce da https://offertegasluce.com.', 'offertegaslucewidget') )
		);
	}

	public function form( $instance ){
		//this is to enter widget options
		$title = (isset( $instance[ 'title' ] )) ? $instance[ 'title' ] : 'Offerte Gas e Luce';
		$intro_text = (isset( $instance[ 'intro_text' ] )) ? $instance[ 'intro_text' ] : 'Offerte Gas e Luce è il nuovo sito di recensioni delle <strong>offerte per l\'energia di casa</strong>. Risparmia sulla bolletta di gas e luce grazie al mercato libero.';
		$qty = (isset( $instance[ 'qty' ] )) ? $instance[ 'qty' ] : '5';
		$optin = (isset( $instance[ 'optin' ] )) ? $instance[ 'optin' ] : 'off';
	?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Titolo:', 'offertegaslucewidget'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'intro_text' ); ?>"><?php _e('Intro Text:', 'offertegaslucewidget'); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'intro_text' ); ?>" name="<?php echo $this->get_field_name( 'intro_text' ); ?>"><?php echo esc_html( $intro_text ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'qty' ); ?>"><?php _e('Quantità:', 'offertegaslucewidget'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'qty' ); ?>" type="number" name="<?php echo $this->get_field_name( 'qty' ); ?>" value="<?php echo esc_attr( $qty ); ?>" min="1" max="15" />
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $optin, 'on' ); ?> id="<?php echo $this->get_field_id( 'optin' ); ?>" name="<?php echo $this->get_field_name( 'optin' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'optin' ); ?>"><?php _e('Includi link alle recensioni delle offerte e alla home di OfferteGasLuce.com', 'offertegaslucewidget'); ?></label>
		</p>
	<?php
	}

	public function update( $new_instance, $old_instance ){
		$qty = intval( $new_instance[ 'qty' ] ) === 0 ? 5 : intval( $new_instance[ 'qty' ] );
		//this is to process the form options
		$instance = array();
		$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
		$instance[ 'intro_text' ] = strip_tags( $new_instance[ 'intro_text' ] );
		$instance[ 'qty' ] = $qty;
		$instance[ 'optin' ] = $new_instance[ 'optin' ];
		return $instance;
	}

	public function widget( $args, $instance ){
		//this displays the widget
		extract( $args );
		$title = apply_filters( 'widget_title', $instance[ 'title' ] );
		$intro_text = $instance[ 'intro_text' ];
		$optin = $instance[ 'optin' ];
		$tag = $optin ? 'a' : 'span';
		$qty = $instance[ 'qty' ];
		$offerte = get_option( 'offerte_gas_luce_data' );

		echo $before_widget;

		if ( ! empty( $title) ) echo $before_title . $title . $after_title;?>

		<div class="offerte-gas-luce-widget" data-optin="<?php echo $optin; ?>" data-qty="<?php echo $qty; ?>">

			<<?php echo $tag ?> href="https://offertegasluce.com/" title="Offerte Gas e Luce. Risparmia sull'energia di casa." target="_blank" rel="noopener">
				<img src="<?php echo plugins_url( 'offerte-gas-luce/offerte-gas-luce.svg' ) ?>" alt="Offerte Gas e Luce. Risparmia sull'energia di casa." loading="lazy" width="1300" height="600" />
				<h2 class="offerte-gas-luce-widget__h2"><span>Offerte Gas e Luce</span></h2>
			</<?php echo $tag ?>>
			<p><?php echo $intro_text; ?></p>
			
			<ul class="offerte-gas-luce__ul">
				<?php for ($i=0; $i < $qty; $i++) {
					if (empty($offerte[$i])) break;
				?>
				<li class="offerte-gas-luce__li">
					<img class="offerte-gas-luce__logo" src="<?php echo $offerte[$i]['fornitore']['logo'] ?>" alt="<?php echo $offerte[$i]['fornitore']['name'] ?>" loading="lazy" decoding="async" width="1160" height="870">
					<<?php echo $tag ?> class="offerte-gas-luce__link" href="<?php echo $offerte[$i]['permalink'] ?>" title="<?php echo $offerte[$i]['title_attribute'] ?>" target="_blank" rel="noopener">
						<?php echo $offerte[$i]['title_attribute'] ?>
					</<?php echo $tag ?>>
				</li>
				<?php } // end for loop ?>
			</ul>
		</div>

		<?php echo $after_widget;
	}
}

function offerte_gas_luce_register_widgets() {
	register_widget( 'offerte_gas_luce_class' );
}

// register widget
add_action( 'widgets_init', 'offerte_gas_luce_register_widgets' );
