<?php
/**
 * Template for displaying search forms in Yogaflex Theme
 *
 * @package yogaflex
 * @since 1.0
 * @version 1.0
 */

?>

<?php $unique_id = esc_attr( wp_unique_id( 'search-form-' ) ); ?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

	<input type="search" id="<?php echo $unique_id; ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search Posts', 'placeholder', 'yogaflex' ); ?>" value="<?php echo get_search_query(); ?>" name="search" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'" >
	<button type="submit"><i class="fa fa-search"></i></button>
</form>