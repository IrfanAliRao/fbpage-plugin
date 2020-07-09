<?php
/**
 * Adds Youtube_Subs_Widget widget.
 */
class Fbpage_like_page_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'youtubesubs_widget', // Base ID
			esc_html__( 'Facebook Like Page', 'yts_domain' ), // Name
			array( 'description' => esc_html__( 'widget to display facebook lide page option', 'yts_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		echo '<div class="fb-page" data-href="'.$instance['pageurl'].'" data-tabs="" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="'.$instance['showface'].'"><blockquote cite="'.$instance['pageurl'].'" class="fb-xfbml-parse-ignore"><a href="'.$instance['pageurl'].'"></a></blockquote></div>';
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Facebook Like Page', 'yts_domain' );
        
        $pageurl = ! empty( $instance['pageurl'] ) ? $instance['pageurl'] : esc_html__( '', 'yts_domain' );

        $showface = ! empty( $instance['showface'] ) ? $instance['showface'] : esc_html__( 'true', 'yts_domain' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
        <?php esc_attr_e( 'Title:', 'yts_domain' ); ?>
        </label>

		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
        type="text" 
        value="<?php echo esc_attr( $title ); ?>">
		</p>

        <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'pageurl' ) ); ?>">
        <?php esc_attr_e( 'Pageurl:', 'yts_domain' ); ?>
        </label>

		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pageurl' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pageurl' ) ); ?>"
        type="text" 
        value="<?php echo esc_attr( $pageurl ); ?>">
        </p>
        
        <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'showface' ) ); ?>">
        <?php esc_attr_e( 'Showfaces:', 'yts_domain' ); ?>
        </label>

        <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'showface' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'showface' ) ); ?>">
          <option value="true" <?php echo ($showface == 'true') ? 'selected' : ''; ?>>
          True
          </option>
          <option value="false" <?php echo ($showface == 'false') ? 'selected' : ''; ?>>
          False
          </option>
        </select>
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

        $instance['pageurl'] = ( ! empty( $new_instance['pageurl'] ) ) ? sanitize_text_field( $new_instance['pageurl'] ) : '';

        $instance['showface'] = ( ! empty( $new_instance['showface'] ) ) ? sanitize_text_field( $new_instance['showface'] ) : '';

		return $instance;
	}

} // class Foo_Widget